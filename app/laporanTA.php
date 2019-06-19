<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class laporanTA extends Model
{
    protected $table = 'laporanta';
    protected $fillable = ['nim','judul_ta','bidang','jenis_judulta','pembimbing1','pembimbing2','laporan','abstrak','lampiran','laporandoc','form_bimbingan','form_permohonan'];

    public function mahasiswa()
    {
        return $this->belongsTo('App\Mahasiswa', 'nim');
    }
    
}
