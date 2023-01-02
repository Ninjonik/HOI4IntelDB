<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Statistics;
use Illuminate\Support\Facades\DB;

class PanelIndex extends Controller
{
    public function index()
    {
        // Get number of guilds
        $count = DB::table('settings')->count();
        // Get the Members in servers with WWCBot (Last 7 Days) Graph
        $results = Statistics::select(
            DB::raw("SUM(count) as count"),
            DB::raw("date(updated_at) as date")
        )
            ->orderBy('id', 'desc')
            ->limit($count)
            ->groupBy(DB::raw("date(updated_at)"))
            ->get();

        // Extract the data for the graph
        $labels = array_reverse(array_column($results->toArray(), 'date'));
        $data = array_reverse(array_column($results->toArray(), 'count'));
        //var_dump($data);
        echo $count;

        // Calculate the difference in new members between the current day and the first day
        $difference = end($data) - reset($data);

        return view('panel/index', compact('labels', 'data', 'difference'));
    }
}
