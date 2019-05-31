<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PoinPenilaian;

class PoinPenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $PoinPenilaian = PoinPenilaian::all();
        return view('PoinPenilaian.index',compact('PoinPenilaian'));
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
        $PoinPenilaian = PoinPenilaian::create($request->all()); 
        return redirect('/Poin-Penilaian')->with('sukses','Data Berhasil Disimpan');
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
        $PoinPenilaian = PoinPenilaian::find($id);
        return view('PoinPenilaian.edit',compact('PoinPenilaian'));
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
        $PoinPenilaian = PoinPenilaian::find($id);
        $PoinPenilaian->update($request->all());
        return redirect('/Poin-Penilaian')->with('sukses','Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $PoinPenilaian = PoinPenilaian::find($id);
        $PoinPenilaian->delete();
        return redirect('/Poin-Penilaian')->with('sukses','Data Berhasil Dihapus');
    }
}
