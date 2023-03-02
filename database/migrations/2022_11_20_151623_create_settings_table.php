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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("guild_id")->unique()->index();;
            $table->boolean("steam_verification")->nullable();
            $table->bigInteger("log_channel")->nullable();
            $table->bigInteger("custom_channel")->nullable();
            $table->bigInteger("custom_channel_2")->nullable();
            $table->bigInteger("ann_role")->nullable();
            $table->bigInteger("verify_role")->nullable();
            $table->string("guild_name")->nullable();
            $table->string("guild_desc")->nullable();
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
        Schema::dropIfExists('settings');
    }
};
