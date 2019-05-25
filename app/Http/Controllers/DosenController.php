<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Dosen;
use App\User;
use Auth;

class DosenController extends Controller
{
    public function index(){
        $Dosen = Dosen::find(Auth::user()->username);
        return view('Dosen.index',['Dosen' => $Dosen]);
    }
    public function profile(){
        $dosen = Dosen::find(Auth::user()->username);
        return view('Dosen.profile',compact('dosen'));
    }
    public function create(Request $request){
        //$user = \App\Dosen::all();
        
        if ($request->has('cari')) {
            $data_dosen = \App\Dosen::where('nama','LIKE','%'.$request->cari.'%')
            ->orwhere('kode_dosen','LIKE','%'.$request->cari.'%')
            ->paginate(20);
            
        } else {
            $data_dosen = \App\Dosen::paginate(20);
        }
        
        //View::make('Mahasiswa.List_mahasiswa', compact('data_mahasiswa','user'));
        return view('Dosen.create',compact('data_dosen','user'));
    }

    public function edit($kodedosen){
        //$dosen = Dosen::find($kodedosen);
        $dosen = DB::table('dosen')
            ->select('users.*', 'dosen.*')
            ->join('users', 'users.username', '=', 'dosen.kode_dosen')
            ->where('dosen.kode_dosen','=',$kodedosen)
            ->first();
        $tipe_user = explode(",",$dosen->tipe_user);
        return view('Dosen.Edit_dosen',compact('tipe_user','dosen'));
    }

    public function store(Request $request){

        //insert user
        $user = new \App\User;
        $user -> tipe_user ='dsn';
        $user -> status =1 ;
        $user -> username = $request->kode_dosen;
        $user -> password = bcrypt('321dosen');
        $user -> remember_token = str_random(60);
        $user -> save();

        //insert mahasiswa
        $request ->request->add(['user_id' => $user -> id]);
        $dosen = \App\Dosen::create($request->all()); 

        return redirect('/Dosen/Create')->with('sukses','Data Berhasil Disimpan'); 
    }

    public function update(Request $request, $kode_dosen){
        
        $dosen = Dosen::find($kode_dosen);
        $dosen->update($request->all());
        if ($request->hasFile('foto')) {
            //Storage::putFile('photo', new File('Images/'));
            $imgName = md5(str_random(30).time().'_'.$request->file('image_icon')).'.'.$request->file('foto')->getClientOriginalExtension();
            $request->file('foto')->move('Images/',$imgName);
            $dosen->foto = $imgName;
            $dosen->save();
        }

        if ($request->has('tipe_user')) {
            $tipe_user = implode(",",$request->tipe_user);
            $user = User::where('username', "=", $kode_dosen)->first();
            $user->tipe_user = $tipe_user;
            $user->update();
        }
        

        return redirect()->back()->with('sukses','Data Berhasil Diupdate');
       //return dd($mahasiswa);

   }

   public function delete($kode_dosen){
       $dosen = \App\Dosen::find($kode_dosen);
        $dosen->delete();
        $user = \App\User::find($kode_dosen);
        $user->delete();
        return redirect('/Dosen')->with('sukses','Data Berhasil Hapus');
   }

    public function createUserDosen(){
        ini_set('max_execution_time', 600);
        $dosen = Dosen::all();

        $data = array();
        $i=0;
        foreach($dosen as $value){
            $user = User::firstOrNew([
                'username' => $value->kode_dosen
            ]);

            if($user->username) {
                
            }else{
                $userCreate = New User;
                $userCreate->username = $value->kode_dosen;
                $userCreate->password = bcrypt('321dosen');
                $userCreate->tipe_user = 'dsn';
                $userCreate->status = 1;
                $userCreate->remember_token = str_random(60);
                $userCreate->save();

                if (!$userCreate->save()) {
                    $data[$i] = $value->NIM." Gagal Ditambah";
                }
            }
        $i++;
        }
        return redirect()->back()->with("sukses","User Berhasil Ditambah !");
    
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
