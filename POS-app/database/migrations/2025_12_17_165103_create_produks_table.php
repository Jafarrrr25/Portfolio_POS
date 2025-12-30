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
        Schema::create('produk', function (Blueprint $table) {
            $table->id('idProduk');
            $table->string('namaMenu', 100);

            $table->foreignId('id_kategori')
                  ->constrained('menuKategori', 'idKategori')
                  ->cascadeOnDelete();

            $table->string('tipeMenu', 20);
            $table->string('fotoMenu', 255);
            $table->integer('jmlStok')  ;
            $table->decimal('hargaMenu', 10,2);
            $table->enum('statusMenu', ['Ada', 'Habis']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};
