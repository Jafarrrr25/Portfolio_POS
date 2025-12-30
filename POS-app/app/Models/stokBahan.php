<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class stokBahan extends Model
{
    protected $table = 'stokBahan';
    protected $primaryKey = 'idBahan';
    protected $keyType = 'int';
    public $timestamps = true;

    protected $fillable =[
        'namaBahan',
        'satuan',
        'stokAwal',
        'stokMasuk',
        'stokKeluar',
        'stokAkhir',
        'note',
        'jmlReq',
        'statusReq',
        'reqNote'
    ];

}
