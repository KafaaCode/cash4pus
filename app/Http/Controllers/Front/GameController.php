<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\OrderGameRequest;
use App\Models\Category;
use App\Models\Game;
use App\Models\Order;
use App\Models\Package;
use App\Models\User;
use App\Models\Provider;
use App\Models\Level;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class GameController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *layouts-scrollable
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function indexByCategory(Category $category)
    {
        $games = $category->games()->paginate(10);
        return view('admin.categories.games', compact('category', 'games'));
    }

    public function gamesCatygory($category)
    {
        $category = Category::findOrFail($category);
        $allGames = Game::IsShow()->get();
        $games = $allGames->where('category_id',$category->id);
        // dd($category);
        return view('front.games', compact('category', 'games'));
    }


    public function show($slug)
    {
        if (Auth::check()) {
            if (Auth::user()->whats_app == null) {
                return redirect()->route('front.completeRegister');
            }
        }

        $game = Game::with('packages')->IsShow()->where('slug', $slug)->firstOrFail();


        return view('front.games.show')->with([
            'game' => $game,
        ]);
    }
    public function Order(OrderGameRequest $request)
    {
        DB::beginTransaction();

        // dd($request->all());
        try {
            $randomNumber = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
            $user_id = auth()->id();
            $invoice_no = 'ZM' . $randomNumber . $user_id;
            $game = Game::where('id', $request->game_id)->first();

            // Get base price and quantity
            if ($game->have_packages) {
                $package = Package::where('id', $request->package_id)->first();
                $qty_item = $package->quantity;
                $price_item = $package->price;
                $base_total = $request->qty * $package->price;
            } else {
                $qty_item = $game->min_qty;
                $price_item = $game->price_qty;
                $base_total = $request->qty * $game->price_qty;
            }

            // Calculate profit based on user's level
            $user = auth()->user();
            $profit_percentage = $user->level ? $user->level->profit_percentage : 0;
            $profit_amount = ($base_total * $profit_percentage) / 100;
            $final_total = $base_total + $profit_amount;

            if ($user->user_balance < $final_total) {
                DB::rollBack();
                return redirect()->back()->with(['error_m' => __('translation.Your current balance is not enough, please top up and try again')]);
            } else {
                $user->increment('amount_orders', $final_total);
                $user->decrement('user_balance', $final_total);
            }

            $orderId = null;
            $sprice = null;
            $providerId = null;
            // check if game is from provider
            if ($game->provider_id) {
                $provider = Provider::where('id', $game->provider_id)->first();
            
                $method = $provider->name;
                if (method_exists(ProvidersController::class, $method)) {
                    $resault = ProvidersController::$method($game, $request, $provider->api_key);
            
                    if ($resault['success']) {
                        $providerId = $provider->id;
            
                        if ($method == 'soud' || $method == 'yassen') {
                            $orderId = $resault['res']->json('data.order_id');
                            $sprice = $resault['res']->json('data.price');
                        }
            
                        Log::info("تم تنفيذ الطلب بنجاح", [
                            'game_id' => $game->id,
                            'provider' => $method,
                            'response' => $resault['res']->json()
                        ]);
                    } else {
                        Log::error("فشل تنفيذ الطلب من المزود", [
                            'game_id' => $game->id,
                            'provider' => $method,
                            'message' => $resault['message'] ?? 'لا يوجد رسالة'
                        ]);
                    }
                } else {
                    Log::warning("الميثود غير موجود في ProviderController: {$method}", [
                        'provider' => $method,
                        'game_id' => $game->id,
                    ]);
                }
            }
            // check if game is from provider

            $data = [
                'user_id' => $user_id,
                'game_id' => $request->game_id,
                'package_id' => $request->package_id,
                'invoice_no' => $invoice_no,
                'player_id' => $request->playerid,
                'player_name' => $request->playername,
                'qty' => $request->qty,
                'qty_item' => $qty_item,
                'price_item' => $price_item,
                'base_total' => $base_total,
                'profit_percentage' => $profit_percentage,
                'profit' => $profit_amount,
                'final_total' => $final_total,
                'details' => $request->note,
                'provider_order_id' => $orderId,
                'provider_id' => $providerId,
            ];

            Order::create($data);

            DB::commit();
            return redirect()->back()->with('message', __('translation.store_order_done'));

        } catch (\Exception $e) {
            DB::rollBack();
            Log::emergency('File: ' . $e->getFile() . 'Line: ' . $e->getLine() . 'Message: ' . $e->getMessage());
            return redirect()->back()->with(['error_m' => __('translation.same_thing_error')]);
        }
    }
}
