<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JadwalSidang;
use Auth;
use App\PoinPenilaian;
use App\laporanTA;
use App\revisiLaporan;
use App\nilaiSidangTA;
use PDF;
use Carbon\Carbon;

class sidangTAController extends Controller
{
    public function listMahasiswa(){
        
        $sekarang = date('Y-m-d');
       
        $listmhs = JadwalSidang::Where(function ($query) use ($sekarang) {
            $query->where('penguji1','=',Auth::user()->username)
                ->Where('tanggal','=',$sekarang);
        })
        ->OrWhere(function ($query) use ($sekarang) {
            $query->where('penguji2','=',Auth::user()->username)
                ->Where('tanggal','=',$sekarang);
        })
        ->OrWhere(function ($query) use ($sekarang) {
            $query->where('ketua_penguji','=',Auth::user()->username)
                ->Where('tanggal','=',$sekarang);
        })
        ->OrWhere(function ($query) use ($sekarang) {
            $query->where('pembimbing','=',Auth::user()->username)
                ->Where('tanggal','=',$sekarang);
        })
        ->get();
       

        return view('SidangTA.ListPenilaianSTA',compact('listmhs'));
    }

    public function penilaianSidangTA(Request $request, $nim){
        $sekarang = date('Y-m-d');
        // LAPORAN TUGAS AKHIR
        $laporanTA = laporanTA::where('nim','=', $nim)->first();

        // POIN PENILAIAN
        $poinPenilaianSTA_Pembimbing = PoinPenilaian::where('kategori','=','Nilai Pembimbing')->get();
        $poinPenilaianSTA_Presentasi = PoinPenilaian::where('kategori','=','Nilai Presentasi')->get();
        $poinPenilaianSTA_DemoAlat = PoinPenilaian::where('kategori','=','Nilai Demo Alat')->get();
        $poinPenilaianSTA_TanyaJawab = PoinPenilaian::where('kategori','=','Nilai Tanya Jawab')->get();

        // AMBIL DATA DARI JADWAL SIDANG
        $jadwalSidang = JadwalSidang::where('nim','=',$nim)
        ->Where(function ($query) {
            $query->where('ketua_penguji','=',Auth::user()->username)
                ->orWhere('penguji1','=',Auth::user()->username)
                ->orWhere('penguji2','=',Auth::user()->username)
                ->orWhere('pembimbing','=',Auth::user()->username);
        })
        ->first();

        // untuk tombol print nilai akhir
        $getKetuaPenguji = JadwalSidang::where('nim','=',$nim)
        ->where('ketua_penguji','=',Auth::user()->username)
        ->where('tanggal','=',$sekarang)
        ->first();

        if(isset($getKetuaPenguji)){
            $ketuaPenguji = "ok";
        }

        

        // REVISI LAPORAN
        $revisiLaporan = revisiLaporan::where('nim','=',$nim)
        ->where('kode_dosen','=',Auth::user()->username)
        ->first();

        if(auth()->user()->username == $jadwalSidang->ketua_penguji){
            $statusDosen = "Ketua Penguji";
            if (isset($revisiLaporan->status_nilaiSidang)) {
                if($revisiLaporan->status_nilaiSidang == 1){
                    return view('SidangTA.fixNilaiSidangTA_penguji',compact('ketuaPenguji','revisiLaporan','statusDosen','laporanTA','poinPenilaianSTA_Presentasi','poinPenilaianSTA_DemoAlat','poinPenilaianSTA_TanyaJawab','nim'));
                }else{
                    return view('SidangTA.penilaianSidangTA_penguji',compact('revisiLaporan','statusDosen','laporanTA','poinPenilaianSTA_Presentasi','poinPenilaianSTA_DemoAlat','poinPenilaianSTA_TanyaJawab','nim'));
                }
            }else{
                return view('SidangTA.penilaianSidangTA_penguji',compact('revisiLaporan','statusDosen','laporanTA','poinPenilaianSTA_Presentasi','poinPenilaianSTA_DemoAlat','poinPenilaianSTA_TanyaJawab','nim'));
            }
        }elseif(auth()->user()->username == $jadwalSidang->penguji1){
            $statusDosen = "Penguji 1 ";
            if (isset($revisiLaporan->status_nilaiSidang)) {
                if($revisiLaporan->status_nilaiSidang == 1){
                    return view('SidangTA.fixNilaiSidangTA_penguji',compact('revisiLaporan','statusDosen','laporanTA','poinPenilaianSTA_Presentasi','poinPenilaianSTA_DemoAlat','poinPenilaianSTA_TanyaJawab','nim'));
                }else{
                    return view('SidangTA.penilaianSidangTA_penguji',compact('revisiLaporan','statusDosen','laporanTA','poinPenilaianSTA_Presentasi','poinPenilaianSTA_DemoAlat','poinPenilaianSTA_TanyaJawab','nim'));
                }
            }else{
                return view('SidangTA.penilaianSidangTA_penguji',compact('revisiLaporan','statusDosen','laporanTA','poinPenilaianSTA_Presentasi','poinPenilaianSTA_DemoAlat','poinPenilaianSTA_TanyaJawab','nim'));
            }
        }elseif(auth()->user()->username == $jadwalSidang->penguji2){
            $statusDosen = "Penguji 2 ";
            if (isset($revisiLaporan->status_nilaiSidang)) {
                if($revisiLaporan->status_nilaiSidang == 1){
                    return view('SidangTA.fixNilaiSidangTA_penguji',compact('revisiLaporan','statusDosen','laporanTA','poinPenilaianSTA_Presentasi','poinPenilaianSTA_DemoAlat','poinPenilaianSTA_TanyaJawab','nim'));
                }else{
                    return view('SidangTA.penilaianSidangTA_penguji',compact('revisiLaporan','statusDosen','laporanTA','poinPenilaianSTA_Presentasi','poinPenilaianSTA_DemoAlat','poinPenilaianSTA_TanyaJawab','nim'));
                }
            }else{
                return view('SidangTA.penilaianSidangTA_penguji',compact('revisiLaporan','statusDosen','laporanTA','poinPenilaianSTA_Presentasi','poinPenilaianSTA_DemoAlat','poinPenilaianSTA_TanyaJawab','nim'));
            }
        }elseif(auth()->user()->username == $jadwalSidang->pembimbing){
            $statusDosen = "Pembimbing ";
            if (isset($revisiLaporan->status_nilaiSidang)) {
                if($revisiLaporan->status_nilaiSidang == 1){
                    return view('SidangTA.fixNilaiSidangTA_pembimbing',compact('revisiLaporan','statusDosen','laporanTA','poinPenilaianSTA_Pembimbing','nim'));
                }else{
                    return view('SidangTA.penilaianSidangTA_pembimbing',compact('revisiLaporan','statusDosen','laporanTA','poinPenilaianSTA_Pembimbing','nim'));
                }
            }else{
                return view('SidangTA.penilaianSidangTA_pembimbing',compact('revisiLaporan','statusDosen','laporanTA','poinPenilaianSTA_Pembimbing','nim'));
            }
            
        }else{
            $statusDosen = "error";
        }
        
    }

    public function saveNilaiSidang(Request $request){
        $nilaiSidang = nilaiSidangTA::updateOrCreate([
            'nim'   => $request->nim,
            'kode_dosen' => $request->kode_dosen,
            'poin_penilaian_id' => $request->poin_penilaian_id,
        ],[
            'nilai'        => $request->get('nilaiLaporan')
        ]);

        if ($nilaiSidang){
            echo "Saved";   
         }else{
             echo "Failed";
         }

    }

    public function finalisasiNilaiSidang(Request $request){

        $PoinPenilaian_pembimbing = PoinPenilaian::where('ket','=','Pembimbing')->count();
        $PoinPenilaian_penguji = PoinPenilaian::where('ket','=','Penguji')->count();

        $hitungrowNilaiSidang = nilaiSidangTA::where('nim','=',$request->nim)
            ->where('kode_dosen','=',$request->kode_dosen)
            ->count();
        
        $PoinPenilaian = PoinPenilaian::where('ket','=',$request->status_dosen)->count();

        if ($request->status_dosen == 'Pembimbing') {
            echo "Pembimbing = ".$PoinPenilaian_pembimbing ."<br>";
            echo $request->status_dosen." = ".$hitungrowNilaiSidang."<br>";

            if($PoinPenilaian_pembimbing != $hitungrowNilaiSidang){
                return redirect()->back()->with('gagal','Ada Komponen yang Belum Dinilai');
            }else{
                $revisiLaporan = revisiLaporan::updateOrCreate([
                    'nim'   => $request->nim,
                    'kode_dosen' => $request->kode_dosen,
                ],[
                    'status_nilaiSidang'   => 1
                ]);
        
                if (!$revisiLaporan) {
                    return redirect()->back()->with('gagal','Nilai Gagal Difinalisasi');
                }else{
                    return redirect()->back()->with('sukses','Nilai Berhasil Difinalisasi');
                }
            }
        }elseif($request->status_dosen == 'Penguji'){

            if($PoinPenilaian_penguji != $hitungrowNilaiSidang){
                return redirect()->back()->with('gagal','Ada Komponen yang Belum Dinilai');
            }else{
                $revisiLaporan = revisiLaporan::updateOrCreate([
                    'nim'   => $request->nim,
                    'kode_dosen' => $request->kode_dosen,
                ],[
                    'status_nilaiSidang'   => 1
                ]);
        
                if (!$revisiLaporan) {
                    return redirect()->back()->with('gagal','Nilai Gagal Difinalisasi');
                }else{
                    return redirect()->back()->with('sukses','Nilai Berhasil Difinalisasi');
                }
            }
        }else{
            return redirect()->back()->with('gagal','Error status dosen !!!');
        }
        
    }

    public function nilaiSidangAkhir(Request $request){
        // data dosen
        $jadwalSidang = JadwalSidang::where('nim','=',$request->nim)->first();
        $pembimbing = getNamaDosen($jadwalSidang->pembimbing);
        
        // data ta
        $laporanTA = laporanTA::where('nim','=',$request->nim)->first();
        $tahun = date('Y') - $laporanTA->mahasiswa->angkatan;
        $kelas = $tahun.$laporanTA->mahasiswa->kelas;
        if($laporanTA->mahasiswa->kelas == "NK"){
            $prodi = "D4 - Teknik Telekomunikasi";
        }else{
            $prodi = "D3 - Teknik Telekomunikasi";
        }

        //nilai pkm publikasi
        $nilaiPKMpublikasi = \App\nilaiPKMPublikasi::where('nim','=',$request->nim)->first();
        $nilai_pkm = $nilaiPKMpublikasi->poinPKM->bobot;
        $nilai_publikasi = $nilaiPKMpublikasi->poinPublikasi->bobot;

        //nilai Penguji
        $nilai_penguji = round(hitungNilaiPenguji($request->nim), 2);
        //nilai Pembimbing
        $nilai_pembimbing = round(hitungNilaiPembimbing($request->nim),2);
        

        //Pembagi nilai laporan
        $pembagi = pembagiNilaiLaporan($request->nim);

        //nilai Laporan
        $nilai_laporan = round(hitungNilaiLaporan($request->nim),2);
        $nilai_laporanFIX = ($nilai_laporan/$pembagi)*15;

        $hari =  Carbon::now()->formatLocalized('%A');
        $tanggal = Carbon::now()->formatLocalized('%d %B %Y');

        $nilai_bonus = $nilai_pkm + $nilai_publikasi ;
        $total_nilai = $nilai_pembimbing  + $nilai_laporanFIX + $nilai_penguji + $nilai_bonus;

        if($total_nilai >= 100){
            $total_nilai = 100;
        }

        //revisi
        $revisi = revisiLaporan::where('nim','=',$request->nim)
        ->get();
        $i=0;
        foreach ($revisi as $key) {
            if($key->revisi == ""){
                $statusRevisi[$i] = 0 ;
            }else{
                $statusRevisi[$i] = 1 ;
            }
        $i++;
        }

        $hitung_array = array_count_values($statusRevisi);
        if ( isset( $hitung_array[1] ) ) {
            $status_revisi =  "ada";
        }else{
            $status_revisi =  "kosong";
        }
        
        /*
         echo "<br> Nilai nilai : <br>";
         echo "Nilai Pembimbing = ".$nilai_pembimbing."<br>";
         echo "Nilai PKM = ".$nilai_pkm."<br>";
         echo "Nilai Publikasi = ".$nilai_publikasi."<br>";
         echo "Nilai Penguji = ".$nilai_penguji."<br>";
         echo "Nilai Laporan = ".$nilai_laporanFIX."<br>";
         echo "Nilai Total = ".$total_nilai."<br>";
        */
         
        $pdf = PDF::loadView('SidangTA.beritaAcara',
        compact('laporanTA',
        'nilai_pembimbing',
        'nilai_bonus',
        'nilai_laporanFIX',
        'nilai_penguji',
        'total_nilai',
        'kelas',
        'prodi',
        'hari',
        'tanggal',
        'jadwalSidang',
        'status_revisi'));
        return $pdf->stream();  
        

        /*
        if ($nilai_penguji == 0.0) {
            # code...
        }
        //return $pdf->download('laporan_sembako_'.date('Y-m-d_H-i-s').'.pdf');
        */

        
    }

    public function listMahasiswapanitia(){
        $mahasiswa = DB::table('mahasiswa')
            ->leftJoin('laporanta', 'laporanta.nim', '=', 'mahasiswa.nim')
            ->leftJoin('jadwal_sidang', 'jadwal_sidang.nim', '=', 'mahasiswa.nim')
            ->orderBy('mahasiswa.NIM', 'ASC')
            ->get();

        return view('SidangTA.ListMahasiswa_panitia',compact('mahasiswa'));
    }

    public function penilaianSidangTAPanitia(Request $request,$nim,$kode_dosen){
        $kode_dosen = $request->kode_dosen;
        $nim = $request->nim;


        $sekarang = date('Y-m-d');
        // LAPORAN TUGAS AKHIR
        $laporanTA = laporanTA::where('nim','=', $nim)->first();

        // POIN PENILAIAN
        $poinPenilaianSTA_Pembimbing = PoinPenilaian::where('kategori','=','Nilai Pembimbing')->get();
        $poinPenilaianSTA_Presentasi = PoinPenilaian::where('kategori','=','Nilai Presentasi')->get();
        $poinPenilaianSTA_DemoAlat = PoinPenilaian::where('kategori','=','Nilai Demo Alat')->get();
        $poinPenilaianSTA_TanyaJawab = PoinPenilaian::where('kategori','=','Nilai Tanya Jawab')->get();

        // AMBIL DATA DARI JADWAL SIDANG
        $jadwalSidang = JadwalSidang::where('nim','=',$nim)
        ->Where(function ($query) use ($kode_dosen) {
            $query->where('ketua_penguji','=',$kode_dosen)
                ->orWhere('penguji1','=',$kode_dosen)
                ->orWhere('penguji2','=',$kode_dosen)
                ->orWhere('pembimbing','=',$kode_dosen);
        })
        ->first();

        // untuk tombol print nilai akhir
        $getKetuaPenguji = JadwalSidang::where('nim','=',$nim)
        ->where('ketua_penguji','=',$kode_dosen)
        ->where('tanggal','=',$sekarang)
        ->first();


        if(isset($getKetuaPenguji)){
            $ketuaPenguji = "ok";
        }

        
        // REVISI LAPORAN
        $revisiLaporan = revisiLaporan::where('nim','=',$nim)
        ->where('kode_dosen','=',$kode_dosen)
        ->first();

        if($kode_dosen == $jadwalSidang->ketua_penguji){
            $statusDosen = "Ketua Penguji";
            
            return view('SidangTA.penilaianSidangTA_penguji_panitia',compact('ketuaPenguji','revisiLaporan','statusDosen','laporanTA','poinPenilaianSTA_Presentasi','poinPenilaianSTA_DemoAlat','poinPenilaianSTA_TanyaJawab','nim','kode_dosen'));
        }elseif($kode_dosen == $jadwalSidang->penguji1){
            $statusDosen = "Penguji 1 ";
            return view('SidangTA.penilaianSidangTA_penguji_panitia',compact('revisiLaporan','statusDosen','laporanTA','poinPenilaianSTA_Presentasi','poinPenilaianSTA_DemoAlat','poinPenilaianSTA_TanyaJawab','nim','kode_dosen'));
            
        }elseif($kode_dosen == $jadwalSidang->penguji2){
            $statusDosen = "Penguji 2 ";
            return view('SidangTA.penilaianSidangTA_penguji_panitia',compact('revisiLaporan','statusDosen','laporanTA','poinPenilaianSTA_Presentasi','poinPenilaianSTA_DemoAlat','poinPenilaianSTA_TanyaJawab','nim','kode_dosen'));
            
        }elseif($kode_dosen == $jadwalSidang->pembimbing){
            $statusDosen = "Pembimbing ";
            return view('SidangTA.penilaianSidangTA_pembimbing_panitia',compact('statusDosen','laporanTA','poinPenilaianSTA_Pembimbing','nim','kode_dosen'));
            
            
        }else{
            $statusDosen = "error";
        }
    }
}
