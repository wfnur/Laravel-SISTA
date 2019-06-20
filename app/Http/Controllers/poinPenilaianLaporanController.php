<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\poinPenilaianLaporan;

class poinPenilaianLaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $PoinPenilaianLaporan = poinPenilaianLaporan::all();
        return view('PoinPenilaianLaporan.index',compact('PoinPenilaianLaporan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$PoinPenilaianLaporan = poinPenilaianLaporan::create($request->all());
        $jenis = implode(",", $request->jenis);
        $PoinPenilaianLaporan = new poinPenilaianLaporan;
        $PoinPenilaianLaporan->poin_penilaian = $request->poin_penilaian;
        $PoinPenilaianLaporan->deskripsi = $request->deskripsi;
        $PoinPenilaianLaporan->bobot = $request->bobot;
        $PoinPenilaianLaporan->ket = $request->ket;
        $PoinPenilaianLaporan->jenis = $jenis;
        $PoinPenilaianLaporan->save();
        //dd($request->all()); 
        return redirect('/Poin-Penilaian-Laporan')->with('sukses','Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $PoinPenilaianLaporan = poinPenilaianLaporan::find($id);
        $jenis = explode(",",$PoinPenilaianLaporan->jenis);
        return view('PoinPenilaianLaporan.edit',compact('PoinPenilaianLaporan','jenis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $jenis = implode(",", $request->jenis);
        $PoinPenilaianLaporan = poinPenilaianLaporan::find($id);
        $PoinPenilaianLaporan->poin_penilaian = $request->poin_penilaian;
        $PoinPenilaianLaporan->deskripsi = $request->deskripsi;
        $PoinPenilaianLaporan->bobot = $request->bobot;
        $PoinPenilaianLaporan->ket = $request->ket;
        $PoinPenilaianLaporan->jenis = $jenis;
        $PoinPenilaianLaporan->save();
        
        return redirect('/Poin-Penilaian-Laporan')->with('sukses','Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $PoinPenilaianLaporan = poinPenilaianLaporan::find($id);
        $PoinPenilaianLaporan->delete();
        return redirect('/Poin-Penilaian-Laporan')->with('sukses','Data Berhasil Dihapus');
    }
}
