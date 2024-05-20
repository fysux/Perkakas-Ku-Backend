<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->id('barangID');
            $table->string('name');
            $table->string('deskripsi');
            $table->string('harga');
            $table->string('stok');
            $table->string('image');
            $table->unsignedBigInteger('kategoriID');
            $table->unsignedBigInteger('usermasterID');
            $table->timestamps();

            $table->foreign('kategoriID')->references('kategoriID')->on('kategori')->onDelete('cascade');
            $table->foreign('usermasterID')->references('usermasterID')->on('usermaster')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};
