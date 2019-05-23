<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Dosen;
use \App\Bidang;
use \App\laporanTA;
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
        
        $laporanTA = \App\laporanTA::updateOrCreate([
            'nim'   => Auth::user()->username,
        ],[
            'judul_ta'    => $request->judul_ta,
            'bidang'      => $request->bidang,
            'pembimbing1' => $request->pembimbing1,
            'pembimbing2' => $request->pembimbing2,
            
        ]);

        if ($request->hasFile('laporanTA')) {
            $imgName = generateNamaLaporanTA(Auth::user()->username,$request->file('laporanTA')->getClientOriginalExtension());
            $request->file('laporanTA')->move('Berkas_LaporanTA/',$imgName);

            $laporanTAUpload = \App\laporanTA::updateOrCreate([
                'nim'   => Auth::user()->username,
            ],[
                'laporan' => $imgName,
                
            ]);
            if(!$laporanTAUpload){
                return redirect()->back()->with('gagal','Gagal Upload Diubah/Disimpan');
            }
         }
         
        //$imgName = generateNamaLaporanTA(Auth::user()->username,$request->file('laporanTA')->getClientOriginalExtension());

        if (!$laporanTA) {
            return redirect()->back()->with('gagal','Data Gagal Diubah/Disimpan');
        }else{
            return redirect()->back()->with('sukses','Data Berhasil Diubah/Disimpan');
        }
    }
}
