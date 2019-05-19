<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa';
    protected $primaryKey = 'NIM';
    protected $fillable = ['user_id','NIM','nama','jk','alamat','telpon','email','angkatan','kelas','nourut','prodi','ttl','created_at','updated_at'];
}
