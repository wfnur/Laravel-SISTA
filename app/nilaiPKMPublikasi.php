<?php

namespace App;
use \App\poinPublikasi;
use \App\poinPKM;
use \App\Mahasiswa;

use Illuminate\Database\Eloquent\Model;

class nilaiPKMPublikasi extends Model
{
    protected $table = 'nilai_pkmpublikasi';
    protected $fillable = ['nim','poin_pkm_id','poin_publikasi_id'];

    public function poinPKM()
    {
        return $this->belongsTo(poinPKM::class, 'poin_pkm_id');
    }

    public function poinPublikasi()
    {
        return $this->belongsTo(poinPublikasi::class, 'poin_publikasi_id');
    }

}
