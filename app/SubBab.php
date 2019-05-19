<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubBab extends Model
{
    protected $table = 'subbab';
    protected $primaryKey = 'id';
    protected $fillable = ['bab_id','subbab','ket'];

    public function BAB(){
        return $this->belongsTo('App\bab');
    }
}
