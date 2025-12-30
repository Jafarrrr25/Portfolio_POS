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
        Schema::create('addOnsTransaksi', function (Blueprint $table) {
            $table->id('idTaddOns');
            $table->foreignId('id_detail')
                  ->constrained('idDetail', 'idDetail')
                  ->on('transaksiDetail')
                  ->cascadeOnDelete();
            $table->foreignId('id_add_ons')
                  ->constrained('idAddons', 'idAddons')
                  ->on('addons')
                  ->cascadeOnDelete();
            $table->string('menuAddOns', 20);
            $table->decimal('hargaAddons', 10,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addOnsTransaksi');
    }
};
