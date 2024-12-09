<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->id(); // ID pemesanan
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // ID user (relasi ke tabel users)
            $table->foreignId('mobil_id')->constrained('mobils')->onDelete('cascade'); // ID mobil (relasi ke tabel mobils)
            $table->integer('lama_sewa'); // Lama sewa dalam hari
            $table->decimal('total_harga', 15, 2); // Total harga (format desimal)
            $table->enum('jenis_bayar', ['cash', 'card']); // Jenis pembayaran
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemesanans');
    }
}
