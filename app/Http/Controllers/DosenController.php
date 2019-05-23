<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dosen;
use App\User;

class DosenController extends Controller
{
    public function index(Request $request){
        //$user = \App\Dosen::all();
        
        if ($request->has('cari')) {
            $data_dosen = \App\Dosen::where('nama','=',$request->cari)
            ->orwhere('kode_dosen','LIKE','%'.$request->cari.'%')
            ->paginate(20);
            
        } else {
            $data_dosen = \App\Dosen::paginate(20);
        }
        
        //View::make('Mahasiswa.List_mahasiswa', compact('data_mahasiswa','user'));
        return view('Dosen.index',compact('data_dosen','user'));
    }

    public function edit($kodedosen){
        $dosen = \App\Dosen::find($kodedosen);
        //return dd($mahasiswa);
        return view('Dosen/Edit_dosen',['dosen'=>$dosen]);
    }

    public function create(Request $request){
        //return $request->all();

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

        return redirect('/Dosen')->with('sukses','Data Berhasil Disimpan'); 
    }

    public function update(Request $request, $kode_dosen){
        $dosen = \App\Dosen::find($kode_dosen);
        $dosen->update($request->all());
        return redirect('/Dosen')->with('sukses','Data Berhasil Diupdate');
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
}
