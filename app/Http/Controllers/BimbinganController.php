<?php

namespace App\Http\Controllers;

use App\bimbingan;
use Illuminate\Http\Request;
use \App\MingguBimbingan;
use Illuminate\Support\Carbon;
use Auth;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use App\Mahasiswa;
use Illuminate\Support\Facades\DB;

class BimbinganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bimbingan = Bimbingan::where('nim', '=', Auth::user()->username)->get();
        return view('Bimbingan.index',compact('bimbingan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Bimbingan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $MingguBimbingan = MingguBimbingan::all();
        $idminggu ="";
        $cektglbimbingan = "q1";
        $cekmingguini = "q2";
        $mytime = Carbon::now();

        foreach ($MingguBimbingan as $value) {
            //Cek tanggal bimbingan yang di inputkan oleh user apakah pada minggu ini

            //. get tanggal bimbingan
            if($value->akhir >= $request->tanggalbimbingan && $value->awal <= $request->tanggalbimbingan){
                $cektglbimbingan = $value->id;
                //return $value->mingguke." => ".$value->akhir ." ". $request->tanggalbimbingan ." <br> ". $value->awal ." ". $request->tanggalbimbingan;
            }

            //.get tanggal hari ini saat upload
            if($value->akhir >= $mytime && $value->awal <= $mytime){
                $cekmingguini = $value->id;  
                //return $value->akhir ." ". $mytime ." <br> ". $value->awal ." ". $mytime; 
            }
        }
        
        if ($cektglbimbingan == $cekmingguini) {

            $bimbingan = new Bimbingan;
            $bimbingan->nim = auth()->user()->username;
            $bimbingan->pembimbing = $request->pembimbing;
            $bimbingan->minggubimbingan_id = $cektglbimbingan;
            $bimbingan->tanggalbimbingan = $request->tanggalbimbingan;
            //$bimbingan->save();
            
            
            if ($request->hasFile('formBimbingan')) {
                $destinationPath = public_path() . 'Form_Bimbingan/';
                $tanggalNama = Carbon::parse($request->tanggalbimbingan)->format('Ymd');;
                $imgName = generateNamaFormBimbingan(Auth::user()->username,$request->pembimbing,$tanggalNama,$request->file('formBimbingan')->getClientOriginalExtension());
                //return dd($imgName);
                $request->file('formBimbingan')->move('Form_Bimbingan/',$imgName);

                //$bimbingan = new Bimbingan;
                $bimbingan->formbimbingan = $imgName;
                $bimbingan->save();
                

                if(!$bimbingan->save()){
                    return redirect()->back()->with('gagal','Gagal Upload Diubah/Disimpan');
                }
            }
            return redirect()->back()->with('sukses','Berhasil Menyimpan Data Bimbingan ');
        } else {
            return redirect()->back()->with('gagal','Upload Form Bimbingan harus pada minggu ini ');
        }
        
        /*
        
         */
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\bimbingan  $bimbingan
     * @return \Illuminate\Http\Response
     */
    public function show(bimbingan $bimbingan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\bimbingan  $bimbingan
     * @return \Illuminate\Http\Response
     */
    public function edit(bimbingan $bimbingan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\bimbingan  $bimbingan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, bimbingan $bimbingan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\bimbingan  $bimbingan
     * @return \Illuminate\Http\Response
     */
    public function destroy(bimbingan $bimbingan)
    {
        //
    }

    public function verifikasi(Request $request){
        $mingguBimbingan = mingguBimbingan::all();
        if ($request->has('cari')) {
            $bimbingan = bimbingan::where('mingguBimbingan_id', '=', $request->cari)->get();
            return view('Bimbingan.verifikasi',compact('mingguBimbingan','bimbingan'));

        }else{
            return view('Bimbingan.verifikasi',compact('mingguBimbingan'));
        }
    }

    public function rekap(Request $request){
        if ($request->has('kelas')) {
            $mahasiswa = Mahasiswa::where('kelas','=',$request->kelas)->get();
            $mingguBimbingan = mingguBimbingan::get();
            return view('Bimbingan.rekap',compact('mahasiswa','mingguBimbingan'));
        }else{
            return view('Bimbingan.rekap');
        }
        
    }

    public function saveBimbingan(Request $request){
        $kode_bimbingan = isset($request->kode_bimbingan)?intval($request->kode_bimbingan):'';
        $status =isset($request->status)?intval($request->status):'';
        if ($status == 0) {
            $status = 1;
        } elseif ($status == 1) {
            $status = 0;
        }

        $bimbingan = bimbingan::find($kode_bimbingan);
        $bimbingan->status = $status;
        $bimbingan->update();

        if ($bimbingan->update()){
            if ($status=='1') {
                echo "Verifikasi Success";
            }else{
                echo "Verifikasi Dibatalkan";   
            }
         }else{
             echo "Gagal Update";
         }
    }

}
