<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use \App\Dosen;
use \App\bidang;
use \App\laporanTA;
use \App\JadwalSidang;
use \App\poinPenilaianLaporan;
use \App\nilaiLaporan;
use \App\Mahasiswa;
use \App\revisiLaporan;
use Auth;

class laporanTAController extends Controller
{
    public function create(){
        $pembimbing1 = Dosen::where('status','=','0')->get();
        $pembimbing2 = Dosen::where('status','=','1')->get();
        $bidang      = Bidang::all();

        $cekdata = laporanTA::where('nim', '=', Auth::user()->username)->get();

        if ($cekdata->isEmpty()) {
            return view('LaporanTA.create',compact(
            'pembimbing1',
            'pembimbing2',
            'bidang'
            ));
        }else{
            $laporanTA = laporanTA::where('nim', '=', Auth::user()->username)->first();

            return view('LaporanTA.edit',compact(
            'pembimbing1',
            'pembimbing2',
            'bidang',
            'laporanTA'
            ));
        }
    }

    public function store(Request $request){
        
        $laporanTA = laporanTA::updateOrCreate([
            'nim'   => Auth::user()->username,
        ],[
            'judul_ta'       => $request->judul_ta,
            'bidang'         => $request->bidang,
            'jenis_judulta'  => $request->jenis_judulta,
            'pembimbing1'    => $request->pembimbing1,
            'pembimbing2'    => $request->pembimbing2,
            
        ]);

        if ($request->hasFile('laporanTA')) {
            $imgName = generateNamaLaporanTA(Auth::user()->username,$request->file('laporanTA')->getClientOriginalExtension());
            $fileLaporan = $request->file('laporanTA');
            $fileLaporan->storeAs('public/Berkas_LaporanTA', $imgName);
            //$request->file('laporanTA')->move('public/Berkas_LaporanTA/',$imgName);

            $laporanTAUpload = laporanTA::updateOrCreate([
                'nim'   => Auth::user()->username,
            ],[
                'laporan' => $imgName,
                
            ]);

            if(!$laporanTAUpload){
                return redirect()->back()->with('gagal','Gagal Upload Diubah/Disimpan');
            }
        }

        if ($request->hasFile('abstrak')) {
            $imgName = generateNamaAbstrak(Auth::user()->username,$request->file('abstrak')->getClientOriginalExtension());
            $fileLaporan = $request->file('abstrak');
            $fileLaporan->storeAs('public/Berkas_LaporanTA', $imgName);
            //$request->file('laporanTA')->move('public/Berkas_LaporanTA/',$imgName);

            $laporanTAUpload = laporanTA::updateOrCreate([
                'nim'   => Auth::user()->username,
            ],[
                'abstrak' => $imgName,
                
            ]);

            if(!$laporanTAUpload){
                return redirect()->back()->with('gagal','Gagal Upload Abstrak Diubah/Disimpan');
            }
        }

        if ($request->hasFile('lampiran')) {
            $imgName = generateNamaLampiran(Auth::user()->username,$request->file('lampiran')->getClientOriginalExtension());
            $fileLaporan = $request->file('lampiran');
            $fileLaporan->storeAs('public/Berkas_LaporanTA', $imgName);
            //$request->file('laporanTA')->move('public/Berkas_LaporanTA/',$imgName);

            $laporanTAUpload = laporanTA::updateOrCreate([
                'nim'   => Auth::user()->username,
            ],[
                'lampiran' => $imgName,
                
            ]);

            if(!$laporanTAUpload){
                return redirect()->back()->with('gagal','Gagal Upload Lampiran Diubah/Disimpan');
            }
        }

        if ($request->hasFile('laporandoc')) {
            $imgName = generateNamaLaporanTA(Auth::user()->username,$request->file('laporandoc')->getClientOriginalExtension());
            $fileLaporan = $request->file('laporandoc');
            $fileLaporan->storeAs('public/Berkas_LaporanTA', $imgName);
            //$request->file('laporanTA')->move('public/Berkas_LaporanTA/',$imgName);

            $laporanTAUpload = laporanTA::updateOrCreate([
                'nim'   => Auth::user()->username,
            ],[
                'laporandoc' => $imgName,
                
            ]);

            if(!$laporanTAUpload){
                return redirect()->back()->with('gagal','Gagal Upload Lampiran Diubah/Disimpan');
            }
        }

        if ($request->hasFile('form_bimbingan')) {

            $cekformBimbingan = laporanTA::where('nim','=' ,Auth::user()->username)->first();
            if ($cekformBimbingan->form_bimbingan != "") {
                Storage::delete($cekformBimbingan->form_bimbingan);
            }
            
            $tanggal = str_replace("-","",date("Y-m-d"));
            $imgName = generateNamaFormBimbingan(Auth::user()->username,"P1",$tanggal,$request->file('form_bimbingan')->getClientOriginalExtension());
            $fileLaporan = $request->file('form_bimbingan');
            $fileLaporan->storeAs('public/Form_Bimbingan', $imgName);
            //$request->file('laporanTA')->move('public/Berkas_LaporanTA/',$imgName);

            $laporanTAUpload = laporanTA::updateOrCreate([
                'nim'   => Auth::user()->username,
            ],[
                'form_bimbingan' => $imgName,
                
            ]);

            if(!$laporanTAUpload){
                return redirect()->back()->with('gagal','Gagal Upload Form Bimbingan Diubah/Disimpan');
            }
        }

        if ($request->hasFile('form_permohonan')) {
            $imgName = generateNamaFormPermohonan(Auth::user()->username,$request->file('form_permohonan')->getClientOriginalExtension());
            $fileSurat = $request->file('form_permohonan');
            $fileSurat->storeAs('public/Form_Permohonan', $imgName);

            $laporanPermohonan = laporanTA::updateOrCreate([
                'nim'   => Auth::user()->username,
            ],[
                'form_permohonan' => $imgName,
                
            ]);


            if(!$laporanPermohonan){
                return redirect()->back()->with('gagal','Gagal Upload Diubah/Disimpan');
            }
        }
        
        if (!$laporanTA) {
            return redirect()->back()->with('gagal','Data Gagal Diubah/Disimpan');
        }else{
            return redirect()->back()->with('sukses','Data Berhasil Diubah/Disimpan');
        }

    }

    public function listMahasiswa(){
        $listmhs = JadwalSidang::Where('ketua_penguji','=',Auth::user()->username)
        ->orWhere('penguji1','=',Auth::user()->username)
        ->orWhere('penguji2','=',Auth::user()->username)
        ->get();
        //return dd($listmhs);
        return view('LaporanTA.ListPenilaianTA',compact('listmhs'));
    }

    public function penilaianLaporan(Request $request, $nim){
        // LAPORAN TUGAS AKHIR
        $laporanTA = laporanTA::where('nim','=', $nim)->first();

        // POIN PENILAIAN
        $poinPenilaianLaporan_Depan = poinPenilaianLaporan::where('ket','=','Depan')->get();
        $poinPenilaianLaporan_Bab = poinPenilaianLaporan::where('ket','like','BAB%')->get();
        $poinPenilaianLaporan_Lampiran = poinPenilaianLaporan::where('ket','=','lampiran')->get();

        // AMBIL DATA DARI JADWAL SIDANG
        $jadwalSidang = JadwalSidang::where('nim','=',$nim)
        ->Where(function ($query) {
            $query->where('ketua_penguji','=',Auth::user()->username)
                ->orWhere('penguji1','=',Auth::user()->username)
                ->orWhere('penguji2','=',Auth::user()->username);
        })
        ->first();

        if(auth()->user()->username == $jadwalSidang->ketua_penguji){
            $statusDosen = "Ketua Penguji";
        }elseif(auth()->user()->username == $jadwalSidang->penguji1){
            $statusDosen = "Penguji 1 ";
        }elseif(auth()->user()->username == $jadwalSidang->penguji2){
            $statusDosen = "Penguji 2 ";
        }else{
            $statusDosen = "error";
        }

        // NILAI LAPORAN

        $nilaiLaporan = nilaiLaporan::where('nim','=',$nim)
        ->where('kode_dosen','=',Auth::user()->username)
        ->first();

        // REVISI LAPORAN
        $revisiLaporan = revisiLaporan::where('nim','=',$nim)
        ->where('kode_dosen','=',Auth::user()->username)
        ->first();
        

        if (isset($revisiLaporan->status)) {
            if ($revisiLaporan->status == 1) {
                return view('LaporanTA.penilaianLaporan',compact('laporanTA','jadwalSidang','statusDosen','poinPenilaianLaporan_Depan','poinPenilaianLaporan_Bab','poinPenilaianLaporan_Lampiran','nim','revisiLaporan'));
            } else {
                return view('LaporanTA.editPenilaianLaporan',compact('laporanTA','jadwalSidang','statusDosen','poinPenilaianLaporan_Depan','poinPenilaianLaporan_Bab','poinPenilaianLaporan_Lampiran','nim','revisiLaporan'));
            }  
        }else{
            return view('LaporanTA.editPenilaianLaporan',compact('laporanTA','jadwalSidang','statusDosen','poinPenilaianLaporan_Depan','poinPenilaianLaporan_Bab','poinPenilaianLaporan_Lampiran','nim','revisiLaporan'));
        }
        
        
        
    }

    public function saveNilaiLaporan(Request $request){
        $nilaiLaporan = nilaiLaporan::updateOrCreate([
            //Add unique field combo to match here
            //For example, perhaps you only want one entry per user:
            'nim'   => $request->nim,
            'kode_dosen' => $request->kode_dosen,
            'poin_penilaian_id' => $request->poin_penilaian_id,
        ],[
            'poin_penilaian_id'   => $request->get('poin_penilaian_id'),
            'nilai'        => $request->get('nilaiLaporan')
        ]);

        if ($nilaiLaporan){
            echo "Saved";   
         }else{
             echo "Failed";
         }

    }

    public function saveRevisiLaporan(Request $request){
        $revisiLaporan = revisiLaporan::updateOrCreate([
            //Add unique field combo to match here
            //For example, perhaps you only want one entry per user:
            'nim'   => $request->nim,
            'kode_dosen' => $request->kode_dosen,
        ],[
            'revisi'   => $request->get('revisi')
        ]);

        if (!$revisiLaporan) {
            return redirect()->back()->with('gagal','Data Gagal Diubah/Disimpan');
        }else{
            return redirect()->back()->with('sukses','Data Berhasil Diubah/Disimpan');
        }
    }

    public function detailNilaiLaporan(Request $request){
        $nim = $request->nim;

        $mahasiswa = DB::table('mahasiswa')
            ->Join('laporanta', 'laporanta.nim', '=', 'mahasiswa.NIM')
            ->where('mahasiswa.NIM','=',$nim)
            ->first();

        $poinPenilaianLaporan = poinPenilaianLaporan::all();
        $jadwalSidang = JadwalSidang::where('nim','=',$nim)->first();

        /*
        $nilai = DB::table('nilai_laporan')
            ->Join('mahasiswa', 'mahasiswa.NIM', '=', 'nilai_laporan.nim')
            ->Join('dosen', 'dosen.kode_dosen', '=', 'nilai_laporan.kode_dosen')
            ->Join('poin_penilaianlaporan', 'poin_penilaianlaporan.id', '=', 'nilai_laporan.poin_penilaianlaporan_id')
            ->where('nilai_laporan.nim','=', $request->nim)
            ->get();
        */
        
        
        //return dd($nilai);

        return view('LaporanTA.detailNilaiLaporan',compact('mahasiswa','poinPenilaianLaporan','nim','jadwalSidang'));

        
    }

    public function finalisasiRevisiLaporan(Request $request){
        $revisiLaporan = revisiLaporan::updateOrCreate([
            //Add unique field combo to match here
            //For example, perhaps you only want one entry per user:
            'nim'   => $request->nim,
            'kode_dosen' => $request->kode_dosen,
        ],[
            'status'   => 1
        ]);

        if (!$revisiLaporan) {
            return redirect()->back()->with('gagal','Nilai Gagal Difinalisasi');
        }else{
            return redirect()->back()->with('sukses','Nilai Berhasil Difinalisasi');
        }
    }

    public function listMahasiswapanitia(){
        $mahasiswa = DB::table('mahasiswa')
            ->leftJoin('laporanta', 'laporanta.nim', '=', 'mahasiswa.nim')
            ->leftJoin('jadwal_sidang', 'jadwal_sidang.nim', '=', 'mahasiswa.nim')
            ->orderBy('mahasiswa.NIM', 'ASC')
            ->get();

        return view('LaporanTA.ListMahasiswa_panitia',compact('mahasiswa'));
    }

    public function unlocknilailaporan(Request $request){
        $revisiLaporan = revisiLaporan::where('nim','=',$request->nim)
        ->where('kode_dosen','=',$request->kode_dosen)
        ->first();
        //dd($revisiLaporan);
        $revisiLaporan->status = 0;
        $revisiLaporan->update();

        if ($revisiLaporan->update()) {
            echo "saved";
        }else{
            echo "failed";
        }
    }

    public function downloadfile(Request $request, $nama){
        $name = str_random(5).".pdf";
        $path = public_path().'/storage/Berkas_LaporanTA/'.$nama;
        //dd($name);
        return response()->download($path, $name);
    }
    
}
