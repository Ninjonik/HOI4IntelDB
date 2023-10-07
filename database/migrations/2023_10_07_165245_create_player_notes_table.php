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
        Schema::create('player_notes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('player_id');
            $table->bigInteger('guild_id');
            $table->bigInteger('host_id');
            $table->foreign('player_id')->references('discord_id')->on('players');
            $table->foreign('guild_id')->references('guild_id')->on('settings');
            $table->foreign('host_id')->references('discord_id')->on('players');
            $table->string('note')->nullable();
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
        Schema::dropIfExists('player_notes');
    }
};
