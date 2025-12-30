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
        Schema::create('transaksiDetail', function (Blueprint $table) {
            $table->id("idDetail");
            $table->foreignId('id_transaksi')
                  ->constrained('idTransaksi', 'idTransaksi')
                  ->on('transaksi')
                  ->cascadeOnDelete();
            $table->foreignId('id_produk')
                  ->constrained('idProduk', 'idProduk')
                  ->on('produk')
                  ->cascadeOnDelete();
            $table->string('namaMenu', 50);
            $table->integer('qty');
            $table->decimal('hargaMenu', 10, 2);
            $table->decimal('subTotal', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksiDetail');
    }
};
