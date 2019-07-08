@extends('Layout.master')

@section('title','Edit Paper')

@section('navbar')
<!-- Navbar -->
<nav class="main-header navbar navbar-expand bg-primary navbar-dark ">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
        <a href="{{url('/Mahasiswa/Beranda')}}" class="nav-link">Beranda</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
        <a href="{{url('/Mahasiswa/Profile')}}" class="nav-link">Ubah Profile</a>
    </li>
  </ul>

</nav>
<!-- /.navbar -->
@stop

@section('content')
@if (session('sukses'))
<div class="alert alert-success col-md-6 alert-fixed" role="alert" >
    {{session('sukses')}}
</div>
@elseif (session('gagal'))
<div class="alert alert-danger col-md-6 alert-fixed" role="alert" >
    {{session('gagal')}}
</div>
@endif

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Upload Paper</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Edit</a></li>
                    <li class="breadcrumb-item active">Upload Paper</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class='col-md-12 col-xs-12'>

              <!-- ./Data Proposal -->    
              <div class="row">
                <div class="col-md-12">
                    <div class="card card-info card-outline">
                      <div class="card-header">
                        <h3 class="card-title">
                          Edit Upload Paper
                        </h3>
                          <!-- tools box -->
                          <div class="card-tools">
                            <button type="button" class="btn btn-tool btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                                <i class="fa fa-times"></i>
                            </button>
                          </div>
                          <!-- /. tools -->
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body" style="display: block;">
                        <div class="row" style="margin-top:20px;">
                            <div class="col-8">
                                <form action="{{ route('Paper.update', $paper->id) }}" method="POST" enctype='multipart/form-data'>
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="PUT">  
                                    <input type="hidden" name="nim" value="{{auth()->user()->username}}">
                                    <div class="form-group">
                                        <label>Judul</label>
                                        <textarea name="judul" rows="5" class="form-control" required>{{$paper->judul}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile"> Abstrak Laporan Tugas Akhir Final (PDF) </label>
                                        <br>
                                        <span> Bukti Pembayaran (PDF)</span>
                                        <input type="file" name="bukti" accept=".pdf"  class="form-control">         
                                    </div> 
                                    <div class="form-group">
                                        <label for="exampleInputFile"> Abstrak Laporan Tugas Akhir Final (PDF) </label>
                                        <br>
                                        <span> Paper (PDF)</span>
                                        <input type="file" name="paper" accept=".pdf"  class="form-control">         
                                    </div>
                                    <button type="submit" class="btn btn-primary" value="Simpan"> Save changes</button>  
                                </form>
                            </div>
                        </div>
                      </div>
                    </div>
                    <!-- /.card -->          
                </div>
              <!-- /.col-->
              </div>
              <!-- ./row -->                  
            </div>
          </div>
    <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@stop

@push('scripts')
  
 

@endpush