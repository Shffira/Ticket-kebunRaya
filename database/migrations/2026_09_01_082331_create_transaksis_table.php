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
    Schema::create('transaksis', function (Blueprint $table) {

        $table->id();

        $table->foreignId('user_id')
              ->constrained()
              ->onDelete('cascade');

        $table->string('invoice')->unique();

        $table->date('tanggal_kunjungan');

        $table->integer('total_tiket');

        $table->integer('total_harga');

        $table->string('bukti_pembayaran')->nullable();

        $table->enum('status', [
            'Menunggu Konfirmasi',
            'Lunas',
            'Ditolak'
        ])->default('Menunggu Konfirmasi');

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
