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
             if ($tipe_user == 'admin') {
                return redirect('/Dashboard-Admin');
             }elseif ($tipe_user =='mhs') {
                return redirect('/Mahasiswa/Beranda');
             }
        }
        /*
        $user = \App\User::where('username', $request->username)
                  ->where('password',md5($request->password))
                  ->first();
        if ($user) {
            $tipe_user = $user->tipe_user;
            $username = $request->username;
            if ($tipe_user == 'panitia_reviewerSKTA') {
                return redirect()->Action('DashboardController@admin', ['username' => $username]);
                dd($request->username);
                //return redirect('/Dashboard-Admin')->compact('user');
                //return "login";
            }else{
                dd($user->username);
            }
        }*/
        return redirect('/Login')->with('gagal','Username / Password Salah');
    }

    public function logout(){
        Auth::logout();
        return redirect('/Login');
    }
}
