<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class poinPKM extends Model
{
    protected $table = 'poin_pkm';
    protected $fillable = ['nama_pkm','bobot','ket'];

    public function nilaiPKMPublikasi(){
        return $this->hasOne('App\nilaiPKMPublikasi','poin_pkm_id','id');
    }
}
