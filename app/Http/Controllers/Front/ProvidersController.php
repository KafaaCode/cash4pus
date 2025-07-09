<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Provider;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProvidersController extends Controller
{
    public static function getToken($providerName)
    {
        $provider = Provider::where('name', $providerName)->first();
        return $provider?->api_key;
    }

    public static function soud($game, $req, $token)
    {
        $url = 'https://api.saud-card.com/client/api/newOrder/' . $game->provider_game_id . '/params';
        $parameters = [
            'qty' => $req->qty,
            'order_uuid' => Str::uuid(),
            'playerID' => $req->playerid,
        ];

        $headers = [
            'api-token' => $token,
        ];

        $response = Http::withHeaders($headers)->timeout(60)->get($url, $parameters);

        if ($response->successful() && $response->json('status') === 'OK') {
            return [
                "success" => true,
                "res" => $response,
                "withPrice" => true
            ];
        }

        return [
            "success" => false,
            "res" => $response,
            "withPrice" => false
        ];
    }

    public static function yassen($game, $req, $token)
    {
        $url = 'https://api.yassen-card.com/client/api/newOrder/' . $game->provider_game_id . '/params';
        $parameters = [
            'qty' => $req->qty,
            'order_uuid' => Str::uuid(),
            'playerID' => $req->playerid,
        ];

        $headers = [
            'api-token' => $token,
        ];

        $response = Http::withHeaders($headers)->timeout(60)->get($url, $parameters);

        if ($response->successful() && $response->json('status') === 'OK') {
            return [
                "success" => true,
                "res" => $response,
                "withPrice" => true
            ];
        }

        return [
            "success" => false,
            "res" => $response,
            "withPrice" => false
        ];
    }

    public static function zain($game, $req, $token)
    {
        $url = 'https://zain-market.com/api/order';
        $payload = [
            'game_id' => $game->provider_game_id,
            'package_id' => $req->package_id,
            'playerid' => $req->playerid,
            'playername' => $req->playername ?? 'unknown',
            'qty' => $req->qty,
        ];

        $headers = [
            'X-API-TOKEN' => $token,
        ];

        $response = Http::withHeaders($headers)->timeout(60)->post($url, $payload);

        if ($response->successful() && $response->json('success') === true) {
            // تحويل البيانات لتتناسب مع باقي الدوال
            $wrapped = [
                'data' => [
                    'order_id' => $response->json('invoice_no'),
                    'price' => $response->json('price'),
                ]
            ];

            return [
                "success" => true,
                "res" => collect(['json' => fn($key) => data_get($wrapped, $key)]),
                "withPrice" => true
            ];
        }

        return [
            "success" => false,
            "res" => $response,
            "withPrice" => false
        ];
    }
}
