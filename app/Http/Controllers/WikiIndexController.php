<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WikiCategory;

class WikiIndexController extends Controller
{
    public function index()
    {
        $data = WikiCategory::orderBy('order', 'asc')->get();
        return view('wiki/index', ["data" => $data]);
    }
}
