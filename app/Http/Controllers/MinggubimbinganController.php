<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
class MinggubimbinganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mingguBimbingan = \App\mingguBimbingan::all();
        return view('MingguBimbingan.index',compact('mingguBimbingan'));
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
        $minggubimbingan = \App\mingguBimbingan::create($request->all()); 
        return redirect('/Minggu-Bimbingan')->with('sukses','Data Berhasil Disimpan');
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
    public function edit($Minggu_Bimbingan)
    {
        $data_mingguBimbingan = \App\mingguBimbingan::find($Minggu_Bimbingan);
        return view('MingguBimbingan.edit',compact('data_mingguBimbingan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $Minggu_Bimbingan)
    {
        $data_mingguBimbingan = \App\mingguBimbingan::find($Minggu_Bimbingan);
        $data_mingguBimbingan->update($request->all());
        return redirect('/Minggu-Bimbingan')->with('sukses','Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($Minggu_Bimbingan)
    {
        $data_mingguBimbingan = \App\mingguBimbingan::find($Minggu_Bimbingan);
        $data_mingguBimbingan->delete();
        return redirect('/Minggu-Bimbingan')->with('sukses','Data Berhasil Dihapus');
    }
}
