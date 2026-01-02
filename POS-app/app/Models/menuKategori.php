<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class menuKategori extends Model
{
    protected $table = 'menuKategori';
    protected $primaryKey = 'idKategori';
    protected $keyType = 'int';
    public $timestamps = true;

    protected $fillable =[
        'jenis'
    ];

    public function produk() {
        return $this->hasMany(produk::class, 'id_kategori', 'idKategori');
    }
}
