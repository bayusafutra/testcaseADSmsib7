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
        Schema::create('detail_ratings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rating_id');
            $table->foreignId('barang_id');
            $table->integer('nilai')->nullable();
            $table->mediumText('komentar')->nullable();
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('detail_ratings');
    }
};
