<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(){
        return view('Auth.Login');
    }

    public function postlogin(Request $request){
        //return dd($request->all());
        
        if (Auth::attempt($request->only('username','password'))) {
             $tipe_user = Auth::user()->tipe_user;
             $username = Auth::user()->username;
             /*if ($tipe_user == 'admin') {
                return redirect('/Dashboard-Admin');
             }elseif ($tipe_user =='mhs') {
                return redirect('/Mahasiswa/Beranda');
             }*/
             $arr_tu = explode(",",$tipe_user);
             
             if (in_array("admin", $arr_tu)) {
                //return "ada admin";
                return redirect('/Dashboard-Admin');
             }elseif (in_array("mhs",$arr_tu)) {
                return "ada mhs";
                //return redirect('/Mahasiswa/Beranda');
             }else{
                 return "kosong";
             }
        }
        
        //return redirect('/Login')->with('gagal','Username / Password Salah');
    }

    public function logout(){
        Auth::logout();
        return redirect('/Login');
    }
}
