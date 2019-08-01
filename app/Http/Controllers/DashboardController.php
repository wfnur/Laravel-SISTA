<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function admin(){
        $user = \App\Dosen::find(auth()->user()->username);
        if ($user == null) {
            $user = \App\Mahasiswa::find(auth()->user()->username);            
        }
        //dd($user);
        return view('Dashboard.admin',['user' => $user]);
    }
    
    public function mahasiswa(){
        $user = \App\Mahasiswa::find(auth()->user()->username);
        $revisi = \App\revisiLaporan::where('nim','=',auth()->user()->username)
        ->where('status','=',1)
        ->where('status_nilaiSidang','=',1)
        ->get();
        
        return view('Dashboard.mahasiswa',compact('user','revisi'));
    }
    
}
