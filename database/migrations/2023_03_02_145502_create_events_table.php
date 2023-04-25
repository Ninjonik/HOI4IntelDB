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
        Schema::create('events', function (Blueprint $table) {
            $table->id()->unique()->index();;
            $table->bigInteger('guild_id');
            $table->bigInteger('host_id');
            $table->bigInteger('channel_id')->nullable();
            $table->bigInteger('message_id')->unique()->index();
            $table->dateTime('event_start');
            $table->string('timezone');
            $table->float('rating_required');
            $table->boolean('steam_required');
            $table->boolean('global_database');
            $table->string('title');
            $table->string('description');
            $table->boolean('started')->default(0);
            $table->foreign('guild_id')->references('guild_id')->on('settings');
            $table->foreign('host_id')->references('discord_id')->on('players');
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
        Schema::dropIfExists('events');
    }
};
