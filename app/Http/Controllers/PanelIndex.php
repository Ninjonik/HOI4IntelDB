<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Players;
use App\Models\Settings;
use Carbon\Carbon;
use App\Models\Statistics;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;
use Bouncer;
use JetBrains\PhpStorm\NoReturn;
use Illuminate\Support\Facades\Cache;

class PanelIndex extends Controller
{
    public function index()
    {

        $cachedData = Cache::get('panel_data');

        if ($cachedData) {
            return $cachedData;
        }

        // Fetch the Members in servers with HOI4Intel (Last 7 Days) Graph
        $results = Statistics::select(
            DB::raw("SUM(count) as count"),
            DB::raw("date(updated_at) as date")
        )
            ->orderBy('id', 'desc')
            ->limit(7)
            ->groupBy(DB::raw("date(updated_at)"))
            ->get();

        // Extract the data for the graph
        $labels = array_reverse(array_column($results->toArray(), 'date'));
        $data = array_reverse(array_column($results->toArray(), 'count'));

        // Calculate the difference in new members between the current day and the first day
        $difference = end($data) - reset($data);

        $data_stats["guild_count"] = Settings::all()->count();
        $data_stats["player_count"] = Players::all()->count();
        $data_stats["event_count"] = Event::all()->count();

        $client = new Client();
        $response = $client->request('GET', 'https://api.steampowered.com/ISteamNews/GetNewsForApp/v0002/', [
            'query' => [
                'appid' => 394360,
                'count' => 3,
                'maxlength' => 30000,
                'format' => 'json',
                'key' => env("STEAM_CLIENT_SECRET"),
            ],
        ]);
        $news = json_decode($response->getBody(), true)['appnews']['newsitems'];

        $guild = null;

        // Cache the data for future requests
        $cachedData = view('panel/index', compact('labels', 'data', 'difference', 'data_stats', 'news', 'guild'))->render();
        Cache::put('panel_data', $cachedData, 720); // Cache the data for 60 minutes

        return $cachedData;
    }
}
