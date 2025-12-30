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
        Schema::create('absen', function (Blueprint $table) {
            $table->id('idAbsen');
            
            $table->foreignId('id_pegawai')
                  ->constrained('idPegawai', 'idPegawai')
                  ->on('pegawai')
                  ->cascadeOnDelete();
                  
            $table->foreignId('id_shift')
                  ->constrained('idShift', 'idShift')
                  ->on('shift')
                  ->cascadeOnDelete();

            $table->date('tanggal');
            $table->time('jamAbsen');
            $table->enum('statusAbsen', ['hadir', 'izin', 'alpha']);
            $table->timestamps();

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absen');
    }
};
