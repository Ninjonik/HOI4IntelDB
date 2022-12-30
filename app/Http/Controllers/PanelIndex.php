<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Statistics;
use Illuminate\Support\Facades\DB;

class PanelIndex extends Controller
{
    public function index()
    {
        $users = Statistics::select(DB::raw("SUM(count) as count"), DB::raw("DAY(updated_at) as day"))

            ->groupBy(DB::raw("DAY(updated_at)"))

            ->pluck('count', 'day');

        $labels = $users->keys();

        $data = $users->values();

        return view('panel/index', compact('labels', 'data'));
    }
}
