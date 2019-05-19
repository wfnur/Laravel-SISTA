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
                <li class="breadcrumb-item active">{{$data_mingguBimbingan->mingguke}}</li>
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
                        <form action="{{ route('Minggu-Bimbingan.update', $data_mingguBimbingan->id) }}" method="POST">
                            
                            <input type="hidden" name="_method" value="PUT">                 
                            {{csrf_field()}}
                                <div class="form-group">
                                    <label>Nama </label>
                                    <input type="text" value="{{$data_mingguBimbingan->mingguke}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Tangga Mulai</label>
                                    <input type="text" name="awal" value="{{$data_mingguBimbingan->awal}}"  class="tanggalawal form-control" required>
                                </div> 
                                <div class="form-group">
                                    <label>Tangga Akhir</label>
                                    <input type="text" name="akhir" value="{{$data_mingguBimbingan->akhir}}"  class="tanggalakhir form-control" required>
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