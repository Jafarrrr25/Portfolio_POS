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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id('idTransaksi');
            $table->foreignId('id_pegawai')
                  ->constrained('idPegawai', 'idPegawai')
                  ->on('pegawai')
                  ->cascadeOnDelete();
            $table->string('namaCust',30);
            $table->string('paymentMethod',20);
            $table->decimal('totalHarga', 10, 2);
            $table->decimal('totalBayar', 10, 2);
            $table->decimal('totalKembali', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
