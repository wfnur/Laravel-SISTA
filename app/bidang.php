<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bidang extends Model
{
    protected $table = 'bidang';
    protected $fillable = ['nama','status','ket'];
}
