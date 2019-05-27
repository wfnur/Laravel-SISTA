<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mingguBimbingan extends Model
{
    protected $table = 'minggubimbingan';
    protected $fillable = ['mingguke','awal','akhir'];
    protected $dates = ['awal','akhir'];
    
    public function bimbingan()
    {
        return $this->hasMany('App\bimbingan');
    }
}
