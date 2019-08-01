@extends('Layout.master')

@section('title','Mahasiswa')

@section('navbar')
<!-- Navbar -->
<nav class="main-header navbar navbar-expand bg-primary navbar-dark ">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
        <a href="/Mahasiswa/Beranda" class="nav-link">Beranda</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
        <a href="/Mahasiswa/Profile" class="nav-link">Profile</a>
    </li>
  </ul>
</nav>
<!-- /.navbar -->
@stop

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">Beranda</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Beranda</li>
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
        <section class="col-12">
        <!-- Custom tabs (Charts with tabs)-->
        <div class="card">
            
            <div class="card-body" style="padding:30px">
                
                <div class="row">
                    <div class="col-12">
                        <center><h1>Selamat Datang {{ $user->nama }} </h1></center>
                    </div>
                </div>
            </div><!-- /.card-body -->
        </div>
        <!-- /.card -->

        </section>
        <!-- /.Left col -->
        
    </div>

    <!-- /.row (main row) -->
    <div class="row">
      <div class="col-md-12">
        <div class="card card-default">
          <div class="card-header bg-warning">
            <h3 class="card-title">
              <i class="fa fa-bullhorn"></i>
              Revisi
            </h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            @foreach ($revisi as $item)
              <div class="callout callout-warning">
                <h5>{{$item->dosen->nama}}</h5>
                <p>{!! $item->revisi !!}</p>
              </div>
            @endforeach

          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->   
@endsection