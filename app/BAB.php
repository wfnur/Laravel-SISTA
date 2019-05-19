<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BAB extends Model
{
    protected $table = 'bab';
    protected $primaryKey = 'id';
    protected $fillable = ['bab','ket','status'];

    public function SubBabs(){
        return $this->hasMany('App\SubBab','bab_id');
    }
}
