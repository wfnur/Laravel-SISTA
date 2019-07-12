<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\nilaiPKMPublikasi;
use \App\poinPKM;
use \App\poinPublikasi;
use \App\Mahasiswa;

class nilaiPKMPublikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswa = DB::table('mahasiswa')
            ->leftJoin('nilai_pkmpublikasi', 'nilai_pkmpublikasi.nim', '=', 'mahasiswa.nim')
            //->leftJoin('jadwal_sidang', 'jadwal_sidang.nim', '=', 'mahasiswa.nim')
            ->orderBy('mahasiswa.NIM', 'ASC')
            ->get();

        return view('NilaiPKMPublikasi.index',compact('mahasiswa'));
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
        //
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
        $nilai_pkmpublikasi = nilaiPKMPublikasi::where('nim','=',$id)->first();
        if (isset($nilai_pkmpublikasi)) {
            $mhs = Mahasiswa::where('NIM','=',$id)->first();
            $poin_pkm = poinPKM::all();
            $poin_publikasi = poinPublikasi::all();
            return view('NilaiPKMPublikasi.edit', compact('mhs','poin_pkm','poin_publikasi','nilai_pkmpublikasi'));
        }else{
            $mhs = Mahasiswa::where('NIM','=',$id)->first();
            $poin_pkm = poinPKM::all();
            $poin_publikasi = poinPublikasi::all();
            return view('NilaiPKMPublikasi.edit', compact('mhs','poin_pkm','poin_publikasi'));
        }
        

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
        $nilai_pkmpublikasi = nilaiPKMPublikasi::updateOrCreate([
            'nim'   => $request->nim,
        ],[
            'poin_pkm_id'       => $request->poin_pkm_id,
            'poin_publikasi_id' => $request->poin_publikasi_id
            
        ]);
        if ($nilai_pkmpublikasi) {
            return redirect('/Nilai-PKM-Publikasi')->with('sukses','Berhasil Ubah/Simpan Data');
        }else{
            return redirect('/Nilai-PKM-Publikasi')->with('gagal','Gagal Ubah/Simpan Data');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
