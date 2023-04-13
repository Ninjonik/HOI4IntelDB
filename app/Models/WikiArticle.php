<?php

// app/Models/WikiArticle.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WikiArticle extends Model
{
    protected $table = 'wiki_articles';

    public function category()
    {
        return $this->belongsTo(WikiCategory::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function editor()
    {
        return $this->belongsTo(User::class, 'edit_author_id');
    }
}
