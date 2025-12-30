<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class jadwalShift extends Model
{
    protected $table = 'shift';
    protected $primaryKey ='idShift';

    protected $fillable =[
        'namaShift',
        'jamMasuk',
        'jamKeluar'
    ];

    public function absen(){
        return $this->hasMany(absen::class);
    }

}
