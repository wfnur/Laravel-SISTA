<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class deadlineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_deadline = \App\Deadline::all();
        return view('Deadline.index',compact('data_deadline'));
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
        $deadline = \App\Deadline::create($request->all()); 
        return redirect('/Deadline')->with('sukses','Data Berhasil Disimpan');
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
    public function edit($Deadline)
    {
        $data_deadline = \App\Deadline::find($Deadline);
        return view('Deadline.edit',compact('data_deadline'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $Deadline)
    {
        DB::table('deadline')
        ->update(array('status' => 0));

        $data_deadline = \App\Deadline::find($Deadline);
        $data_deadline->update($request->all());
        return redirect('/Deadline')->with('sukses','Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($Deadline)
    {
        $data_deadline = \App\Deadline::find($Deadline);
        $data_deadline->delete();
        return redirect('/Deadline')->with('sukses','Data Berhasil Dihapus');
    }
}
