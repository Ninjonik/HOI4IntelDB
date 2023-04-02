<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Players;
use App\Models\Settings;
use Carbon\Carbon;
use App\Models\Statistics;
use Illuminate\Support\Facades\DB;

class PanelIndex extends Controller
{
    public function index()
    {
        // Get the Members in servers with WWCBot (Last 7 Days) Graph
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

        return view('panel/index', compact('labels', 'data', 'difference', 'data_stats'));
    }
}
