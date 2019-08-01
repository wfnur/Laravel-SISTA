<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $table = 'dosen';
    public $incrementing = false;
    protected $primaryKey = 'kode_dosen';
    protected $fillable = ['kode_dosen','nama','jk','alamat','telpon','email','status','created_at','updated_at'];

    public function JadwalSidang()
    {
        return $this->hasMany('App\JadwalSidang','pembimbing','kode_dosen');
    }

    public function revisiLaporan()
    {
        return $this->hasMany('App\revisilaporan','kode_dosen','kode_dosen');
    }
}
