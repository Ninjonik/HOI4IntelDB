<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WikiCategory as WikiCategoryDB;
use App\Models\WikiArticle as WikiArticleDB;
use Illuminate\Support\Str;

class WikiCategoryController extends Controller
{
    public function show(Request $request, $id, $title)
    {
        // Retrieve the category from the database based on the ID
        $category = WikiCategoryDB::where('id', $id)->first();

        // Check if the category exists
        if (!$category) {
            abort(404);
        }

        // Check if the title matches the expected format
        $expectedTitle = Str::slug($category->title); // Convert the title to a slug format (e.g. "my-category")
        if ($title !== $expectedTitle) {
            // If the title doesn't match, redirect to the correct URL
            return redirect()->route('wiki.category', ['id' => $category->id, 'title' => $expectedTitle], 301);
        }

        // Retrieve the articles belonging to the category and join the users table based on author_id and edit_author_id
        $articles = WikiArticleDB::where('category_id', $id)
            ->leftJoin('users as author', 'wiki_articles.author_id', '=', 'author.id')
            ->leftJoin('users as editor', 'wiki_articles.edit_author_id', '=', 'editor.id')
            ->select('wiki_articles.*', 'author.name as author_name', 'editor.name as editor_name')
            ->get();

        // Render the view to display the category and its articles
        return view('wiki.category', ['category' => $category, 'articles' => $articles]);
    }
}
