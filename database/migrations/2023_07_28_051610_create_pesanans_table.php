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
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('slug')->unique();
            $table->integer('status')->default(1);
            $table->bigInteger('total');
            $table->integer('subproduk')->default(0);
            $table->integer('subitem')->default(0);
            $table->dateTime('paidTime')->nullable();
            $table->dateTime('deadlinePaid')->nullable();
            $table->mediumText('pesanbatal')->nullable();
            $table->string('snapToken')->nullable();
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
        Schema::dropIfExists('pesanans');
    }
};
