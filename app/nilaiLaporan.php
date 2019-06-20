<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nilaiLaporan extends Model
{
    protected $table = 'nilai_laporan';
    protected $fillable = ['nim','kode_dosen','poin_penilaian_id','nilai'];
}
