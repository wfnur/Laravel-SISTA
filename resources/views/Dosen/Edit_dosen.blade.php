@extends('Layout.master')

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
                        <form action="/Dosen/{{$dosen->kode_dosen}}/update" method="POST">
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