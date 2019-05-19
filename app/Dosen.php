<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $table = 'dosen';
    public $incrementing = false;
    protected $primaryKey = 'kode_dosen';
    protected $fillable = ['kode_dosen','nama','alamat','telpon','email','status','created_at','updated_at'];
}
