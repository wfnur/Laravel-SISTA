<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JadwalSidang extends Model
{
    protected $table = 'jadwal_sidang';
    protected $fillable = ['nim','tanggal','pembimbing','ketua_penguji','penguji1','penguji2'];

    public function mahasiswa()
    {
        return $this->belongsTo('App\Mahasiswa', 'nim');
    }

    public function pembimbingRelasi()
    {
        return $this->belongsTo('App\Dosen', 'pembimbing');
    }

    public function ketua_pengujiRelasi()
    {
        return $this->belongsTo('App\Dosen', 'ketua_penguji');
    }

    public function penguji1Relasi()
    {
        return $this->belongsTo('App\Dosen', 'penguji1');
    }

    public function penguji2Relasi()
    {
        return $this->belongsTo('App\Dosen', 'penguji2');
    }
}
