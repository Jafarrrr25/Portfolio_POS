<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\absen;
use App\Models\branch;
use Illuminate\Notifications\Notifiable;

class Pegawai extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'pegawai';
    protected $primaryKey ='idPegawai';
    public $incrementing = false;
    protected $keyType = 'int';
    public $timestamps = true;

    protected $fillable =[
        'namaPegawai',
        'password',
        'nickname', 
        'jabatan',
        'role',
        'foto',
        'tglMasuk',
        'status'
    ];

    protected $hidden = [
        'remember_token',
        'password'
    ];

    protected $cast = [
        'tglmasuk' => 'date',
    ];

    public function absen() {
        return $this->hasMany(Absen::class, 'idPegawai', 'idPegawai');
    }

    public function branch() {
        return $this->belongsTo(branch::class);
    }

    
}
