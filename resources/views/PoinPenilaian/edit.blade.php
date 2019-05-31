@extends('Layout.master')

@section('title','Ubah Poin Penilaian')

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
                <h1 class="m-0 text-dark">Edit Poin Penilaian</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left" style="margin-top:7px;">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" >Poin Penilaian</li>
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
                        <form action="{{ route('Poin-Penilaian.update', $PoinPenilaian->id) }}" method="POST">
                            
                            <input type="hidden" name="_method" value="PUT">                 
                            {{csrf_field()}}
                            <div class="form-group">
                                <label>Poin Penilaian</label>
                                <input type="text" name="poin_penilaian" class="form-control" value="{{ $PoinPenilaian->poin_penilaian }}">
                            </div>
                            <div class="form-group">
                                    <label>Bobot</label>
                                    <input type="text" name="bobot" class="form-control" value="{{ $PoinPenilaian->bobot }}">
                                </div>
                            <div class="form-group">
                                <label>Kategori Nilai</label>
                                <Select class="form-control" name='kategori'>
                                    <option value="Nilai Pembimbing" @if($PoinPenilaian->kategori == "Nilai Pembimbing") Selected @endif >Nilai Pembimbing</option>
                                    <option value="Nilai Presentasi" @if($PoinPenilaian->kategori == "Nilai Presentasi") Selected @endif >Nilai Presentasi</option>
                                    <option value="Nilai Demo Alat" @if($PoinPenilaian->kategori == "Nilai Demo Alat") Selected @endif>Nilai Demo Alat</option>
                                    <option value="Nilai Tanya Jawab" @if($PoinPenilaian->kategori == "Nilai Tanya Jawab") Selected @endif >Nilai Tanya Jawab</option>
                                </Select>
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <Select class="form-control" name='ket'>
                                    <option value="Pembimbing" @if($PoinPenilaian->ket == "Pembimbing") Selected @endif>Pembimbing</option>
                                    <option value="Penguji" @if($PoinPenilaian->ket == "Penguji") Selected @endif >Penguji</option>
                                </Select>
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