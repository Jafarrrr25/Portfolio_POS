<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class absen extends Model
{
    protected $table = 'absen';

    protected $fillable =[
        'tanggal',
        'jamAbsen',
        'status'
    ];

    public function pegawai() {
        return $this->belongsTo(pegawai::class, 'idPegawai', 'idPegawai');
    }

    public function shift() {
        return $this->belongsTo(jadwalShift::class);
    }

}
