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
        Schema::create('player_records', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('player_id');
            $table->bigInteger('guild_id');
            $table->bigInteger('host_id');
            $table->bigInteger('event_id')->default(0);
            $table->foreign('player_id')->references('discord_id')->on('players');
            $table->foreign('guild_id')->references('guild_id')->on('settings');
            $table->foreign('host_id')->references('discord_id')->on('players');
            $table->foreign('event_id')->references('message_id')->on('events');
            $table->float('rating')->nullable();
            $table->string('country')->nullable();
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
        //
    }
};
