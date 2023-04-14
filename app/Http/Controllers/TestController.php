<?php

namespace App\Http\Controllers;

use App\Models\WikiArticle;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test(){
        $results = WikiArticle::search('(title:esports)')->get();
        dd($results);
    }
}
