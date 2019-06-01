<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa';
    protected $primaryKey = 'NIM';
    protected $fillable = ['user_id','NIM','nama','jk','alamat','telpon','email','angkatan','kelas','nourut','prodi','ttl','created_at','updated_at'];

    public function bimbingan()
    {
        return $this->hasMany('App\bimbingan');
    }

    public function JadwalSidang()
    {
        return $this->hasManyThrough('App\JadwalSidang','App\LaporanTA');
    }

    public function laporanTA(){
        return $this->hasMany('App\LaporanTA');
    }

}