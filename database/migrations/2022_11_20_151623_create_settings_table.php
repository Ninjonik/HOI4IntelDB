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
            $table->biginteger("guildId");
            $table->timestamps();
            $table->boolean("verify")->nullable();
            $table->string("verifyChannel")->nullable();
            $table->string("verifyRoles")->nullable();
            $table->string("serverName")->nullable();
            $table->string("serverDescription")->nullable();
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
