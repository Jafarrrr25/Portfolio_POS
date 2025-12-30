<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // memulai increment untuk idPegawai
        DB::statement("CREATE SEQUENCE IF NOT EXISTS seq_superadmin start 10001;");
        DB::statement("CREATE SEQUENCE IF NOT EXISTS seq_admin start 10101;");
        DB::statement("CREATE SEQUENCE IF NOT EXISTS seq_crew start 10301;");

        Schema::create('pegawai', function (Blueprint $table) {
            $table->id('idPegawai');
            $table->string('namaPegawai',30);
            $table->string('nickname', 12);
            $table->string('password');
            $table->string('jabatan',15);
            $table->enum('role', ['superadmin', 'admin', 'crew']);
            $table->string('foto',255);
            $table->date('tglMasuk');
            $table->enum('status', ['aktif', 'nonaktif']);
            $table->foreignId('id_branch')->nullable()
                  ->on('branch')
                  ->cascadeOnDelete();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawai');
        DB::statement("DROP SEQUENCE IF EXISTS seq_superadmin;");
        DB::statement("DROP SEQUENCE IF EXISTS seq_admin;");
        DB::statement("DROP SEQUENCE IF EXISTS seq_crew;");
        
    }
};
