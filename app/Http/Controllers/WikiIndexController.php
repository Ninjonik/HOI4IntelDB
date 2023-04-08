<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WikiIndexController extends Controller
{
    public function index()
    {
        return view('wiki/index');
    }
}
