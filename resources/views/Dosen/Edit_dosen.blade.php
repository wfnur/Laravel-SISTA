@extends('Layout.master')

@section('title','Ubah Data Dosen')

@section('content')
    @if (session('sukses'))
    <div class="alert alert-success" role="alert">
        {{session('sukses')}}
    </div>        
    @endif
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="offset-2">
                <h1 class="m-0 text-dark">Edit Data Dosen</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left" style="margin-top:7px;">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item">Dosen</li>
                <li class="breadcrumb-item active">{{$dosen->nama}}</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
        
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-8 offset-2">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
                <div class="card-body">
                    <div class="col-12">
                        <form action="/Dosen/{{$dosen->kode_dosen}}/updateAdmin" method="POST">
                            {{ csrf_field() }}
                                    <div class="form-group">
                                        <label>Kode Dosen</label>
                                        <input type="text" name="kode_dosen"  class="form-control" value="{{$dosen->kode_dosen}}" required>  
                                    </div>
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" name="nama"  class="form-control" value="{{$dosen->nama}}" required>  
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis kelamin</label>
                                    </div>
                                    <div class='form-check form-check-inline' style='margin-top:-60px;'>
                                        <input type="radio" name="jk" value="L" class="form-check-input" @if ($dosen->jk == 'L') checked @endif>
                                        <label class="form-check-label">Laki - Laki</label>
                                        <input type="radio" name="jk" value="P" class="form-check-input" @if ($dosen->jk == 'P') checked @endif >
                                        <label class="form-check-label">Perempuan</label>
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea class="form-control" rows='5' name='alamat'>{{$dosen->alamat}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Telpon</label>
                                        <input type="text" name="telpon"  class="form-control" value="{{$dosen->telpon}}">  
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" name="email" class="form-control" value="{{$dosen->email}}">  
                                    </div> 
                                    
                                    <div class="form-group">
                                        <label for="">Tipe User</label>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="tipe_user[]" value="admin" class="custom-control-input" id="customCheck1" @if(in_array("admin",$tipe_user)) checked @endif>
                                            <label class="custom-control-label" for="customCheck1">Administrator</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="tipe_user[]" value="dsn" class="custom-control-input" id="customCheck2" @if(in_array("dsn",$tipe_user)) checked @endif>
                                            <label class="custom-control-label" for="customCheck2">Dosen</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="tipe_user[]" value="panitia" class="custom-control-input" id="customCheck3" @if(in_array("panitia",$tipe_user)) checked @endif>
                                            <label class="custom-control-label" for="customCheck3">Panitia Tugas Akhir</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="tipe_user[]" value="reviewer_proposalPKMPolban" class="custom-control-input" id="customCheck4" @if(in_array("reviewer_proposalPKMPolban",$tipe_user)) checked @endif >
                                            <label class="custom-control-label" for="customCheck4">Reviwer Proposal PKM POLBAN</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="tipe_user[]" value="reviewer_proposalPKMBelmawa" class="custom-control-input" id="customCheck5" @if(in_array("reviewer_proposalPKMBelmawa",$tipe_user)) checked @endif >
                                            <label class="custom-control-label" for="customCheck5">Reviwer Proposal PKM BELMAWA</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="tipe_user[]" value="reviewer_proposalTA" class="custom-control-input" id="customCheck6" @if(in_array("reviewer_proposalTA",$tipe_user)) checked @endif>
                                            <label class="custom-control-label" for="customCheck6">Reviwer Proposal Tugas Akhir</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="tipe_user[]" value="reviewer_SKTA" class="custom-control-input" id="customCheck7" @if(in_array("reviewer_SKTA",$tipe_user)) checked @endif>
                                            <label class="custom-control-label" for="customCheck7">Reviwer SKTA</label>
                                        </div>
                                        
                                    </div> 
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-warning" value="Simpan"> Update</button>
                            </div>
                        </form>
                    </div>
                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->

            </section>
            <!-- /.Left col -->
            
        </div>
        <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection