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
        Schema::create('wwcbot_filter_logs', function (Blueprint $table) {
            $table->id();
            $table->biginteger("guildId");
            $table->timestamps();
            $table->string("message");
            $table->biginteger("authorId");
            $table->float("result");
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
