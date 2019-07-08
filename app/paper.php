<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class paper extends Model
{
    protected $table = 'paper';
    protected $fillable = ['nim','judul','bukti','paper','status'];

    public function mahasiswa(){
        return $this->hasOne('App\Mahasiswa','nim','nim');
    }
}
