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
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->string('namaClient');
            $table->string('emailClient');
            $table->string('teleponClient');
            $table->text('alamatClient');
            $table->string('nama_produk');
            $table->string('kategori_layanan');
            $table->string('pembayaranMelalui');
            $table->date('tanggalPemasangan');
            $table->text('catatan')->nullable();
            $table->integer('harga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};
