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
            $table->id();
            $table->string('nama', 100);
            $table->string('tipe', 100);
            $table->string('panjang', 100);
            $table->string('lebar', 100);
            $table->string('slug', 100);
            $table->string('harga', 100);
            $table->string('in_stock', 100)->nullable();
            $table->string('sell_stock', 100)->default(0);
            $table->text('keterangan')->nullable();
            $table->string('foto', 100);
            $table->foreignId('kategori_id')->constrained('kategori')->cascadeOnDelete();
            $table->timestamps();
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
