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
        Schema::create('event_reservations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('event_message_id');
            $table->bigInteger('player_id');
            $table->string('country');
            $table->boolean('approved')->default(true);
            $table->foreign('event_message_id')->references('message_id')->on('events');
            $table->foreign('player_id')->references('discord_id')->on('players');
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
        Schema::dropIfExists('event_reservations');
    }
};
