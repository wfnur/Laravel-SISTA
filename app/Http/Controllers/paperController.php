<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\paper;
use Auth;
class paperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paper = paper::where('nim','=',Auth::user()->username)->get();
        return view('Paper.index',compact('paper'));
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
        $paper = new paper;
        $paper->nim = $request->nim;
        $paper->judul = $request->judul;
        $paper->save();
        
        if ($request->hasFile('bukti')) {
            $imgName = generateNamaBukti(Auth::user()->username,$request->file('bukti')->getClientOriginalExtension());
            $file = $request->file('bukti');
            $file->storeAs('public/Bukti_Pembayaran', $imgName);
            
            
            $paper->bukti = $imgName;
            $paper->save();

            if(!$paper){
                return redirect()->back()->with('gagal','Gagal Upload Diubah/Disimpan');
            }
        }

        if ($request->hasFile('paper')) {
            $imgName = generateNamaPaper(Auth::user()->username,$request->file('paper')->getClientOriginalExtension());
            $file = $request->file('paper');
            $file->storeAs('public/Paper', $imgName);
            
            
            $paper->paper = $imgName;
            $paper->save();

            if(!$paper){
                return redirect()->back()->with('gagal','Gagal Upload Diubah/Disimpan');
            }
        } 
        return redirect('/Paper')->with('sukses','Data Berhasil Disimpan');
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
        $paper = paper::find($id);
        return view('Paper.edit',compact('paper'));

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
        $paper = paper::find($id);
        $paper->nim = $request->nim;
        $paper->judul = $request->judul;
        $paper->save();

        if ($request->hasFile('bukti')) {
            $imgName = generateNamaBukti(Auth::user()->username,$request->file('bukti')->getClientOriginalExtension());
            $file = $request->file('bukti');
            $file->storeAs('public/Bukti_Pembayaran', $imgName);
            
            $paper = paper::find($id);
            $paper->bukti = $imgName;
            $paper->save();

            if(!$paper){
                return redirect()->back()->with('gagal','Gagal Upload Diubah/Disimpan');
            }
        }

        if ($request->hasFile('paper')) {
            $imgName = generateNamaPaper(Auth::user()->username,$request->file('paper')->getClientOriginalExtension());
            $file = $request->file('paper');
            $file->storeAs('public/Paper', $imgName);
            
            $paper = paper::find($id);
            $paper->paper = $imgName;
            $paper->save();

            if(!$paper){
                return redirect()->back()->with('gagal','Gagal Upload Diubah/Disimpan');
            }
        } 
        return redirect('/Paper')->with('sukses','Data Berhasil Disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $paper = \App\paper::find($id);
        $paper->delete();
        return redirect('/Paper')->with('sukses','Data Berhasil Dihapus');
    }

    public function listMahasiswa(){
        $paper = paper::all();
        return view('Paper.listMahasiswa',compact('paper'));
    }

    public function saveStatusPaper(Request $request){
        $paper = paper::find($request->id);
        $paper->status = 1;
        $paper->save();

        if ($paper->save()) {
            echo "Success";
        }
    }
}
