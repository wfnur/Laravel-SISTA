<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;
use App\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Auth;
class MahasiswaController extends Controller
{
    public function index(Request $request){
        $user = \App\Mahasiswa::find(auth()->user()->username);

        if ($request->has('cari')) {
            $data_mahasiswa = \App\Mahasiswa::where('kelas','=',$request->cari)
            ->orwhere('angkatan','LIKE','%'.$request->cari.'%')
            ->orwhere('nim','LIKE','%'.$request->cari.'%')
            ->orwhere('nama','LIKE','%'.$request->cari.'%')
            ->paginate(15);
            
        } else {
            $data_mahasiswa = \App\Mahasiswa::paginate(15);
        }
        
        //View::make('Mahasiswa.List_mahasiswa', compact('data_mahasiswa','user'));
        return view('Mahasiswa.index',compact('data_mahasiswa','user'));
    }

    public function create(Request $request){
        //return $request->all();

        //insert user
        $user = new  \App\User;
        $user -> tipe_user ='mhs';
        $user -> status =1 ;
        $user -> username = $request->NIM;
        $user -> password = bcrypt('mhs123');
        $user -> remember_token = str_random(60);
        $user -> save();

        //insert mahasiswa
        $request ->request->add(['user_id' => $user -> id]);
        $mahasiswa = \App\Mahasiswa::create($request->all()); 

        

        return redirect('/Mahasiswa')->with('sukses','Data Berhasil Disimpan'); 
    }

    public function edit($NIM){
        $mahasiswa = \App\Mahasiswa::find($NIM);
        //return dd($mahasiswa);
        return view('Mahasiswa/Edit_mahasiswa',['mahasiswa'=>$mahasiswa]);
    }

    public function update(Request $request, $NIM){
         $mahasiswa = \App\Mahasiswa::find($NIM);
         $mahasiswa->update($request->all());
         if ($request->hasFile('foto')) {
            //Storage::putFile('photo', new File('Images/'));
            $imgName = md5(str_random(30).time().'_'.$request->file('image_icon')).'.'.$request->file('foto')->getClientOriginalExtension();
            $request->file('foto')->move('Images/',$imgName);
            $mahasiswa->foto = $imgName;
            $mahasiswa->save();
         }
         
         if (!$mahasiswa->update($request->all())) {
            return redirect()->back()->with('gagal','Data Gagal Diupdate');
         } elseif (!$mahasiswa->save()) {
            return redirect()->back()->with('gagal','Foto Gagal Diupdate');
         }else {
            return redirect()->back()->with('sukses','Data Berhasil Diupdate');
         }
         //return redirect('/Mahasiswa')->with('sukses','Data Berhasil Diupdate');
         
        //return dd($mahasiswa);

    }

    public function delete($NIM){
        $mahasiswa = \App\Mahasiswa::find($NIM);
         $mahasiswa->delete();
         return redirect('/Mahasiswa')->with('sukses','Data Berhasil Hapus');
    }

    public function profile(){
        $mahasiswa = \App\Mahasiswa::find(auth()->user()->username);
        return view('Mahasiswa.profile',compact('mahasiswa'));
    }

    public function changePassword(Request $request){
        if (!Hash::check($request->get('current-password'),auth()->user()->password)) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }
        if(strcmp($request->get('new-password'), $request->get('new-password-confirm')) == 0){
            //New password and confirm password are not same
            return redirect()->back()->with("error","New Password should be same as your confirmed password. Please retype new password.");
        }
        //Change Password
        /*
        $user = DB::table('users')->where('username', '=', auth()->user()->username)->get();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
        */
        $user =  User::find(auth()->user()->id);
        //dd($user);
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        if (!$user->save()) {
            return redirect()->back()->with('gagal','Password gagal Diubah');
        } else {
            return redirect()->back()->with("success","Password changed successfully !");
        }
        
    }
}
