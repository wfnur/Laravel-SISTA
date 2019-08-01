<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class revisiLaporan extends Model
{
    protected $table = 'revisi_laporan';
    protected $fillable = ['nim','kode_dosen','revisi','status','status_nilaiSidang'];

    public function dosen(){
        return $this->belongsTo('App\Dosen', 'kode_dosen','kode_dosen');
    }

}
