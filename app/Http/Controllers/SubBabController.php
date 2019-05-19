<?php

namespace App\Http\Controllers;

use App\SubBab;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubBabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$subbab = SubBab::all();
        $bab = \App\BAB::all();
        
        $subbab = DB::table('subbab')
        ->join('bab', 'bab.id', '=', 'subbab.bab_id')
        ->select('bab.*','subbab.*')
        ->get();
        
        return view('SubBab.index',compact('subbab','bab'));
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
        $subbab = \App\SubBab::create($request->all()); 
        return redirect('/SubBab')->with('sukses','Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SubBab  $subBab
     * @return \Illuminate\Http\Response
     */
    public function show(SubBab $subBab)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubBab  $subBab
     * @return \Illuminate\Http\Response
     */
    public function edit($SubBab)
    {
        $data_SubBab = SubBab::find($SubBab);
        $data_bab = \App\BAB::all();
        return view('SubBab.edit',compact('data_SubBab','data_bab'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubBab  $subBab
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $SubBab)
    {
        $data_subbab = SubBab::find($SubBab);
        $data_subbab->update($request->all());
        return redirect('/SubBab')->with('sukses','Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubBab  $subBab
     * @return \Illuminate\Http\Response
     */
    public function destroy($SubBab)
    {
        $data_subbab = SubBab::find($SubBab);
        $data_subbab->delete();
        return redirect('/SubBab')->with('sukses','Data Berhasil Dihapus');
    }
}
