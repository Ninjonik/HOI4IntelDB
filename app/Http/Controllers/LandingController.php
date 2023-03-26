<?php

namespace App\Http\Controllers;

use App\Models\Players;
use App\Models\Statistics;
use App\Models\Settings;
use App\Models\Event;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index(){
        $data = [];
        $data["guild_count"] = Settings::all()->count();
        $data["player_count"] = Players::all()->count();
        $data["event_count"] = Event::all()->count();
        return view("landing/index", ["data"=>$data]);
    }
}
