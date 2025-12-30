<?php

namespace Database\Seeders;

use App\Models\Pegawai;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pegawai::create([
            'namaPegawai' => 'admin',
            'nickname' => 'jogja',
            'password' => Hash::make('456'),
            'jabatan' => 'hrd',
            'role' => 'admin',
            'tglMasuk' => '12-12-2000',
            'foto' => 'not yet',
            'status' => 'aktif',
            'id_branch' => null
        ]);
    }
}
