<?php

namespace App\Http\Controllers;

use App\Models\WikiArticle as WikiArticleDB;
use Illuminate\Http\Request;

class WikiSearchController extends Controller
{
    public function show(Request $request)
    {
        $query = $request->input('query');
        $articles = WikiArticleDB::search($query)->get();
        // Render the view to display the category and its articles
        return view('wiki.search', ['articles' => $articles, 'query' => $query]);
    }

}
