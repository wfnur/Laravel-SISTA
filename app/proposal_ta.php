<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class proposal_ta extends Model
{
    protected $table = 'proposal_ta';
    protected $fillable = [
        'nim',
        'revisike',
        'pembimbing_1',
        'pembimbing_2',
        'judul_ta',
        'bidang',
        'abstrak_ind',
        'keyword_ind',
        'abstrak_eng',
        'keyword_eng',
        'pendahuluan',
        'tinjauan_pustaka_1',
        'tinjauan_pustaka_2',
        'metode_pelaksanaan',
        'jadwal_kegiatan',
        'biaya',
        'pustaka_1',
        'pustaka_2',
        'pustaka_3',
        'pustaka_4',
        'pustaka_5',
        'pustaka_6',
        'pustaka_7',
        'pustaka_8',
        'pustaka_9',
        'pustaka_10',
        'pengesahan',
        'biodata',
        'biodata_pembimbing',
        'justifikasi_anggaran',
        'gambar_ilustrasi',
        'penjelasan_ilustrasi',
        'spek_teknis',
        'gambar_blok_diagram',
        'penjelasan_blok_diagram',
        'gambar_blok_diagram2',
        'penjelasan_blok_diagram2',
        'gambar_flowchart',
        'penjelasan_flowchart',
        'komponen',
        'status_dataProposal',
        'status_pendahuluan',
        'status_tinpus',
        'status_metode',
        'status_biayaJadwal',
        'status_dapus',
        'status_justifikasi',
        'status_uploadFile',
        'status_gambaranTeknologi',
    ];
}
