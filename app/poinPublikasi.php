<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class poinPublikasi extends Model
{
    protected $table = 'poin_publikasi';
    protected $fillable = ['nama_publikasi','bobot','ket'];
}
