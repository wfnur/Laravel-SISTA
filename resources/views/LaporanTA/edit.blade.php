@extends('Layout.master')

@section('title','Laporan Tugas Akhir')

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
        <a href="/Mahasiswa/Profile" class="nav-link">Ubah Profile</a>
    </li>
  </ul>

 

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Messages Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="fa fa-comments-o"></i>
        <span class="badge badge-danger navbar-badge">3</span>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <a href="#" class="dropdown-item">
          <!-- Message Start -->
          <div class="media">
            <img src="{{asset('adminlte/dist/img/user1-128x128.jpg')}}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
            <div class="media-body">
              <h3 class="dropdown-item-title">
                Brad Diesel
                <span class="float-right text-sm text-danger"><i class="fa fa-star"></i></span>
              </h3>
              <p class="text-sm">Call me whenever you can...</p>
              <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i> 4 Hours Ago</p>
            </div>
          </div>
          <!-- Message End -->
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <!-- Message Start -->
          <div class="media">
            <img src="{{asset('adminlte/dist/img/user8-128x128.jpg')}}" alt="User Avatar" class="img-size-50 img-circle mr-3">
            <div class="media-body">
              <h3 class="dropdown-item-title">
                John Pierce
                <span class="float-right text-sm text-muted"><i class="fa fa-star"></i></span>
              </h3>
              <p class="text-sm">I got your message bro</p>
              <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i> 4 Hours Ago</p>
            </div>
          </div>
          <!-- Message End -->
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <!-- Message Start -->
          <div class="media">
            <img src="{{asset('dist/img/user3-128x128.jpg')}}" alt="User Avatar" class="img-size-50 img-circle mr-3">
            <div class="media-body">
              <h3 class="dropdown-item-title">
                Nora Silvester
                <span class="float-right text-sm text-warning"><i class="fa fa-star"></i></span>
              </h3>
              <p class="text-sm">The subject goes here</p>
              <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i> 4 Hours Ago</p>
            </div>
          </div>
          <!-- Message End -->
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
      </div>
    </li>
    <!-- Notifications Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="fa fa-bell-o"></i>
        <span class="badge badge-warning navbar-badge">15</span>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-item dropdown-header">15 Notifications</span>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <i class="fa fa-envelope mr-2"></i> 4 new messages
          <span class="float-right text-muted text-sm">3 mins</span>
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <i class="fa fa-users mr-2"></i> 8 friend requests
          <span class="float-right text-muted text-sm">12 hours</span>
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <i class="fa fa-file mr-2"></i> 3 new reports
          <span class="float-right text-muted text-sm">2 days</span>
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
          class="fa fa-th-large"></i></a>
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
                <h1>Laporan Tugas Akhir</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Laporan Tugas Akhir</li>
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
                          Laporan Tugas Akhir
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
                          <div class="mb-3">
                            <form method='post' action='{{url('/LaporanTA/Store')}}' enctype='multipart/form-data'>
                              {{ csrf_field() }}
                                  <!--judul-->
                                  <div class='form-group row'>
                                      <div class='col-md-12'>
                                        <label>Judul Tugas Akhir (terbaru)</label>
                                        <textarea cols="80" name="judul_ta" rows="3" class="form-control">{{$laporanTA->judul_ta}}</textarea>
                                      </div>
                                  </div>

                                  <!--bidang-->
                                  <div class="form-group row">
                                    <div class='col-md-12'>
                                        <label>Bidang</label>
                                        <select class="form-control" name="bidang">
                                            <option value='0'>-------------------------</option>
                                            @foreach ($bidang as $valBidang)
                                              <option value="{{ $valBidang->id }}" @if($laporanTA->bidang==$valBidang->id) selected @endif > {{ $valBidang->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                  </div>

                                  <!--Pembimbing 1-->
                                  <div class="form-group row">
                                    <div class='col-md-12'>
                                        <label>Pembimbing 1 </label>
                                        <select class="form-control" name="pembimbing1">
                                          <option value='0'>-------------------------</option>
                                          @foreach ($pembimbing1 as $p1)
                                            <option value={{$p1->kode_dosen }} @if($laporanTA->pembimbing1==$p1->kode_dosen) selected @endif > {{ $p1->nama }}</option>
                                          @endforeach
                                        </select>
                                    </div>
                                  </div>

                                  <!--Pembimbing 2-->
                                  <div class="form-group row">
                                    <div class='col-md-12'>
                                        <label>Pembimbing 2 </label>
                                        <select class="form-control" name="pembimbing2">
                                          <option value='0'>-------------------------</option>
                                          @foreach ($pembimbing2 as $p2)
                                            <option value={{ $p2->kode_dosen }} @if($laporanTA->pembimbing2==$p2->kode_dosen) selected @endif > {{ $p2->nama }}</option>
                                          @endforeach
                                        </select>
                                    </div>
                                  </div>

                                  <!--Upload Laporan-->
                                  <!---Lembar Pengesahan--->
                                    <div class="form-group row">
                                        <label for="exampleInputFile"> Berkas Laporan Tugas AKhir Final (PDF) </label>
                                        <input type="file" name="laporanTA" accept=".pdf"  class="form-control"> <br> <br>
                                        <a href={{asset('Berkas_LaporanTA/'.$laporanTA->laporan)}} class="btn btn-primary" target="_blank"> view</a>        
                                    </div>

                                  <div class='form-group'>
                                      <input type="submit" value="Simpan" class='btn btn-info'>
                                  </div>
                            </form>
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
