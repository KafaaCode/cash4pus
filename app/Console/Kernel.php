<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Models\Order;
use App\Models\Provider;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        //
    ];

    protected function schedule(Schedule $schedule)
    {
        $schedule
            ->call(function () {
                $orders = Order::whereNotNull('provider_order_id')
                    ->where("status", "pending")
                    ->orderBy('created_at', 'desc')
                    ->take(200)
                    ->get();

                foreach ($orders as $order) {
                    try {
                        $provider = Provider::find($order->provider_id);
                        $orderProvider = $provider->name;
                        $token = $provider->api_key;

                        $status = null;
                        $response = null;

                        if ($orderProvider === 'soud') {
                            $url = 'https://api.saud-card.com/client/api/check?orders=[' . $order->provider_order_id . ']';
                            $headers = ['api-token' => $token];
                            $response = Http::withHeaders($headers)->get($url);
                            $data = $response->json('data')[0] ?? null;
                            $status = match($data['status'] ?? null) {
                                'accept' => 'approved',
                                'reject' => 'canceled',
                                default => null,
                            };

                        } elseif ($orderProvider === 'yassen') {
                            $url = 'https://api.yassen-card.com/client/api/check?orders=[' . $order->provider_order_id . ']';
                            $headers = ['api-token' => $token];
                            $response = Http::withHeaders($headers)->get($url);
                            $data = $response->json('data')[0] ?? null;
                            $status = match($data['status'] ?? null) {
                                'accept' => 'approved',
                                'reject' => 'canceled',
                                default => null,
                            };

                        } elseif ($orderProvider === 'zain') {
                            $url = 'https://zain-market.com/api/check/order';
                            $headers = ['X-API-TOKEN' => $token];
                            $response = Http::withHeaders($headers)->post($url, [
                                'invoice_no' => $order->provider_order_id,
                            ]);
                            $status = $response->json('status') ?? null;
                        } else {
                            continue;
                        }

                        if (!$status) {
                            Log::error("لا توجد حالة صالحة للطلب رقم {$order->id}", [
                                'order_id' => $order->id,
                                'response' => $response?->json()
                            ]);
                            continue;
                        }

                        if ($status === 'approved') {
                            $order->update([
                                'status' => 'approved',
                                'provider_response' => $response->json(),
                                'provider_processed_at' => now(),
                            ]);

                            Log::info("تمت الموافقة على الطلب رقم {$order->id}", [
                                'order_id' => $order->id,
                                'status' => 'approved',
                            ]);

                        } elseif ($status === 'canceled') {
                            $order->update([
                                'status' => 'canceled',
                                'provider_response' => $response->json(),
                                'provider_processed_at' => now(),
                            ]);

                            $final_total = $order->final_total;
                            $user = $order->user_c;
                            $user->update([
                                'amount_orders' => $user->amount_orders - $final_total,
                                'user_balance' => $user->user_balance + $final_total,
                            ]);

                            Log::warning("تم رفض الطلب رقم {$order->id}", [
                                'order_id' => $order->id,
                                'status' => 'canceled',
                            ]);
                        }

                    } catch (\Exception $e) {
                        Log::error("فشل في معالجة الطلب رقم {$order->id}", [
                            'order_id' => $order->id,
                            'error' => $e->getMessage(),
                        ]);
                    }
                }
            })
            ->everyMinute();
    }

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
