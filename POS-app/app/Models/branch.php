<?php

namespace App\Models;

use App\Models\Pegawai;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class branch extends Authenticatable
{
    use HasFactory;

    protected $table ='branch';
    protected $primaryKey = 'idBranch';

    protected $fillable = [
        'nama',
        'alamat',
        'password'
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];

    public function pegawai() {
        return $this->hasMany(Pegawai::class);
    }
}
