<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\JadwalSidang;
use \App\Dosen;

class JadwalSidangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jadwalSidang = JadwalSidang::all();
        $dosen = Dosen::all();
        return view('JadwalSidang.index',compact('jadwalSidang','dosen'));
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
        $jadwalSidang = JadwalSidang::create($request->all()); 
        return redirect('/Jadwal-Sidang')->with('sukses','Data Berhasil Disimpan');
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
        $jadwalSidang = JadwalSidang::find($id);
        $dosen = Dosen::all();
        return view('JadwalSidang.edit',compact('jadwalSidang','dosen'));
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
        $jadwalSidang = JadwalSidang::find($id);
        $jadwalSidang->update($request->all());
        return redirect('/Jadwal-Sidang')->with('sukses','Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jadwalSifang = JadwalSidang::find($id);
        $jadwalSifang->delete();
        return redirect('/Jadwal-Sidang')->with('sukses','Data Berhasil Dihapus');
    }
}
