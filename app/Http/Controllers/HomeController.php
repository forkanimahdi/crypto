<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {
        $apiKey = 'USE YOUR API KEY';
        $url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest?CMC_PRO_API_KEY=' . $apiKey;
        $response = Http::get($url);
        if ($response->successful()) {
            $cryptos = $response->json();
            $cryptos = $cryptos['data'];
            $latest = $cryptos;
            $trends = $cryptos;
            usort($latest, function ($a, $b) {
                return strtotime($b['date_added']) - strtotime($a['date_added']);
            });
            usort($trends, function ($a, $b) {
                return strtotime($b['quote']['USD']['percent_change_24h']) - strtotime($a['quote']['USD']['percent_change_24h']);
            });
            $latest = array_slice($latest, 0, 3);
            $trends = array_slice($trends, 0, 3);
            foreach ($cryptos as &$crypto) {
                $crypto['crypto_volume'] = number_format($crypto['quote']['USD']['volume_24h'] / $crypto['quote']['USD']['price'], 0);
            }
            // dd($cryptos);
        } else {
            return response()->json(['error' => 'Failed to fetch data from CoinMarketCap API'], $response->status());
        }
        return view('main.home', compact("cryptos" , "latest" , "trends"));
    }
}
