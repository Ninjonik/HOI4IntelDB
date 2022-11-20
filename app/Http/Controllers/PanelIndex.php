<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Statistics;

class PanelIndex extends Controller
{
    public function index()
    {
        $statistics = Statistics::where("id", 1)->get();
        foreach($statistics as $stats){
            return view("panel/index", ["statistics" => $stats]);
        }
    }
}
