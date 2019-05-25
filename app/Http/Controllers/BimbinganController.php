<?php

namespace App\Http\Controllers;

use App\bimbingan;
use Illuminate\Http\Request;
use \App\MingguBimbingan;

class BimbinganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        foreach ($MingguBimbingan as $value) {
            if($value->akhir >= $request->tanggalbimbingan && $value->awal <= $request->tanggalbimbingan){
                $idminggu = $value->id;
            }
        }

        $bimbingan = new Bimbingan;
        $bimbingan->nim = auth()->user()->username;
        $bimbingan->pembimbing = $request->pembimbing;
        $bimbingan->minggubimbingan_id = $idminggu;
        $bimbingan->tanggalbimbingan = $request->tanggalbimbingan;
        $bimbingan->save();
        
        if ($request->hasFile('laporanTA')) {
            $imgName = generateNamaFormBimbingan(Auth::user()->username,$request->pembimbing,$bimbingan->tanggalbimbingan,$request->file('laporanTA')->getClientOriginalExtension());
            $request->file('laporanTA')->move('Form_Bimbingan/',$imgName);

            $bimbingan = new Bimbingan;
            $bimbingan->formbimbingan = $imgName;
            $bimbingan->save();

            if(!$laporanTAUpload){
                return redirect()->back()->with('gagal','Gagal Upload Diubah/Disimpan');
            }
         }
        
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
}
