<?php

namespace App\Http\Controllers;

use App\BAB;
use Illuminate\Http\Request;

class BabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bab = \App\BAB::All();
        return view('Bab.index',['bab' => $bab]);
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
        $bab = \App\BAB::create($request->all()); 
        return redirect('/BAB')->with('sukses','Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BAB  $bAB
     * @return \Illuminate\Http\Response
     */
    public function show(BAB $bAB)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BAB  $bAB
     * @return \Illuminate\Http\Response
     */
    public function edit($BAB)
    {
        $data_bab = Bab::find($BAB);
        //dd($cek);
        return view('Bab.edit',compact('data_bab'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BAB  $bAB
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $BAB)
    {
        $data_bab = Bab::find($BAB);
        $data_bab->update($request->all());
        return redirect('/BAB')->with('sukses','Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BAB  $bAB
     * @return \Illuminate\Http\Response
     */
    public function destroy($BAB)
    {
        $data_bab = Bab::find($BAB);
        $data_bab->delete();
        return redirect('/BAB')->with('sukses','Data Berhasil Hapus');
    }
}
