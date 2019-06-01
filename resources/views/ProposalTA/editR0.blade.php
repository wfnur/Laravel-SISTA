@extends('Layout.master')

@section('title','Propsal TA Revisi 0')

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
        <a href="{{url('/Mahasiswa/Profile')}}" class="nav-link">Profile</a>
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

@if (session('error'))
<div class="alert alert-danger col-md-6 alert-fixed">
    {{ session('error') }}
</div>
@endif
@if (session('success'))
<div class="alert alert-success col-md-6 alert-fixed">
    {{ session('success') }}
</div>
@endif
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Proposal TA Revisi 0</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item">Proposal TA</li>
            <li class="breadcrumb-item active">Revisi 0</li>
        </ol>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>
<?php
$pustaka2 ="<table border='1'>
    <thead>
      <th>Metoda yang digunakan dalam daftar pustaka</th> <th>Keunggulan</th> <th>Kelemahan</th>
    </thead>
    <tbody>
      <tr>
        <td>Metoda 1 (nama, tahun)</td><td></td><td></td>
      </tr>
      <tr>
        <td>Metoda 2 (nama, tahun)</td><td></td><td></td>
      </tr>
      <tr>
        <td>Metoda 3 (nama, tahun)</td><td></td><td></td>
      </tr>
      <tr>
        <td>Metoda 4 (nama, tahun)</td><td></td><td></td>
      </tr>
      <tr>
        <td>Metoda 5 (nama, tahun)</td><td></td><td></td>
      </tr>
      <tr>
        <td>Metoda 6 (nama, tahun)</td><td></td><td></td>
      </tr>
      <tr>
        <td>Metoda 7 (nama, tahun)</td><td></td><td></td>
      </tr>
      <tr>
        <td>Metoda 8 (nama, tahun)</td><td></td><td></td>
      </tr>
      <tr>
        <td>Metoda 9 (nama, tahun)</td><td></td><td></td>
      </tr>
      <tr>
        <td>Metoda 10 (nama, tahun)</td><td></td><td></td>
      </tr>
      <tr>
        <td>Metoda yang diusulkan</td><td></td><td></td>
      </tr>
    </tbody>
</table>
";
$biaya="
  <p>
  <b>4.1 Anggaran Biaya</b><br>
  Penggunaan anggaran yang dibutuhkan untuk kegiatan ini adalah sebesar Rp x.xxx.xxx,-
  </p>
  <center>Tabel 4.1.1 Format Ringkasan Anggaran Biaya Kegiatan</center>

  <table border='1' cellspacing='0' cellpadding='0'> 
    <thead>
        <tr>
        <td>No.</td>
        <td>Jenis Pengeluaran</td>
        <td>Biaya (Rp)</td>
        </tr>
    </thead>
    <tbody>

    </tbody>
        <tr>
        <td style='text-align:center'>1</td>
        <td>Peralatan penunjang</td>
        <td>x.xxx.xxx</td>
        </tr>
        <tr>
        <td style='text-align:center'>2</td>
        <td>Bahan habis pakai <br> (Komponen utama dan pengujian)</td>
        <td>x.xxx.xxx</td>
        </tr>
        <tr>
        <td style='text-align:center'>3</td>
        <td>Biaya perjalanan</td>
        <td>x.xxx.xxx</td>
        </tr>
        <tr>
        <td style='text-align:center'>4</td>
        <td>Lain-lain</td>
        <td>x.xxx.xxx</td>
        </tr>
        <tr>
        <td colspan='2' style='text-align:center'>Jumlah</td>
        <td>x.xxx.xxx</td>
        </tr>
    </tbody>
  </table>
";
$jadwal_kegiatan="
  <p>
    <b>4.2 Jadwal Kegiatan</b> <br>
    Tabel 4.2.1 Jadwal Kegiatan PKM-xxx
  </p>

  <table border='1' cellspacing='0' cellpadding='0'> 
    <thead>
        <tr>
            <td rowspan='3'>No. </td> <td rowspan='3'>Kegiatan</td> <td colspan='20'>Bulan</td>
        </tr>
        <tr>
            <td colspan='4'>Bulan Ke-1</td>
            <td colspan='4'>Bulan Ke-2</td>
            <td colspan='4'>Bulan Ke-3</td>
            <td colspan='4'>Bulan Ke-4</td>
            <td colspan='4'>Bulan Ke-5</td>
        </tr>
        <tr>
        <td style='text-align:center'>1</td>
        <td style='text-align:center'>2</td>
        <td style='text-align:center'>3</td>
        <td style='text-align:center'>4</td>

        <td style='text-align:center'>1</td>
        <td style='text-align:center'>2</td>
        <td style='text-align:center'>3</td>
        <td style='text-align:center'>4</td>

        <td style='text-align:center'>1</td>
        <td style='text-align:center'>2</td>
        <td style='text-align:center'>3</td>
        <td style='text-align:center'>4</td>

        <td style='text-align:center'>1</td>
        <td style='text-align:center'>2</td>
        <td style='text-align:center'>3</td>
        <td style='text-align:center'>4</td>

        <td style='text-align:center'>1</td>
        <td style='text-align:center'>2</td>
        <td style='text-align:center'>3</td>
        <td style='text-align:center'>4</td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style='text-align:center'>1</td>
            <td>Koleksi data awal</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td style='text-align:center'>2</td>
            <td>Mendesain alat (Menyusun desain teknis)</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td style='text-align:center'>4</td>
            <td>Membuat alat (Proses realisasi alat)</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td style='text-align:center'>5</td>
            <td>Uji keandalan alat</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td style='text-align:center'>6</td>
            <td>Menganalisis data</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td style='text-align:center'>7</td>
            <td>Evaluasi kinerja alat</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>

    </tbody>
  </table>
";

$justifikasi_anggaran ="
  <table border='1'>
      <tr>
        <td style='font-weight:bold'>1. Jenis Perlengkapan</td> <td>Volume</td> <td>Harga Satuan (Rp)</td> <td>Nilai (Rp)</td>
      </tr>
      <tr>
        <td></td><td></td><td></td><td></td>
      </tr>
      <tr>
        <td></td><td></td><td></td><td></td>
      </tr>
      <tr>
        <td colspan='3' style='text-align:right'>SUB TOTAL (Rp)</td><td></td>
      </tr>

      <tr>
        <td style='text-align:left'>2. Bahan Habis</td> <td>Volume</td> <td>Harga Satuan (Rp)</td> <td>Nilai (Rp)</td>
      </tr>
      <tr>
        <td></td><td></td><td></td><td></td>
      </tr>
      <tr>
        <td></td><td></td><td></td><td></td>
      </tr>
      <tr>
        <td colspan='3' style='text-align:right'>SUB TOTAL (Rp)</td><td></td>
      </tr>

      <tr>
        <td style='text-align:left'>3. Perjalanan</td> <td>Volume</td> <td>Harga Satuan (Rp)</td> <td>Nilai (Rp)</td>
      </tr>
      <tr>
        <td></td><td></td><td></td><td></td>
      </tr>
      <tr>
        <td></td><td></td><td></td><td></td>
      </tr>
      <tr>
        <td colspan='3' style='text-align:right'>SUB TOTAL (Rp)</td><td></td>
      </tr>

      <tr>
        <td style='text-align:left'>4. Lain - lain</td> <td>Volume</td> <td>Harga Satuan (Rp)</td> <td>Nilai (Rp)</td>
      </tr>
      <tr>
        <td></td><td></td><td></td><td></td>
      </tr>
      <tr>
        <td></td><td></td><td></td><td></td>
      </tr>
      <tr>
        <td colspan='3' style='text-align:right'>SUB TOTAL (Rp)</td><td></td>
      </tr>
      <tr>
        <td colspan='3' style='text-align:right'>TOTAL 1+2+3+4 (Rp)</td><td></td>
      </tr>
      <tr>
        <td colspan='4'>(Terbilang)</td>
      </tr>
    </table>
  ";
?>
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
                                  Data Proposal
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
                              <form method='post' action='{{url('/Proposal/Store/DataProposal')}}'>
                                  {{ csrf_field() }}
                                  <input type="hidden" name="nim" value="{{auth()->user()->username}}">
                                  <input type="hidden" name="revisike" value="0">
                                      <!--judul-->
                                      <div class='form-group row'>
                                          <div class='col-md-12'>
                                          <label>Judul TA/</label>
                                          <textarea @if($proposal_ta->status_dataProposal == 1) disabled @endif cols="80" name="judul_ta" rows="3" class="form-control" >{{$proposal_ta->judul_ta}}</textarea>
                                          </div>
                                      </div>

                                      <!--bidang-->
                                      <div class="form-group row">
                                      <div class='col-md-12'>
                                          <label>Bidang</label>
                                          <select class="form-control" name="bidang" @if($proposal_ta->status_dataProposal == 1) disabled @endif>
                                              <option value='0'>-------------------------</option>
                                              @foreach ($bidang as $valBidang)
                                                  <option value={{ $valBidang->id }} @if ($valBidang->id == $proposal_ta->bidang) selected @endif> 
                                                      {{ $valBidang->nama }}
                                                  </option>
                                              @endforeach
                                          </select>
                                      </div>
                                      </div>

                                      <!--Pembimbing 1-->
                                      <div class="form-group row">
                                      <div class='col-md-12'>
                                          <label>Pembimbing 1 </label>
                                          <select class="form-control" name="pembimbing_1" @if($proposal_ta->status_dataProposal == 1) disabled @endif >
                                              <option value='0'>-------------------------</option>
                                              @foreach ($pembimbing1 as $p1)
                                              <option value={{$p1->kode_dosen }} @if ($p1->kode_dosen == $proposal_ta->pembimbing_1) selected @endif>
                                                  {{ $p1->nama }}
                                              </option>
                                              @endforeach
                                          </select>
                                      </div>
                                      </div>

                                      <!--Pembimbing 2-->
                                      <div class="form-group row">
                                      <div class='col-md-12'>
                                          <label>Pembimbing 2 </label>
                                          <select class="form-control" name="pembimbing_2" @if($proposal_ta->status_dataProposal == 1) disabled @endif >
                                              <option value='0'>-------------------------</option>
                                              @foreach ($pembimbing2 as $p2)
                                              <option value={{ $p2->kode_dosen }} @if ($p2->kode_dosen == $proposal_ta->pembimbing_2) selected @endif>
                                                  {{ $p2->nama }}
                                              </option>
                                              @endforeach
                                          </select>
                                      </div>
                                      </div>

                                      <div class='form-group'>
                                          <input type="submit" value="Simpan" class='btn btn-info' @if($proposal_ta->status_dataProposal == 1) disabled @endif>
                                      </div>
                              </form>
                              </div>
                              <!--Finalisasi data proposal>-->
                              <div class='row'>
                                  <div class='col-md-12'>
                                  <form action='{{url('/Proposal/Store/Finalisasi')}}' method="post" id='finalisasiform'>
                                      {{ csrf_field() }}
                                      <input type="hidden" name="nim" value={{auth()->user()->username}}>
                                      <input type="hidden" name="revisike" value="0">
                                      <input type="hidden" name="nama_field" value="status_dataProposal">
                                      
                                      {!!cekStatusFinalisasi_dataProposal(0)!!}
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

              <!-- ./Abstrak -->
              <div class="row">
                  <div class="col-md-12">
                    <div class="card card-info card-outline">
                      <div class="card-header">
                          <h3 class="card-title">
                          Abstrak
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
                            <form method='post' action='{{url('/Proposal/Store/Abstrak')}}'>
                                {{ csrf_field() }}
                                <input type="hidden" name="nim" value="{{auth()->user()->username}}">
                                <input type="hidden" name="revisike" value="0">
                                Syarat: <br>
                                    <span style='color:red'>
                                    <ul>
                                        <li>Abstrak berisi tidak lebih dari 250 kata dan merupakan intisari 
                                    seluruh tulisan yang meliputi: latar belakang, tujuan, metode</li>
                                        <li>Abstrak hanya terdiri dari 1 paragraf</li>
                                        <li>Dalam Abstrak tidak ada rujukan/link ke Daftar Pustaka</li>
                                        <li>keyword berisi 3-5 kata-kata</li>
                                    </ul>
                                    </span>
                                <div class='form-group'>
                                    <label>Abstrak (Indonesia)</label>
                                    <textarea @if($proposal_ta->status_abstrak == 1) disabled @endif cols="80" id="abstrak_ind" name="abstrak_ind" rows="20" class="form-control">{{$proposal_ta->abstrak_ind}}</textarea>
                                </div>

                                <div class='form-group'>
                                        <label>Keyword (Indonesia)</label>
                                        <input type="text" name="keyword_ind" class='form-control' value={{$proposal_ta->keyword_ind}} @if($proposal_ta->status_abstrak == 1) disabled @endif>
                                    </div>
                                <div class='form-group'>
                                        <label>Abstrak (Inggris)</label>
                                        <textarea cols="80" @if($proposal_ta->status_abstrak == 1) disabled @endif id="abstrak_eng" name="abstrak_eng" rows="20" class="form-control">{{$proposal_ta->abstrak_eng}}</textarea>
                                    </div>
                                <div class='form-group'>
                                        <label>Keyword (Inggris)</label>
                                        <input type="text" @if($proposal_ta->status_abstrak == 1) disabled @endif name="keyword_eng" class='form-control' value={{$proposal_ta->keyword_eng}} >
                                    </div>
                                <div class='form-group'>
                                    <input type="submit" value="Simpan" class='btn btn-info' @if($proposal_ta->status_abstrak == 1) disabled @endif>
                                </div>
                            </form>
                          <!--Finalisasi data proposal>-->
                            <div class='row'>
                                <div class='col-md-12'>
                                <form action='{{url('/Proposal/Store/Finalisasi')}}' method="post" id='finalisasiform'>
                                    {{ csrf_field() }}
                                    
                                    <input type="hidden" name="revisike" value="0">
                                    <input type="hidden" name="nama_field" value="status_abstrak">
                                    <p>
                                    {!!cekStatusFinalisasi_abstrak(0)!!}
                                </form>
                                </div>
                            </div>
                          </div>
                      </div>
                    </div>
                    <!-- /.card -->    
                  </div>
                  <!-- /.col-->
              </div>
              <!-- ./row -->
              
              <!-- ./Pendahuluan -->    
              <div class="row">
                <div class="col-md-12">
                  <div class="card card-info card-outline">
                    <div class="card-header">
                      <h3 class="card-title">
                          Pendahuluan
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
                          <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#col_caraPengutipan">Cara penulisan sitasi format harvard (khusus website ini)</button>
                          <div id="col_caraPengutipan" class="collapse" style='padding :20px;'>
                              <div class='row'>
                              <div class='col-md-6'>
                                  <h4>Cara Pengutipan</h4>
                                  <p>
                                  Pada setiap akhir pengutikan beri simbol '->' kemudian angka yang merujuk ke pustaka. <br>
                                  contoh :
                                  ""......... (Jhon, 2006)->1 <br>
                                  <br>
                                  setalah tatacara pengutipan model harvard, yang tanda kurung, dilanjutkan dengan simbol -> dan angka
                                  yang merujuk ke urutan pustaka. nomor pengutipan dan nomor/urutan daftar pustaka harus sesuai. karna akan di cek oleh sistem
                                  secara otomatis 
                                  </p>
                              </div>
                              </div>
                          </div>
                          <br>
                          <br>

                        <form method='post' action='{{url('/Proposal/Store/Pendahuluan')}}'>
                            {{ csrf_field() }}
                            <input type="hidden" name="nim" value={{auth()->user()->username}}>
                            <input type="hidden" name="revisike" value="0">

                            @php
                              $keterangan = array(
                                'Paragraf 1 : Permasalahan yang diangkat berdasarkan trend saat ini',
                                'Paragraf 2 : Ulasan tentang karya-karya yang telah ada sebelumnya. Resumekan dari Bab Tinjauan Pustaka yang telah dibuat',
                                'Paragraf 3 : Ide yang diusulkan untuk pemecahan masalah tersebut di atas',
                                'Paragraf 4 : Gambaran umum cara kerja alat yang diusulkan',
                                'Paragraf 5 : Jelaskan pembagian sistem dengan partner kerja bila topik dibagi menjadi 2 atau lebih',
                                'Paragraf 6 : Tuliskan Manfaat dari karya yang diusulkan',
                                'Paragraf 7 : Tuliskan Luaran dari karya yang diusulkan, Pilih salah satu atau lebih luaran berikut <br>
                                <ul>
                                    <li>Prototipe</li>
                                    <li>Produk</li>
                                    <li>Publikasi pada Proceding Seminar Nasional</li>
                                    <li>Publikasi pada Proceding Seminar Internasional</li>
                                    <li>Publikasi pada Jurnal Nasional Terindex</li>
                                    <li>Publikasi pada Jurnal Internasional Terindex</li>
                                    <li>Paten</li>
                                    <li>Simulasi</li>
                                </ul>'
                              );   
                                                           
                            @endphp

                            @for ($i = 0; $i < 7 ; $i++)
                              <!--Paragraf 1-->
                              <div class='form-group row'>
                                <div class='col-md-12'>
                                    <label>{!! $keterangan[$i] !!}</label>
                                    <textarea @if($proposal_ta->status_pendahuluan == 1) disabled @endif name='pendahuluan[]' rows='5' class='form-control' required >{{$pendahuluan[$i]}}</textarea>
                                </div>
                              </div> 
                            @endfor                             

                            <div class='form-group'>
                                <input type="submit" value="Simpan" class='btn btn-info' @if($proposal_ta->status_pendahuluan == 1) disabled @endif>
                            </div>
                        </form>
                        <!--Finalisasi Pendahluan-->
                        <div class='row'>
                            <div class='col-md-12'>
                                <form action='{{url('/Proposal/Store/Finalisasi')}}' method="post" id='finalisasiform_pendahuluan'>
                                  {{ csrf_field() }}
                                  <input type="hidden" name="nim" value="{{auth()->user()->username}}">
                                  <input type="hidden" name="revisike" value="0">
                                  <input type="hidden" name="nama_field" value="status_pendahuluan">
                                  {!! cekStatusFinalisasi_pendahuluan(0) !!}
                                </form>
                            </div>
                        </div>
                        </div>
                    </div>
                  </div>
                  <!-- /.card -->
                </div>
                <!-- /.col-->
              </div>
              <!-- ./row -->

              <!-- ./Tinjuauan Pustaka -->    
              <div class="row">
                <div class="col-md-12">
                  <div class="card card-info card-outline">
                    <div class="card-header">
                      <h3 class="card-title">
                        Tinjuauan Pustaka
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
                          <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#col_caraPengutipan_tinpus">cara penulisan sitasi format harvard (khusus website ini)</button>
                          <div id="col_caraPengutipan_tinpus" class="collapse" style='padding :20px;'>
                            <div class='row'>
                              <div class='col-md-6'>
                                <h4>Cara Pengutipan</h4>
                                  <p>
                                  Pada setiap akhir pengutikan beri simbol '->' kemudian angka yang merujuk ke pustaka. <br>
                                  contoh :
                                  ""......... (Jhon, 2006)->1 <br>
                                  <br>
                                  setalah tatacara pengutipan model harvard, yang tanda kurung, dilanjutkan dengan simbol -> dan angka
                                  yang merujuk ke urutan pustaka. nomor pengutipan dan nomor/urutan daftar pustaka harus sesuai. karna akan di cek oleh sistem
                                  secara otomatis 
                                  
                                  </p>
                              </div>
                            </div>
                          </div>
                          <form method='post' action='{{url('/Proposal/Store/TinjauanPustaka')}}'>
                            {{ csrf_field() }}
                            <input type="hidden" name="nim" value="{{auth()->user()->username}}">
                            <input type="hidden" name="revisike" value="0">

                            <div class='form-group'>
                                <label>Gambaran metoda yang digunakan, kelebihan dan kekurangan dari setiap pustaka yang 
                                digunakan dalam daftar pustaka. Setiap 1 pustaka dibuat 1 paragraf.</label>
                            </div>
                            @php
                              $j = 0;
                                
                            @endphp
                            
                            @for ($i=0; $i < 10 ; $i++)
                              <?php $j=$i+1; ?>
                              <div class='form-group row'>
                                  <div class='col-md-12'>
                                    <label>Gambaran metoda yang digunakan pustaka {{$j}} .<br> 
                                    <span style='color:red'>Tambahkan link pengutipan model Harvard pada akhir kalimat, contoh : (Budiman,2000)</span>
                                    </label>
                                    <textarea @if($proposal_ta->status_tinpus == 1) disabled @endif name='tinjauan_pustaka[]' rows='5' class='form-control'>{{$tinpus1[$i]}}</textarea>
                                  </div>
                                </div>
                            @endfor

                            <div class='form-group row'>
                                <div class='col-md-12'>
                                  <label>2. Tabel Perbandingan karya yang sudah ada dalam daftar pustaka dengan karya yang diusulkan.</label>
                                  <textarea id="pustaka_2" name='pustaka_2' rows='3' class='form-control' @if($proposal_ta->status_tinpus == 1) disabled @endif>@if ($proposal_ta->tinjauan_pustaka_2 != "")
                                  {{$proposal_ta->tinjauan_pustaka_2}}                                    
                                  @else
                                  {{$pustaka2}}
                                  @endif</textarea>
                                </div>
                                
                            </div>

                            <div class='form-group'>
                                <input type="submit" value="Simpan" class='btn btn-info'>
                              </div>
                          </form>

                          <div class='row'>
                              <div class='col-md-12'>
                                <form action='{{url('/Proposal/Store/Finalisasi')}}' method="post" id='finalisasiform_tinpus'>
                                  {{ csrf_field() }}
                                  <input type="hidden" name="nim" value="{{auth()->user()->username}}">
                                  <input type="hidden" name="revisike" value="0" >
                                  <input type="hidden" name="nama_field" value="status_tinpus">
                                  {!! cekStatusFinalisasi_tinpus(0) !!}                                
                                </form>
                              </div>
                          </div>
                        </div>
                    </div>
                  </div>
                  <!-- /.card -->

                  
                </div>
                <!-- /.col-->
              </div>
              <!-- ./row -->

              <!-- ./Metode -->  
              <div class="row">
                <div class="col-md-12">
                  <div class="card card-info card-outline">
                    <div class="card-header">
                      <h3 class="card-title">
                        Metode Penelitian / Pelaksanaan
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
                          <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#col_caraPengutipan_metode">cara penulisan sitasi format harvard (khusus website ini)</button>
                          <div id="col_caraPengutipan_metode" class="collapse" style='padding :20px;'>
                            <div class='row'>
                              <div class='col-md-6'>
                                <h4>Cara Pengutipan</h4>
                                  <p>
                                  Pada setiap akhir pengutikan beri simbol '->' kemudian angka yang merujuk ke pustaka. <br>
                                  contoh :
                                  ""......... (Jhon, 2006)->1 <br>
                                  <br>
                                  setalah tatacara pengutipan model harvard, yang tanda kurung, dilanjutkan dengan simbol -> dan angka
                                  yang merujuk ke urutan pustaka. nomor pengutipan dan nomor/urutan daftar pustaka harus sesuai. karna akan di cek oleh sistem
                                  secara otomatis 
                                  
                                  </p>
                              </div>
                            </div>
                          </div>
                          <form method='post' action={{url('/Proposal/Store/MetodePelaksanaan')}}>
                            {{ csrf_field() }}
                            <input type="hidden" name="revisike" value="0">
                            @php
                            $j=0;                          
                              $ket = array(
                                "Cara koleksi data awal",
                                "Cara mendesain alat (Menyusun desain teknis)",
                                "Cara membuat alat (Proses realisasi alat)",
                                "Cara uji keandalan alat",
                                "Cara menganalisis data",
                                "Cara evaluasi kinerja alat"
                              );
                            @endphp

                            @for ($i=0; $i < 6 ; $i++)
                            <?php $j=$i+1 ?>
                              <div class='form-group row'>
                                  <div class='col-md-12'>
                                      <label>{{$ket[$i]}}</label>
                                      <textarea @if($proposal_ta->status_metode == 1) disabled @endif name='metode_pelaksanaan[]' rows='5' class='form-control'>{{$metode[$i]}}</textarea>
                                  </div>
                              </div>
                            @endfor
                          
                            <div class='form-group'>
                                <input type="submit" value="Simpan" class='btn btn-info' @if($proposal_ta->status_metode == 1) disabled @endif>
                            </div>
                          </form>

                          <div class='row'>
                              <div class='col-md-12'>
                                <form action={{url('/Proposal/Store/Finalisasi')}} method="post" id='finalisasiform_metode'>
                                  {{ csrf_field() }}
                                  <input type="hidden" name="revisike" value="0">
                                  <input type="hidden" name="nama_field" value="status_metode">
                                  {!! cekStatusFinalisasi_metode(0) !!}
                                </form>
                              </div>
                          </div>
                        </div>
                    </div>
                  </div>
                  <!-- /.card -->

                  
                </div>
                <!-- /.col-->
              </div>
              <!-- ./row -->

              <!-- ./Biaya dan jadwal kegitan -->
              <div class="row">
                <div class="col-md-12">
                  <div class="card card-info card-outline">
                    <div class="card-header">
                      <h3 class="card-title">
                        Biaya dan Jadwal Kegiatan
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
                          <form method='post' action={{url('/Proposal/Store/BiayaJadwal')}}>
                              {{ csrf_field() }}
                              <input type="hidden" name="revisike" value="0">
                              <div class='form-group row'>
                                <div class='col-md-12'>
                                    <label>Anggaran Biaya</label>
                                    <textarea @if($proposal_ta->status_biayaJadwal == 1) disabled @endif cols="80" id="biaya" name="biaya" rows="20" class="form-control">{{ $proposal_ta->biaya or $biaya}}</textarea>
                                </div>       
                              </div>
                              <div class='form-group row'>
                                <div class='col-md-12'>
                                    <label>Jadwal Kegiatan</label>
                                    <textarea @if($proposal_ta->status_biayaJadwal == 1) disabled @endif cols="80" id="jadwal_kegiatan" name="jadwal_kegiatan" rows="20" class="form-control">{{$proposal_ta->jadwal_kegiatan or $jadwal_kegiatan}}</textarea>
                                </div>
                              </div>
                              <div class='form-group'>
                                  <input type="submit" value="Simpan" class='btn btn-info' @if($proposal_ta->status_biayaJadwal == 1) disabled @endif >
                              </div>
                          </form>
                        </div>

                        <div class='row'>
                            <div class='col-md-12'>
                              <form action={{url('/Proposal/Store/Finalisasi')}} method="post" >
                                {{ csrf_field() }}
                                <input type="hidden" name="revisike" value="0">
                                <input type="hidden" name="nama_field" value="status_biayaJadwal">
                                {!! cekStatusFinalisasi_biayaJadwal(0) !!}
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

              <!-- ./Daftar Pustaka --> 
              <div class="row">
                <div class="col-md-12">
                  <div class="card card-info card-outline">
                    <div class="card-header">
                      <h3 class="card-title">
                        Daftar Pustaka
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
                        Syarat: <br>
                            <span style='color:red'>
                              <ul>
                                <li>Format Daftar Pustaka menggunakan Harvard Style </li>
                              </ul>
                            </span>
                            <form method="post" action={{url('/Proposal/Store/DaftarPustaka')}}>
                              {{ csrf_field() }}
                              <input type="hidden" name="revisike" value="0">
                              
                              @for ($i=0; $i < 10 ; $i++)
                                <?php $q=$i+1; ?>
                                <div class='row'>
                                    <div class='col-md-12'>
                                      <label>Pustaka {{$q}} Sumber dari : 
                                        @if ($i <= 4)
                                          Jurnal/proceding/artikel ilmiah/majalah ilmiah/buku
                                        @elseif ($i >=5 and $i<=7)
                                          Pustaka online / semua yang ada diatas
                                        @else
                                        Laporan akhir / semua yang ada diatas
                                        @endif
                                      </label>
                                      <textarea @if($proposal_ta->status_dapus == 1)disabled @endif name="dapus_{{$q}}" id="" cols="30" rows="2" class="form-control" required> {{ $daftar_pustaka[$i] }}</textarea> 
                                    </div>
                                    
                                  </div>
                                  <hr>
                              @endfor
                              <div class='form-group'>
                                <input type="submit" value="Simpan" class="btn btn-info" @if($proposal_ta->status_dapus == 1)disabled @endif>
                              </div>
                            </form>

                            <div class='row'>
                              <div class='col-md-12'>
                                <form action={{url('/Proposal/Store/Finalisasi')}} method="post" >
                                  {{ csrf_field() }}
                                  <input type="hidden" name="revisike" value="0">
                                  <input type="hidden" name="nama_field" value="status_dapus">
                                  {!! cekStatusFinalisasi_dapus(0) !!}
                                </form>
                              </div>
                            </div>   
                        </div>
                    </div>
                  </div>
                  <!-- /.card -->            
                </div>
                <!-- /.col-->
              </div>
              <!-- ./row -->

              <!-- ./Justifikasi --> 
              <div class="row">
                <div class="col-md-12">
                  <div class="card card-info card-outline">
                    <div class="card-header">
                      <h3 class="card-title">
                        Justifikasi Anggaran
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
                          <form method='post' action={{ url('/Proposal/Store/JustifikasiAnggaran')}}>
                            {{ csrf_field() }}
                            <input type="hidden" name="revisike" value="0">
                            <div class='form-group row'>
                              <div class='col-md-12'>
                                  <label>Justifikasi Anggaran</label>
                                  <textarea @if($proposal_ta->status_justifikasi == 1) disabled @endif cols="80" id="justifikasi_anggaran" name="justifikasi_anggaran" rows="20" class="form-control">{{ $proposal_ta->justifikasi_anggaran or $justifikasi_anggaran }} </textarea>
                              </div>
                            </div>
                            <div class='form-group'>
                                <input type="submit" value="Simpan" class='btn btn-info' @if($proposal_ta->status_justifikasi == 1) disabled @endif>
                            </div>
                          </form>
                        </div>

                        <div class='row'>
                          <div class='col-md-12'>
                            <form action={{ url('/Proposal/Store/Finalisasi')}} method="post">
                              {{ csrf_field() }}
                              <input type="hidden" name="revisike" value="0">
                              <input type="hidden" name="nama_field" value="status_justifikasi">
                              {!! cekStatusFinalisasi_justifikasi(0) !!}
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

              <!-- ./Upload FIle-->
              <div class="row">
                <div class="col-md-12">
                  <div class="card card-info card-outline">
                    <div class="card-header">
                      <h3 class="card-title">
                        Upload File
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
                      <form role="form" method='post' action='{{url('/Proposal/Store/UploadFile')}}' enctype='multipart/form-data'>
                        <input type="hidden" name="nim" value="{{auth()->user()->username}}">
                        <input type="hidden" name="revisike" value="0">
                        {{ csrf_field() }}
                        <!---Lembar Pengesahan--->
                        <div class="form-group row">
                          <div class="col-md-6">
                              <label for="exampleInputFile">Lembar Pengesahan</label>
                              <br>
                              <input type="file" name="pengesahan" id="pengesahan" accept=".pdf" onchange="return validate_pengesahan();" >
                              <br>
                              <span id="pengesahan_error" style="color:#dc3545 "></span>
                          </div>
                          <div class='col-md-6'>
                            <a href="{{url('/public/Lembar_Pengesahan/')}}/{{ $proposal_ta->pengesahan }}" class="btn btn-primary">Lihat Lembar Pengesahan</a>
                          </div>                    
                        </div>
      
                        <!---BIODATA KETUA--->
                        <div class="form-group row">
                          <div class="col-md-6">
                                <div class="form-group">
                                  <label for="exampleInputFile">Biodata Ketua
                                    <br>
                                    <span for="exampleInputFile" style="color:#dc3545;font-size:15px;">
                                    Dokumen harus sudah ditandatangani lalu discan seluruh halaman / dokumen
                                    <br>
                                    Maximal Ukuran File 2 MB <br>
                                    File harus PDF</span>
                                  </label>
                                  
                                  <input  type="file" name="biodata" id="biodata" accept=".pdf" onchange="return validate_biodataKetua();" >
                                  
                                  <span id="biodataKetua_error" style="color:#dc3545 "></span>
                                  
                                </div> <!-- /.form group -->
                          </div>
                          <div class='col-md-6' >
                              <a href="{{url('/public/Biodata_Mahasiswa/')}}/{{ $proposal_ta->biodata }}" class="btn btn-primary">Lihat Biodata</a>
                          </div>
                          
                        </div>
      
                        <!---BIODATA Pembimbing--->
                        <div class="row">
                          <div class="col-md-6">
                              <div class="form-group">
                                <label for="exampleInputFile">Biodata Pembimbing
                                  <br>
                                  <span for="exampleInputFile" style="color:#dc3545;font-size:15px;">
                                  Dokumen harus sudah ditandatangani lalu discan seluruh halaman / dokumen
                                  <br>
                                  Maximal Ukuran File 2 MB <br>
                                  File harus PDF</span>
                                </label>
                                      
                                <input type="file" name="biodata_pembimbing" id="biodata_pembimbing" accept=".pdf" onchange="return validate_biodata_pembimbing();" >
                                <br>
                                <span id="biodata_pembimbing_error" style="color:#dc3545 "></span>
                              </div> <!-- /.form group -->
                          </div>
                          <div class='col-md-6' >
                              <a href="{{url('/public/Biodata_Pembimbing/')}}/{{ $proposal_ta->biodata_pembimbing }}" class="btn btn-primary">Lihat Biodata Pembimbing</a>
                          </div>
                        </div>

                        <div class='form-group'>
                            <input type="submit" value="Simpan" class='btn btn-info' @if($proposal_ta->status_uploadFile == 1) disabled @endif>
                        </div>
                      </form>

                      <!---Finalisasi--->
                      <div class='row'>
                        <div class='col-md-12'>
                          <form action={{ url('/Proposal/Store/Finalisasi')}} method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="revisike" value="0">
                            <input type="hidden" name="nama_field" value="status_uploadFile">
                            {!! cekStatusFinalisasi_uploadFile(0) !!}
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

              <!-- ./GAMBARAN TEKNOLOGI -->                       
              <div class="row">
                <div class="col-md-12">
                  <div class="card card-info card-outline">
                    <div class="card-header">
                      <h3 class="card-title">
                        Gambaran Teknologi yang Hendak Diterapkembangkan.
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
                      <form role="form" method='post' action='{{url('/Proposal/Store/GambaranTeknologi')}}' enctype='multipart/form-data'>
                        {{ csrf_field() }}
                        <input type="hidden" name="nim" value="{{auth()->user()->username}}">
                        <input type="hidden" name="revisike" value="0">

                        <!--- Gambar Ilustrasi--->
                        <div class="form-group row">
                          <div class="col-md-6">
                              <label for="exampleInputFile">A.	Ilustrasi system (gambar)
                                <span for="exampleInputFile" style="color:#dc3545;font-size:15px;">Maximal Ukuran File 2 MB</span>
                              </label>
                              <input type="file" name="gambar_ilustrasi" id="gambar_ilustrasi" accept=".JPG,.JPEG,.PNG" >
                              <span id="pengesahan_error" style="color:#dc3545 "></span>                              
                          </div>
                          <div class='col-md-6' >
                            @if ($proposal_ta->gambar_ilustrasi != "")
                              <a href="{{url('public/Gambar_Ilustrasi')}}/{{$proposal_ta->gambar_ilustrasi}}" target="_blank" class="btn btn-primary">Lihat Gambar Ilustrasi</a>
                            @endif
                          </div> 
                          
                        </div>

                        <!---Penjelasan Ilustrasi--->
                        <div class="form-group row">
                          <div class="col-md-12">
                              <div class='form-group row'>
                                    <label>B.	Penjelasan gambar ilustrasi tersebut diatas (narasi).</label>
                                    <textarea name="penjelasan_ilustrasi" class='form-control' id="penjelasan_ilustrasi" cols="30" rows="5">{{ $proposal_ta->penjelasan_ilustrasi or '' }}</textarea>
                              </div>
                          </div>
                        </div>

                        <!---Spek yang diharapkan--->
                        <div class="form-group row">
                          <div class="col-md-12">
                              <div class='form-group row'>
                                <label>C.	Spesifikasi Teknis yang Diharapkan.</label>
                                <textarea name="spek_teknis" class='form-control' id="spek_teknis" cols="30" rows="5">{{ $proposal_ta->spek_teknis or '' }}</textarea>
                              </div>
                          </div>
                        </div>

                        <!---blok diagram keseluruhan--->
                        <div class="form-group row">
                          <div class="col-md-6">
                              <label for="exampleInputFile">D.	Blok Diagram Sistem Keseluruhan (gambar) (bila 1 topik dibagi menjadi 2 atau lebih subtopic).
                                <br>
                                <span for="exampleInputFile" style="color:#dc3545;font-size:15px;">Maximal Ukuran File 2 MB</span>
                              </label>
                              <input type="file" name="blok_diagram" id="blok_diagram" accept=".JPG,.JPEG,.PNG" >
                              <br>
                              <span id="pengesahan_error" style="color:#dc3545 "></span>
                              <br>
                          </div>
                          <div class='col-md-2'>
                              @if ($proposal_ta->gambar_blok_diagram)
                                <a href="{{url('public/Blok_Diagram')}}/{{$proposal_ta->gambar_blok_diagram}}" target="_blank" class="btn btn-primary">Lihat Gambar Blok Diagram 1</a>
                              @endif
                          </div>
                          
                        </div>

                        <!---Penjelasan Blok Diagram Keseluruhan--->
                        <div class="form-group row">
                          <div class="col-md-12">
                              <div class='form-group row'>
                                <label>E.	Penjelasan blok diagram tersebut diatas (narasi) (bila 1 topik dibagi menjadi 2 atau lebih subtopic).</label>
                                <textarea name="penjelasan_blok_diagram" class='form-control' id="penjelasan_ilustrasi" cols="30" rows="5">{{ $proposal_ta->penjelasan_blok_diagram or '' }}</textarea>
                              </div>
                          </div>
                        </div>

                        <!---blok diagram yang dibuat--->
                        <div class="form-group row">
                          <div class="col-md-6">
                              <label for="exampleInputFile">F.	Blok Diagram Sistem yang dibuat (gambar).
                                <br>
                                <span for="exampleInputFile" style="color:#dc3545;font-size:15px;">Maximal Ukuran File 2 MB</span>
                              </label>
                              <input type="file" name="blok_diagram2" id="blok_diagram2" accept=".JPG,.JPEG,.PNG" >
                              <br>
                              <span id="pengesahan_error" style="color:#dc3545 "></span>
                              <br>
                          </div>
                          <div class='col-md-2'>
                              @if ($proposal_ta->gambar_blok_diagram2 != "")
                                <a href="{{url('public/Blok_diagram')}}/{{$proposal_ta->gambar_blok_diagram2}}" target="_blank" class="btn btn-primary">Lihat Gambar Blok Diagram 2</a>
                              @endif
                          </div>
                        </div>

                        <!---Penjelasan Blok Diagram 2--->
                        <div class="form-group row">
                          <div class="col-md-12">
                              <div class='form-group row'>
                                <label>G.	Penjelasan blok diagram tersebut diatas (narasi).</label>
                                <textarea name="penjelasan_blok_diagram2" class='form-control' id="penjelasan_ilustrasi" cols="30" rows="5">{{ $proposal_ta->penjelasan_blok_diagram2 or '' }}</textarea>
                              </div>
                          </div>
                        </div>

                        <!---FLOWCHART--->
                        <div class="form-group row">
                          <div class="col-md-6">
                              <label for="exampleInputFile">H.	Flow Chart system keseluruhan dan bagian yang dibuat (gambar).
                                <br>
                                <span for="exampleInputFile" style="color:#dc3545;font-size:15px;">Maximal Ukuran File 2 MB</span>
                              </label>
                              <input type="file" name="gambar_flowchart" id="flowchart" accept=".JPG,.JPEG,.PNG" >
                              <br>
                              <span id="pengesahan_error" style="color:#dc3545 "></span>
                          </div>
                          <div class='col-md-2'>
                              @if ($proposal_ta->gambar_flowchart != "")
                                <a href="{{url('public/Flowchart')}}/{{$proposal_ta->gambar_flowchart}}" target="_blank" class="btn btn-primary">Lihat Gambar Flowchart</a>
                              @endif
                          </div>
                        </div>

                        <!---Penjelasan Flowchart--->
                        <div class="form-group row">
                          <div class="col-md-12">
                              <div class='form-group row'>
                                <label>I.	Penjelasan flowchart tersebut diatas (narasi).</label>
                                <textarea name="penjelasan_flowchart" class='form-control' id="penjelasan_ilustrasi" cols="30" rows="5">{{ $proposal_ta->penjelasan_flowchart or '' }}</textarea>
                              </div>
                          </div>
                        </div>

                        <!---Komponen Utama yang digunakan--->
                        <div class="form-group row">
                          <div class="col-md-12">
                              <div class='form-group row'>
                                <label>J.	Komponen Utama yang Digunakan.</label>
                                <textarea name="komponen_utama" class='form-control' id="penjelasan_ilustrasi" cols="30" rows="5">{{ $proposal_ta->komponen or '' }}</textarea>
                              </div>
                          </div>
                        </div>
                        
                        <div class="form-group row">
                          <div class="col-md-6">
                              <div class='form-group row'>
                              <input type="submit" value="SIMPAN" class='btn btn-info' @if($proposal_ta->status_gambaranTeknologi == 1) disabled @endif>
                              </div>
                          </div>
                        </div>
                      </form>

                      <div class='row'>
                        <div class='col-md-12'>
                          <form action={{ url('/Proposal/Store/Finalisasi')}} method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="revisike" value="0">
                            <input type="hidden" name="nama_field" value="status_gambaranTeknologi">
                            {!! cekStatusFinalisasi_gambaranTeknologi(0) !!}
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
  <script src="{{asset('public/vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
  <script src="{{asset('public/vendor/unisharp/laravel-ckeditor/adapters/jquery.js')}}"></script>
  <script src="{{asset('public/js/ckeditor.js')}}"></script>
@endpush