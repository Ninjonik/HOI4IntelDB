<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WikiArticle as WikiArticleDB;
use Illuminate\Support\Str;

class WikiArticleController extends Controller
{
    public function show(Request $request, $id, $title)
    {
        // Retrieve the article from the database based on the ID
        $article = WikiArticleDB::where('wiki_articles.id', $id)
            ->join('wiki_categories as category', 'wiki_articles.category_id', '=', 'category.id')
            ->leftJoin('users as author', 'wiki_articles.author_id', '=', 'author.id')
            ->leftJoin('users as editor', 'wiki_articles.edit_author_id', '=', 'editor.id')
            ->select('wiki_articles.*', 'category.title as category_title', 'author.name as author_name', 'editor.name as editor_name')
            ->first();


        // Check if the article exists
        if (!$article) {
            abort(404);
        }

        // Check if the title matches the expected format
        $expectedTitle = Str::slug($article->title); // Convert the title to a slug format (e.g. "my-article-title")
        if ($title !== $expectedTitle) {
            // If the title doesn't match, redirect to the correct URL
            return redirect()->route('wiki.article', ['id' => $article->id, 'title' => $expectedTitle], 301);
        }

        // Setup previous and next articles
        $previousArticle = WikiArticleDB::where('category_id', $article->category_id)
            ->where('id', '<', $id)
            ->orderBy('id', 'desc')
            ->first();
        $nextArticle = WikiArticleDB::where('category_id', $article->category_id)
            ->where('id', '>', $id)
            ->orderBy('id', 'asc')
            ->first();

        return view('wiki.article', [
            'article' => $article,
            'previousArticleId' => $previousArticle ? $previousArticle->id : null,
            'previousArticleTitle' => $previousArticle ? Str::slug($previousArticle->title) : null,
            'previousArticleDisplayTitle' => $previousArticle ? $previousArticle->title : null,
            'nextArticleId' => $nextArticle ? $nextArticle->id : null,
            'nextArticleTitle' => $nextArticle ? Str::slug($nextArticle->title) : null,
            'nextArticleDisplayTitle' => $nextArticle ? $nextArticle->title : null,
        ]);

    }
}
