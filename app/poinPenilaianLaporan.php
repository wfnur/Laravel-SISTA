<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class poinPenilaianLaporan extends Model
{
    protected $table = 'poin_penilaianlaporan';
    protected $fillable = ['poin_penilaian','deskripsi','bobot','ket'];
}
