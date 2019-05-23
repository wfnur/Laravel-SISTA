<?php

use App\proposal_ta;
use \App\Mahasiswa;
//use Auth;

function cekStatusFinalisasi_dataProposal($reviske){
    $proposal_ta = proposal_ta::where('nim', '=',auth()->user()->username)
        ->where('revisike','=',$reviske)
        ->first();

    $judul = $proposal_ta->judul_ta;
    $bidang = $proposal_ta->bidang;
    $p1 = $proposal_ta->pembimbing_1;
    $p2 = $proposal_ta->pembimbing_2;

    if ($judul != "" || $bidang != "" || $p1 != "" || $p2 != "") {
        if ($proposal_ta->status_dataProposal == "1") {
            $button = "<span class='btn btn-lg btn-danger' >Sudah difinalisasi</span>";
        }else{
            $button = "
            <p>
            Dengan menekan tombol dibawah ini, saya sudah yakin dengan data-data diatas dan siap untuk dinilai dan dikomentari
            oleh reviewer.
            <span style='color:red'> Setelah menekan tombol dibawah ini, data-data diatas sudah tidak bisa diubah kembali, jadi pastikan data tersebut
            SUDAH DIISI DAN DISIMPAN (dengan menekan tombol simpan sebagai draft) TERLEBIH DAHULU !!!</span>
            </p>
            <button class='btn btn-lg btn-success col-md-12'> Finalisasi</button>";
        }
    }else{}

    return $button;
}

function cekStatusFinalisasi_abstrak($reviske){
    
    $proposal_ta = proposal_ta::where('nim', '=',auth()->user()->username)
        ->where('revisike','=',$reviske)
        ->first();

    $abstrak_ind    = $proposal_ta->abstrak_ind;
    $abstrak_eng    = $proposal_ta->abstrak_eng;
    $keyword_ind    = $proposal_ta->keyword_ind;
    $keyword_eng    = $proposal_ta->keyword_eng;

    if ($abstrak_ind != "" || $abstrak_eng != "" || $keyword_ind != "" || $keyword_eng != "") {
        if ($proposal_ta->status_abstrak == "1") {
            $button_abstrak = "<span class='btn btn-lg btn-danger' >Sudah difinalisasi</span>";
        }else{
            $button_abstrak = "
            <p>
            Dengan menekan tombol dibawah ini, saya sudah yakin dengan data-data diatas dan siap untuk dinilai dan dikomentari
            oleh reviewer.
            <span style='color:red'> Setelah menekan tombol dibawah ini, data-data diatas sudah tidak bisa diubah kembali, jadi pastikan data tersebut
            SUDAH DIISI DAN DISIMPAN (dengan menekan tombol simpan sebagai draft) TERLEBIH DAHULU !!!</span>
            </p>
            <button class='btn btn-lg btn-success col-md-12'> Finalisasi</button>";
        }
    }else{
        $button_abstrak = "";
    }

    return $button_abstrak;
}

function cekStatusFinalisasi_pendahuluan($reviske){
    
    $proposal_ta = proposal_ta::where('nim', '=',auth()->user()->username)
        ->where('revisike','=',$reviske)
        ->first();

    $pend   = $proposal_ta->pendahuluan;

    if ($pend != "") {
        if ($proposal_ta->status_pendahuluan == "1") {
            $button = "<span class='btn btn-lg btn-danger' >Sudah difinalisasi</span>";
        }else{
            $button = "
            <p>
            Dengan menekan tombol dibawah ini, saya sudah yakin dengan data-data diatas dan siap untuk dinilai dan dikomentari
            oleh reviewer.
            <span style='color:red'> Setelah menekan tombol dibawah ini, data-data diatas sudah tidak bisa diubah kembali, jadi pastikan data tersebut
            SUDAH DIISI DAN DISIMPAN (dengan menekan tombol simpan sebagai draft) TERLEBIH DAHULU !!!</span>
            </p>
            <button class='btn btn-lg btn-success col-md-12'> Finalisasi</button>";
        }
    }else{
        $button = "";
    }

    return $button;
}

function cekStatusFinalisasi_tinpus($reviske){
    
    $proposal_ta = proposal_ta::where('nim', '=',auth()->user()->username)
        ->where('revisike','=',$reviske)
        ->first();

    $tinpus1   = $proposal_ta->tinjauan_pustaka_1;
    $tinpus2   = $proposal_ta->tinjauan_pustaka_2;

    if ($tinpus1 != "" || $tinpus2 != "") {
        if ($proposal_ta->status_tinpus == "1") {
            $button = "<span class='btn btn-lg btn-danger' >Sudah difinalisasi</span>";
        }else{
            $button = "
            <p>
            Dengan menekan tombol dibawah ini, saya sudah yakin dengan data-data diatas dan siap untuk dinilai dan dikomentari
            oleh reviewer.
            <span style='color:red'> Setelah menekan tombol dibawah ini, data-data diatas sudah tidak bisa diubah kembali, jadi pastikan data tersebut
            SUDAH DIISI DAN DISIMPAN (dengan menekan tombol simpan sebagai draft) TERLEBIH DAHULU !!!</span>
            </p>
            <button class='btn btn-lg btn-success col-md-12'> Finalisasi</button>";
        }
    }else{
        $button = "";
    }

    return $button;
}

function cekStatusFinalisasi_metode($reviske){
    
    $proposal_ta = proposal_ta::where('nim', '=',auth()->user()->username)
        ->where('revisike','=',$reviske)
        ->first();

    $metode   = $proposal_ta->metode_pelaksanaan;

    if ($metode != "" ) {
        if ($proposal_ta->status_metode == "1") {
            $button = "<span class='btn btn-lg btn-danger' >Sudah difinalisasi</span>";
        }else{
            $button = "
            <p>
            Dengan menekan tombol dibawah ini, saya sudah yakin dengan data-data diatas dan siap untuk dinilai dan dikomentari
            oleh reviewer.
            <span style='color:red'> Setelah menekan tombol dibawah ini, data-data diatas sudah tidak bisa diubah kembali, jadi pastikan data tersebut
            SUDAH DIISI DAN DISIMPAN (dengan menekan tombol simpan sebagai draft) TERLEBIH DAHULU !!!</span>
            </p>
            <button class='btn btn-lg btn-success col-md-12'> Finalisasi</button>";
        }
    }else{
        $button = "";
    }

    return $button;
}

function cekStatusFinalisasi_biayaJadwal($reviske){
    
    $proposal_ta = proposal_ta::where('nim', '=',auth()->user()->username)
        ->where('revisike','=',$reviske)
        ->first();

    $biaya   = $proposal_ta->biaya;
    $jadwal   = $proposal_ta->jadwal_kegiatan;

    if ($biaya != "" || $jadwal != "" ) {
        if ($proposal_ta->status_biayaJadwal == "1") {
            $button = "<span class='btn btn-lg btn-danger' >Sudah difinalisasi</span>";
        }else{
            $button = "
            <p>
            Dengan menekan tombol dibawah ini, saya sudah yakin dengan data-data diatas dan siap untuk dinilai dan dikomentari
            oleh reviewer.
            <span style='color:red'> Setelah menekan tombol dibawah ini, data-data diatas sudah tidak bisa diubah kembali, jadi pastikan data tersebut
            SUDAH DIISI DAN DISIMPAN (dengan menekan tombol simpan sebagai draft) TERLEBIH DAHULU !!!</span>
            </p>
            <button class='btn btn-lg btn-success col-md-12'> Finalisasi</button>";
        }
    }else{
        $button = "";
    }

    return $button;
}

function cekStatusFinalisasi_dapus($reviske){
    
    $proposal_ta = proposal_ta::where('nim', '=',auth()->user()->username)
        ->where('revisike','=',$reviske)
        ->first();

    $dapus1   = $proposal_ta->pustaka_1;
    $dapus2   = $proposal_ta->pustaka_2;
    $dapus3   = $proposal_ta->pustaka_3;
    $dapus4   = $proposal_ta->pustaka_4;
    $dapus5   = $proposal_ta->pustaka_5;
    $dapus6   = $proposal_ta->pustaka_6;
    $dapus7   = $proposal_ta->pustaka_7;
    $dapus8   = $proposal_ta->pustaka_8;
    $dapus9   = $proposal_ta->pustaka_9;
    $dapus10  = $proposal_ta->pustaka_10;

    if ($dapus1 != "" || $dapus2 != "" || $dapus3 != "" || $dapus4 != "" || $dapus5 != "" || $dapus6 != "" || $dapus7 != "" || $dapus8 != "" || $dapus9 != "" || $dapus10 != "" ) {
        if ($proposal_ta->status_dapus == "1") {
            $button = "<span class='btn btn-lg btn-danger' >Sudah difinalisasi</span>";
        }else{
            $button = "
            <p>
            Dengan menekan tombol dibawah ini, saya sudah yakin dengan data-data diatas dan siap untuk dinilai dan dikomentari
            oleh reviewer.
            <span style='color:red'> Setelah menekan tombol dibawah ini, data-data diatas sudah tidak bisa diubah kembali, jadi pastikan data tersebut
            SUDAH DIISI DAN DISIMPAN (dengan menekan tombol simpan sebagai draft) TERLEBIH DAHULU !!!</span>
            </p>
            <button class='btn btn-lg btn-success col-md-12'> Finalisasi</button>";
        }
    }else{
        $button = "";
    }

    return $button;
}

function cekStatusFinalisasi_justifikasi($reviske){
    
    $proposal_ta = proposal_ta::where('nim', '=',auth()->user()->username)
        ->where('revisike','=',$reviske)
        ->first();

    if ($proposal_ta->justifikasi_anggaran != "" ) {
        if ($proposal_ta->status_justifikasi == "1") {
            $button = "<span class='btn btn-lg btn-danger' >Sudah difinalisasi</span>";
        }else{
            $button = "
            <p>
            Dengan menekan tombol dibawah ini, saya sudah yakin dengan data-data diatas dan siap untuk dinilai dan dikomentari
            oleh reviewer.
            <span style='color:red'> Setelah menekan tombol dibawah ini, data-data diatas sudah tidak bisa diubah kembali, jadi pastikan data tersebut
            SUDAH DIISI DAN DISIMPAN (dengan menekan tombol simpan sebagai draft) TERLEBIH DAHULU !!!</span>
            </p>
            <button class='btn btn-lg btn-success col-md-12'> Finalisasi</button>";
        }
    }else{
        $button = "";
    }

    return $button;
}

function generateNamaLaporanTA($nim,$ext){
    $mahasiswa = Mahasiswa::find($nim);
    $str_name= str_replace(" ","",$mahasiswa->nama);
    $namafile = "LaporanTA_".$nim."_".$str_name."_".$mahasiswa->kelas."_".$mahasiswa->angkatan.".".$ext;

    return $namafile;
}

?>