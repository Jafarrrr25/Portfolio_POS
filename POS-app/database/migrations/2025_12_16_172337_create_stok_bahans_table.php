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
        Schema::create('stokBahan', function (Blueprint $table) {
            $table->id('idBahan');
            $table->string('namaBahan',40);
            $table->string('satuan', 10);
            $table->integer('stokAwal');
            $table->integer('stokMasuk');
            $table->integer('stokKeluar');
            $table->integer('stokAkhir');
            $table->string('note', 255);
            $table->integer('jmlReq');
            $table->enum('statusReq', ['aktif', 'nonaktif']);
            $table->string('reqNote', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stokBahan');
    }
};
