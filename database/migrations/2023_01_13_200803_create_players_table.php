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
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('steam_id')->unique()->nullable();
            $table->bigInteger('discord_id')->unique()->index();
            $table->string('discord_name')->nullable();
            $table->float('rating')->default(0.5);
            $table->string('profile_link')->nullable();
            $table->integer('status')->default(0);
            $table->float('currency')->default(0);
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
        Schema::dropIfExists('players');
    }
};
