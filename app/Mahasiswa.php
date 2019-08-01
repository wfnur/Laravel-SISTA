<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\nilaiPKMPublikasi;

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
        //return $this->hasOne('App\JadwalSidang','nim','nim');
        return $this->hasOneThrough('App\JadwalSidang', 'App\laporanTA','nim','nim','nim','nim');
    }  

    public function laporanta(){
        return $this->hasOne('App\laporanTA','nim','id');
    }

    public function paper(){
        return $this->hasOne('App\paper','nim','nim');
    }
   

}