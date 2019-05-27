<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bimbingan extends Model
{
    protected $table = 'bimbingan';
    protected $fillable = ['nim','minggubimbingan_id','tanggalbimbingan','pembimbing','formbimbingan'];

    public function mingguBimbingan()
    {
        return $this->belongsTo('App\mingguBimbingan', 'minggubimbingan_id');
    }

    public function mahasiswa()
    {
        return $this->belongsTo('App\Mahasiswa', 'nim');
    }

    
}
