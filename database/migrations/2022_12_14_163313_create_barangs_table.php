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
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->string("nama");
            $table->foreignId("kategori_id");
            $table->foreignId('user_id');
            $table->string("slug")->unique();
            $table->integer('minim')->default(0);
            $table->bigInteger("harga");
            $table->integer('stok')->default(100);
            $table->string("quantity")->nullable();
            $table->string("berat")->default("100 gram");
            $table->longText("deskripsi")->nullable();
            $table->string("gambar")->nullable();
            $table->bigInteger('terjual')->default(0);
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
        Schema::dropIfExists('barangs');
    }
};
