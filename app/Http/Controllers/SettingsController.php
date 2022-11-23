<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = Settings::where("id", 1)->get();
        foreach($settings as $data){
            return view("panel/settings", ["$settings" => $data]);
        }
    }
}
