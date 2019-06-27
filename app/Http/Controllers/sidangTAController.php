<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JadwalSidang;
use Auth;
use App\PoinPenilaian;
use App\laporanTA;
use App\revisiLaporan;
use App\nilaiSidangTA;

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

        // REVISI LAPORAN
        $revisiLaporan = revisiLaporan::where('nim','=',$nim)
        ->where('kode_dosen','=',Auth::user()->username)
        ->first();

        if(auth()->user()->username == $jadwalSidang->ketua_penguji){
            $statusDosen = "Ketua Penguji";
            if (isset($revisiLaporan->status_nilaiSidang)) {
                if($revisiLaporan->status_nilaiSidang == 1){
                    return view('SidangTA.fixNilaiSidangTA_penguji',compact('revisiLaporan','statusDosen','laporanTA','poinPenilaianSTA_Presentasi','poinPenilaianSTA_DemoAlat','poinPenilaianSTA_TanyaJawab','nim'));
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
                    return view('SidangTA.fixNilaiSidangTA_pembimbing',compact('statusDosen','laporanTA','poinPenilaianSTA_Pembimbing','nim'));
                }else{
                    return view('SidangTA.penilaianSidangTA_pembimbing',compact('statusDosen','laporanTA','poinPenilaianSTA_Pembimbing','nim'));
                }
            }else{
                return view('SidangTA.penilaianSidangTA_pembimbing',compact('statusDosen','laporanTA','poinPenilaianSTA_Pembimbing','nim'));
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
}
