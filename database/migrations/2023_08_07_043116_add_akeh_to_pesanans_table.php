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
        Schema::table('pesanans', function (Blueprint $table) {
            $table->dateTime('timebataskirim')->nullable();
            $table->dateTime('timeterima')->nullable();
            $table->dateTime('timekirim')->nullable();
            $table->dateTime('timebatasnilai')->nullable();
            $table->dateTime('timebatal')->nullable();
            $table->string('jaskir')->nullable();
            $table->string('noresi')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pesanans', function (Blueprint $table) {
            //
        });
    }
};
