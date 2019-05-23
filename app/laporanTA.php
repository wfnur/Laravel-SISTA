<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class laporanTA extends Model
{
    protected $table = 'laporanta';
    protected $fillable = ['nim','judul_ta','bidang','pembimbing1','pembimbing2','laporan'];
}
