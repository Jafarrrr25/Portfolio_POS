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
        Schema::create('rekap_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rekapPenjualan_id')
                  ->constrained('rekapPenjualan')
                  ->on('rekapPenjualan')
                  ->cascadeOnDelete();
            $table->string('paymentMethod');
            $table->integer('jmlTransaksi')->default(0);
            $table->decimal('totalPendapatan', 10, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekap_payments');
    }
};
