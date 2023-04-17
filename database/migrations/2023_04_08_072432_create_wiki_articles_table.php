<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wiki_articles', function (Blueprint $table) {
            $table->id();
            $table->string('title')->index();
            $table->string('tags')->index();
            $table->text('content');
            $table->string('image')->nullable();
            $table->string('emoji')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('author_id');
            $table->unsignedBigInteger('edit_author_id');
            $table->foreign('category_id')->references('id')->on('wiki_categories');
            $table->foreign('author_id')->references('id')->on('users');
            $table->foreign('edit_author_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wiki_articles');
    }
};
