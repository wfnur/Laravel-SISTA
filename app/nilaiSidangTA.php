<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nilaiSidangTA extends Model
{
    protected $table = 'nilai_sidangta';
    protected $fillable = ['nim','kode_dosen','poin_penilaian_id','nilai'];
}
