@extends('Layout.master')

@section('title','Proposal TA R1')

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
        <h1>Proposal TA Revisi 1</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item">Proposal TA </li>
            <li class="breadcrumb-item active">Revisi 1</li>
        </ol>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>
<?php
$revisi=1;
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
                                  <form method='post' action='simpan_dataProposal'>
                                      {{ csrf_field()}}
                                      <input type="hidden" name="nim" value="{{auth()->user()->username}}">
                                      <input type="hidden" name="revisike" value="{{$revisi}}">

                                      <!--Judul-->
                                      <div class='form-group row'>
                                          <div class='col-md-6'>
                                              <label>Judul TA</label>
                                              <div class="card card-body alert-dark">
                                                  <b>Data Sebelumnya :</b>
                                                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                                              </div>
                                              <textarea cols="80" name="judul_ta" rows="3" class="form-control"></textarea>
                                          </div>
                                          <div class='col-md-2'>
                                              <label> <center>Nilai</center> </label>
                                              <div class="card card-body">
                                                  100
                                              </div>
                                          </div>
                                          <div class='col-md-4'>
                                              <label>Komentar</label>
                                              <div class="card card-body alert-danger">
                                                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, 
                                              </div>
                                          </div>
                                      </div>
                                      
                                      <!--Bidang-->
                                      <div class="form-group row">
                                          <div class='col-md-6'>
                                              <label>Bidang </label>
                                              <div class="card card-body alert-dark">
                                                  <b>Data Sebelumnya :</b>
                                                  Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                                              </div>
                                              <select class="form-control" name="bidang">
                                                  <option value='0'>-------------------------</option>
                                                  @foreach ($bidang as $valBidang)
                                                      <option value="{{ $valBidang->id }}"> {{ $valBidang->nama }}</option>
                                                  @endforeach
                                              </select>
                                          </div>
                                      </div>
                                      
                                      <!--Pembimbing 1-->
                                      <div class="form-group row">
                                          <div class='col-md-6'>
                                              <label>Pembimbing 1 </label>
                                              <div class="card card-body alert-dark">
                                                  <b>Data Sebelumnya :</b>
                                                  Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                                              </div>
                                              <select class="form-control" name="pembimbing_1">
                                                  <option value='0'>-------------------------</option>
                                                  @foreach ($pembimbing1 as $p1)
                                                      <option value="{{ $p1->kodedosen }}"> {{ $p1->nama }}</option>
                                                  @endforeach
                                              </select>
                                          </div>
                                      </div>

                                      <!--Pembimbing 2-->
                                      <div class="form-group row">
                                          <div class='col-md-6'>
                                              <label>Pembimbing 2 </label>
                                              <div class="card card-body alert-dark">
                                                  <b>Data Sebelumnya :</b>
                                                  Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                                              </div>
                                              <select class="form-control" name="pembimbing_2">
                                              <option value='0'>-------------------------</option>
                                                  @foreach ($pembimbing2 as $p2)
                                                      <option value="{{ $p2->kodedosen }}"> {{ $p2->nama }}</option>
                                                  @endforeach
                                              </select>
                                          </div>
                                      </div>
                                      <div class='form-group'>
                                          <input type="submit" value="Simpan" class='btn btn-info'>
                                      </div>
                                  </form>

                                  <!--Finalisasi data proposal>-->
                                  <div class='row'>
                                      <div class='col-md-12'>
                                          <form action="simpan_finalisasi" method="post" id='finalisasiform'>
                                              {{ csrf_field() }}
                                              <input type="hidden" name="nim" value="{{auth()->user()->username}}">
                                              <input type="hidden" name="revisike" value="{{$revisi}}">
                                              <input type="hidden" name="nama_field" value="status_dataProposal">
                                              <p>
                                              Dengan menekan tombol dibawah ini, saya sudah yakin dengan data-data diatas dan siap untuk dinilai dan dikomentari
                                              oleh reviewer.
                                              <span style='color:red'> Setelah menekan tombol dibawah ini, data-data diatas sudah tidak bisa diubah kembali, jadi pastikan data tersebut
                                              SUDAH DIISI DAN DISIMPAN (dengan menekan tombol Simpan) TERLEBIH DAHULU !!!</span>
                                              </p>
                                              <span class='btn btn-lg btn-danger' >Sudah difinalisasi</span>
                                              <button class='btn btn-lg btn-success col-md-12'> Finalisasi</button>
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

              <!-- ./Abstrak -->
              <div class="row">
                  <div class="col-md-12">
                      <div class="card card-info card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Abstrak </h3>
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
                              <form method='post' action='simpan_abstrak'>
                                  {{csrf_field()}}
                                  <input type="hidden" name="nim" value="{{auth()->user()->username}}">
                                  <input type="hidden" name="revisike" value="{{$revisi}}">
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

                                  <!-- ./ Abstrak Indonesia>-->
                                  <div class='form-group row'>
                                      <div class='col-md-6'>
                                          <label>Abstrak (Indonesia)</label>
                                          <div class="accordion">
                                              <div class="card">
                                                <div class="alert-dark" id="headingOne">
                                                  <h2 class="mb-0">
                                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#abs_ind" aria-expanded="true" >
                                                        <b>Data Sebelumnya :</b>
                                                    </button>
                                                  </h2>
                                                </div>
                                                <div id="abs_ind" class="collapse">
                                                    <div class="card-body">
                                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven
                                                    </div>
                                                </div>
                                              </div>
                                          </div>
                                          <textarea cols="80" id="abstrak_ind" name="abstrak_ind" rows="20" class="form-control"></textarea>
                                      </div>
                                      <div class='col-md-2'>
                                          <label> <center>Nilai</center> </label>
                                          <div class="card card-body">
                                              100
                                          </div>
                                      </div>
                                      <div class='col-md-4'>
                                          <label>Komentar</label>
                                          <div class="card card-body alert-danger">
                                              Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, 
                                          </div>
                                      </div>
                                  </div>

                                  <!-- ./Keyword Indonesia> -->
                                  <div class='form-group row'>
                                      <div class='col-md-6'>
                                          <label>Keyword (Indonesia)</label>
                                          <div class="card card-body alert-dark">
                                              <b>Data Sebelumnya :</b>
                                              Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                                          </div>
                                          <input type="text" name="keyword_ind" class='form-control' value="">
                                      </div>
                                      <div class='col-md-2'>
                                          <label> <center>Nilai</center> </label>
                                          <div class="card card-body">
                                              100
                                          </div>
                                      </div>
                                      <div class='col-md-4'>
                                          <label>Komentar</label>
                                          <div class="card card-body alert-danger">
                                              Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, 
                                          </div>
                                      </div>
                                  </div>

                                  <!-- ./Abstrak Inggris> -->
                                  <div class='form-group row'>
                                      <div class='col-md-6'>
                                          <label>Abstrak (Bahasa Inggris)</label>
                                          <div class="accordion">
                                              <div class="card">
                                                <div class="alert-dark" id="headingOne">
                                                  <h2 class="mb-0">
                                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#abs_eng" aria-expanded="true" >
                                                        <b>Data Sebelumnya :</b>
                                                    </button>
                                                  </h2>
                                                </div>
                                                <div id="abs_eng" class="collapse">
                                                    <div class="card-body">
                                                          3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven
                                                    </div>
                                                </div>
                                              </div>
                                          </div>
                                          <textarea cols="80" id="abstrak_eng" name="abstrak_eng" rows="20" class="form-control"></textarea>
                                      </div>
                                      <div class='col-md-2'>
                                          <label> <center>Nilai</center> </label>
                                          <div class="card card-body">
                                              100
                                          </div>
                                      </div>
                                      <div class='col-md-4'>
                                          <label>Komentar</label>
                                          <div class="card card-body alert-danger">
                                              Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, 
                                          </div>
                                      </div>
                                  </div>

                                  <!-- ./Keyword Inggris> -->
                                  <div class='form-group row'>
                                      <div class='col-md-6'>
                                          <label>Keyword (Bahasa Inggris)</label>
                                          <div class="card card-body alert-dark">
                                              <b>Data Sebelumnya :</b>
                                              Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                                          </div>
                                          <input type="text" name="keyword_eng" class='form-control' value="">
                                      </div>
                                      <div class='col-md-2'>
                                          <label> <center>Nilai</center> </label>
                                          <div class="card card-body">
                                              100
                                          </div>
                                      </div>
                                      <div class='col-md-4'>
                                          <label>Komentar</label>
                                          <div class="card card-body alert-danger">
                                              Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, 
                                          </div>
                                      </div>
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
                          <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#col_caraPengutipan">cara penulisan sitasi format harvard (khusus website ini)</button>
                          
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
                          <br><br>
                          
                          <label style='color:red'> Meski pada kolom komentar sudah dikatakan bagus. data dari revisi sebelumnya harus 
                          tetap disalin ke revisi yang sekarang !!!
                          </label>

                          <form method='post' action='simpan_pendahuluan'>
                            {{ csrf_field() }}
                            <input type="hidden" name="nim" value="{{auth()->user()->username}}">
                            <input type="hidden" name="revisike" value="{{$revisi}}">

                              <div class='form-group'>
                                <!-- ./ Paragraf 1-->                            
                                <div class='form-group row'>
                                  <div class='col-md-6'>
                                    <label>Paragraf 1 : Permasalahan yang diangkat berdasarkan trend saat ini</label>
                                    <div class="accordion">
                                        <div class="card">
                                          <div class="alert-dark" id="headingOne">
                                            <h2 class="mb-0">
                                              <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#pend1" aria-expanded="true" >
                                                  <b>Data Sebelumnya :</b>
                                              </button>
                                            </h2>
                                          </div>
                                          <div id="pend1" class="collapse">
                                              <div class="card-body">
                                                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven
                                              </div>
                                          </div>
                                        </div>
                                    </div>
                                    <textarea name='pendahuluan_p1' rows='3' class='form-control' required></textarea>
                                  </div>
                                  <div class='col-md-2'>
                                      <label> <center>Nilai</center> </label>
                                      <div class="card card-body">
                                          100
                                      </div>
                                  </div>
                                  <div class='col-md-4'>
                                      <label>Komentar</label>
                                      <div class="card card-body alert-danger">
                                          Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, 
                                      </div>
                                  </div>
                                </div>

                                <!-- ./ Paragraf 2-->
                                <div class='form-group row'>
                                    <div class='col-md-6'>
                                    <label>Paragraf 2 : Ulasan tentang karya-karya yang telah ada sebelumnya. Resumekan dari Bab Tinjauan Pustaka yang telah dibuat</label>
                                    <div class="accordion">
                                        <div class="card">
                                          <div class="alert-dark" id="headingOne">
                                            <h2 class="mb-0">
                                              <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#pend2" aria-expanded="true" >
                                                  <b>Data Sebelumnya :</b>
                                              </button>
                                            </h2>
                                          </div>
                                          <div id="pend2" class="collapse">
                                              <div class="card-body">
                                                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven
                                              </div>
                                          </div>
                                        </div>
                                    </div>
                                    <textarea name='pendahuluan_p2' rows='3' class='form-control' required> </textarea>
                                    </div>
                                    <div class='col-md-2'>
                                        <label> <center>Nilai</center> </label>
                                        <div class="card card-body">
                                            100
                                        </div>
                                    </div>
                                    <div class='col-md-4'>
                                        <label>Komentar</label>
                                        <div class="card card-body alert-danger">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, 
                                        </div>
                                    </div>
                                </div>

                                <!-- ./ Paragraf 3-->
                                <div class='form-group row'>
                                  <div class='col-md-6'>
                                    <label>Paragraf 3 : Ide yang diusulkan untuk pemecahan masalah tersebut di atas</label>
                                    <div class="accordion">
                                        <div class="card">
                                          <div class="alert-dark" id="headingOne">
                                            <h2 class="mb-0">
                                              <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#pend3" aria-expanded="true" >
                                                  <b>Data Sebelumnya :</b>
                                              </button>
                                            </h2>
                                          </div>
                                          <div id="pend3" class="collapse">
                                              <div class="card-body">
                                                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven
                                              </div>
                                          </div>
                                        </div>
                                    </div>
                                    <textarea name='pendahuluan_p3' rows='3' class='form-control' required></textarea>
                                  </div>
                                  <div class='col-md-2'>
                                      <label> <center>Nilai</center> </label>
                                      <div class="card card-body">
                                          100
                                      </div>
                                  </div>
                                  <div class='col-md-4'>
                                      <label>Komentar</label>
                                      <div class="card card-body alert-danger">
                                          Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, 
                                      </div>
                                  </div>
                                </div>

                                <!-- ./ Paragraf 4-->
                                <div class='form-group row'>
                                    <div class='col-md-6'>
                                      <label>Paragraf 4 : Gambaran umum cara kerja alat yang diusulkan</label>
                                      <div class="accordion">
                                          <div class="card">
                                            <div class="alert-dark" id="headingOne">
                                              <h2 class="mb-0">
                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#pend4" aria-expanded="true" >
                                                    <b>Data Sebelumnya :</b>
                                                </button>
                                              </h2>
                                            </div>
                                            <div id="pend4" class="collapse">
                                                <div class="card-body">
                                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven
                                                </div>
                                            </div>
                                          </div>
                                      </div>
                                      <textarea name='pendahuluan_p4' rows='3' class='form-control' required></textarea>
                                    </div>
                                    <div class='col-md-2'>
                                        <label> <center>Nilai</center> </label>
                                        <div class="card card-body">
                                            100
                                        </div>
                                    </div>
                                    <div class='col-md-4'>
                                        <label>Komentar</label>
                                        <div class="card card-body alert-danger">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, 
                                        </div>
                                    </div>
                                </div>

                                <!-- ./ Paragraf 5-->
                                <div class='form-group row'>
                                    <div class='col-md-6'>
                                      <label>Paragraf 5 : Jelaskan pembagian sistem dengan partner kerja bila topik dibagi menjadi 2 atau lebih</label>
                                      <div class="accordion">
                                          <div class="card">
                                            <div class="alert-dark" id="headingOne">
                                              <h2 class="mb-0">
                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#pend5" aria-expanded="true" >
                                                    <b>Data Sebelumnya :</b>
                                                </button>
                                              </h2>
                                            </div>
                                            <div id="pend5" class="collapse">
                                                <div class="card-body">
                                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven
                                                </div>
                                            </div>
                                          </div>
                                      </div>
                                      <textarea name='pendahuluan_p5' rows='3' class='form-control' required></textarea>
                                    </div>
                                    <div class='col-md-2'>
                                        <label> <center>Nilai</center> </label>
                                        <div class="card card-body">
                                            100
                                        </div>
                                    </div>
                                    <div class='col-md-4'>
                                        <label>Komentar</label>
                                        <div class="card card-body alert-danger">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, 
                                        </div>
                                    </div>
                                </div>

                                <!-- ./ Paragraf 6-->
                                <div class='form-group row'>
                                    <div class='col-md-6'>
                                      <label>Paragraf 6 : Tuliskan Manfaat dari karya yang diusulkan</label>
                                      <div class="accordion">
                                          <div class="card">
                                            <div class="alert-dark" id="headingOne">
                                              <h2 class="mb-0">
                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#pend6" aria-expanded="true" >
                                                    <b>Data Sebelumnya :</b>
                                                </button>
                                              </h2>
                                            </div>
                                            <div id="pend6" class="collapse">
                                                <div class="card-body">
                                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven
                                                </div>
                                            </div>
                                          </div>
                                      </div>
                                      <textarea name='pendahuluan_p6' rows='3' class='form-control' required></textarea>
                                    </div>
                                    <div class='col-md-2'>
                                        <label> <center>Nilai</center> </label>
                                        <div class="card card-body">
                                            100
                                        </div>
                                    </div>
                                    <div class='col-md-4'>
                                        <label>Komentar</label>
                                        <div class="card card-body alert-danger">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, 
                                        </div>
                                    </div>
                                </div>

                                <!-- ./ Paragraf 7-->
                                <div class='form-group row'>
                                    <div class='col-md-6'>
                                      <label>Paragraf 7 : Tuliskan Luaran dari karya yang diusulkan, Pilih salah satu atau lebih luaran berikut <br>
                                          <ul>
                                              <li>Prototipe</li>
                                              <li>Produk</li>
                                              <li>Publikasi pada Prosiding Seminar Nasional</li>
                                              <li>Publikasi pada Prosiding Seminar Internasional</li>
                                              <li>Publikasi pada Jurnal Nasional</li>
                                              <li>Publikasi pada Jurnal Internasional</li>
                                              <li>Paten</li>
                                          </ul>
                                      </label>
                                      <div class="accordion">
                                          <div class="card">
                                            <div class="alert-dark" id="headingOne">
                                              <h2 class="mb-0">
                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#pend7" aria-expanded="true" >
                                                    <b>Data Sebelumnya :</b>
                                                </button>
                                              </h2>
                                            </div>
                                            <div id="pend7" class="collapse">
                                                <div class="card-body">
                                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven
                                                </div>
                                            </div>
                                          </div>
                                      </div>
                                      <textarea name='pendahuluan_p7' rows='3' class='form-control' required></textarea>
                                    </div>
                                    <div class='col-md-2'>
                                        <label> <center>Nilai</center> </label>
                                        <div class="card card-body">
                                            100
                                        </div>
                                    </div>
                                    <div class='col-md-4'>
                                        <label>Komentar</label>
                                        <div class="card card-body alert-danger">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, 
                                        </div>
                                    </div>
                                </div>
                              </div>
                              <div class='form-group'>
                                  <input type="submit" value="Simpan" class='btn btn-info'>
                              </div>
                          </form>
                          
                          <div class='row'>
                              <div class='col-md-12'>
                                <form action="simpan_finalisasi" method="post" id='finalisasiform_pendahuluan'>
                                  {{ csrf_field() }}
                                  <input type="hidden" name="nim" value="{{auth()->user()->username}}">
                                  <input type="hidden" name="revisike" value="{{$revisi}}">
                                  <input type="hidden" name="nama_field" value="status_pendahuluan">
                                  <p>
                                  Dengan menekan tombol dibawah ini, saya sudah yakin dengan data-data diatas dan siap untuk dinilai dan dikomentari
                                  oleh reviewer.
                                  <span style='color:red'> Setelah menekan tombol dibawah ini, data-data diatas sudah tidak bisa diubah kembali, jadi pastikan data tersebut
                                  SUDAH DIISI DAN DISIMPAN (dengan menekan tombol Simpan) TERLEBIH DAHULU !!!</span>
                                  </p>
                                  <span class='btn btn-lg btn-danger' >Sudah difinalisasi</span>
                                  <button class='btn btn-lg btn-success col-md-12'> Finalisasi</button>                                
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

                          <label style='color:red'> Meski pada kolom komentar sudah dikatakan bagus. data dari revisi sebelumnya harus 
                          tetap disalin ke revisi yang sekarang !!!
                          </label>
                        <form method='post' action='simpan_pustaka'>
                          {{ csrf_field() }}
                          <input type="hidden" name="nim" value="{{auth()->user()->username}}">
                          <input type="hidden" name="revisike" value="{{$revisi}}">
                            <div class='form-group'>
                                <label>Gambaran metoda yang digunakan, kelebihan dan kekurangan dari setiap pustaka yang 
                                digunakan dalam daftar pustaka. Setiap 1 pustaka dibuat 1 paragraf.</label>
                            </div>

                            @for ($i=1; $i < 10 ; $i++)
                            <div class='form-group row'>
                                <div class='col-md-6'>
                                  <label>Gambaran metoda yang digunakan pustaka {{$i}} .<br> 
                                    <span style='color:red'>Tambahkan link pengutipan model Harvard pada akhir kalimat, contoh : (Budiman,2000)</span>
                                  </label>
                                  <div class="accordion">
                                      <div class="card">
                                        <div class="alert-dark" id="headingOne">
                                          <h2 class="mb-0">
                                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#tinpus_{{$i}}" aria-expanded="true" >
                                                <b>Data Sebelumnya :</b>
                                            </button>
                                          </h2>
                                        </div>
                                        <div id="tinpus_{{$i}}" class="collapse">
                                            <div class="card-body">
                                                  3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven
                                            </div>
                                        </div>
                                      </div>
                                  </div>

                                  <textarea name='pustaka_1{{$i}}' rows='5' class='form-control'></textarea>
                                </div>
                                <div class='col-md-2'>
                                    <label> <center>Nilai</center> </label>
                                    <div class="card card-body">
                                        100
                                    </div>
                                </div>
                                <div class='col-md-4'>
                                    <label>Komentar</label>
                                    <div class="card card-body alert-danger">
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, 
                                    </div>
                                </div>
                              </div>
                            @endfor
                            
                            <div class='form-group row'>
                                <div class='col-md-6'>
                                  <label>2. Tabel Perbandingan karya yang sudah ada dalam daftar pustaka dengan karya yang diusulkan.</label>
                                  <br>
                                  Data Sebelumnya
                                  <textarea id="pustaka_2_before" rows='3' class='form-control'>asd</textarea>
                                  <br>
                                  <textarea id="pustaka_2" name='pustaka_2' rows='3' class='form-control'>{{$pustaka2}}</textarea>
                                </div>
                                <div class='col-md-2'>
                                    <label> <center>Nilai</center> </label>
                                    <div class="card card-body">
                                        100
                                    </div>
                                </div>
                                <div class='col-md-4'>
                                    <label>Komentar</label>
                                    <div class="card card-body alert-danger">
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, 
                                    </div>
                                </div>
                            </div>
                            <div class='form-group'>
                                <input type="submit" value="Simpan" class='btn btn-info'>
                            </div>
                        </form>
                        <div class='row'>
                            <div class='col-md-12'>
                              <form action="simpan_finalisasi" method="post" id='finalisasiform_tinpus'>
                                {{ csrf_field() }}
                                <input type="hidden" name="nim" value="{{auth()->user()->username}}">
                                <input type="hidden" name="revisike" value="{{$revisi}}">
                                <input type="hidden" name="nama_field" value="status_Tinpus">
                                <p>
                                Dengan menekan tombol dibawah ini, saya sudah yakin dengan data-data diatas dan siap untuk dinilai dan dikomentari
                                oleh reviewer.
                                <span style='color:red'> Setelah menekan tombol dibawah ini, data-data diatas sudah tidak bisa diubah kembali, jadi pastikan data tersebut
                                SUDAH DIISI DAN DISIMPAN (dengan menekan tombol Simpan) TERLEBIH DAHULU !!!</span>
                                </p>
                                <span class='btn btn-lg btn-danger' >Sudah difinalisasi</span>
                                <button class='btn btn-lg btn-success col-md-12'> Finalisasi</button>                                
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
                        Metode Penelitan/Pelaksanaan
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
                        
                        <form method='post' action='simpan_metode'>
                          {{ csrf_field() }}
                          <input type="hidden" name="nim" value="{{auth()->user()->username}}">
                          <input type="hidden" name="revisike" value="{{$revisi}}">
                          
                          <?php
                            $ket = array(
                              "Cara koleksi data awal",
                              "Cara mendesain alat (Menyusun desain teknis)",
                              "Cara membuat alat (Proses realisasi alat)",
                              "Cara uji keandalan alat",
                              "Cara menganalisis data",
                              "Cara evaluasi kinerja alat"
                            );
                          ?>

                          @for ($i=0; $i < 6 ; $i++)
                            <div class='form-group row'>
                                <div class='col-md-6'>
                                    <label>{{$ket[$i]}}</label>
                                    <div class="accordion">
                                        <div class="card">
                                          <div class="alert-dark" id="headingOne">
                                            <h2 class="mb-0">
                                              <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#metode_{{$i}}" aria-expanded="true" >
                                                  <b>Data Sebelumnya :</b>
                                              </button>
                                            </h2>
                                          </div>
                                          <div id="metode_{{$i}}" class="collapse">
                                              <div class="card-body">
                                                    3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven
                                              </div>
                                          </div>
                                        </div>
                                    </div>
                                    <br><textarea name='metode_pelaksanaan_{{$i+1}}' rows='5' class='form-control'></textarea>
                                </div>
                                <div class='col-md-2'>
                                    <label> <center>Nilai</center> </label>
                                    <div class="card card-body">
                                        100
                                    </div>
                                </div>
                                <div class='col-md-4'>
                                    <label>Komentar</label>
                                    <div class="card card-body alert-danger">
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, 
                                    </div>
                                </div>
                            </div>
                          @endfor
                          <div class='form-group'>
                              <input type="submit" value="Simpan" class='btn btn-info'>
                          </div>
                        </form>
                        <div class='row'>
                            <div class='col-md-12'>
                              <form action="simpan_finalisasi" method="post" id='finalisasiform_metode'>
                                <input type="hidden" name="nim" value="{{auth()->user()->username}}">
                                <input type="hidden" name="revisike" value="{{$revisi}}">
                                <input type="hidden" name="nama_field" value="status_metode">
                                <p>
                                Dengan menekan tombol dibawah ini, saya sudah yakin dengan data-data diatas dan siap untuk dinilai dan dikomentari
                                oleh reviewer.
                                <span style='color:red'> Setelah menekan tombol dibawah ini, data-data diatas sudah tidak bisa diubah kembali, jadi pastikan data tersebut
                                SUDAH DIISI DAN DISIMPAN (dengan menekan tombol Simpan) TERLEBIH DAHULU !!!</span>
                                </p>
                                <span class='btn btn-lg btn-danger' >Sudah difinalisasi</span>
                                <button class='btn btn-lg btn-success col-md-12'> Finalisasi</button>
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
                        <form method='post' action='simpan_biaya_jadwal'>
                          {{ csrf_field() }}

                          <input type="hidden" name="nim" value="{{auth()->user()->username}}">
                          <input type="hidden" name="revisike" value="{{$revisi}}">
                            <div class='form-group row'>
                              <div class='col-md-6'>
                                <label>Anggaran Biaya</label>
                                <br>
                                Data Sebelumnya
                                <textarea id='biaya_sebelumnya' cols="80" rows="20" class="form-control" disabled> ad</textarea>
                                <br>
                                <textarea cols="80" id="biaya" name="biaya" rows="20" class="form-control">{{$biaya}}</textarea>
                              </div>
                              <div class='col-md-2'>
                                  <label> <center>Nilai</center> </label>
                                  <div class="card card-body">
                                      100
                                  </div>
                              </div>
                              <div class='col-md-4'>
                                  <label>Komentar</label>
                                  <div class="card card-body alert-danger">
                                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, 
                                  </div>
                              </div>
                            </div>
                            <div class='form-group row'>
                              <div class='col-md-6'>
                                  <label>Jadwal Kegiatan</label>
                                  <textarea cols="80" id="jadwal_kegiatan_sebelumnya" rows="20" class="form-control" disabled></textarea>
                                  <br>
                                  <textarea cols="80" id="jadwal_kegiatan" name="jadwal_kegiatan" rows="20" class="form-control">{{$jadwal_kegiatan}}</textarea>
                              </div>
                              <div class='col-md-2'>
                                  <label> <center>Nilai</center> </label>
                                  <div class="card card-body">
                                      100
                                  </div>
                              </div>
                              <div class='col-md-4'>
                                  <label>Komentar</label>
                                  <div class="card card-body alert-danger">
                                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, 
                                  </div>
                              </div>
                            </div>
                            <div class='form-group'>
                                <input type="submit" value="Simpan" class='btn btn-info'>
                            </div>
                        </form>
                        <div class='row'>
                            <div class='col-md-12'>
                              <form action="simpan_finalisasi" method="post" id='finalisasiform_biayaJadwal'>
                                {{ csrf_field() }}
                                <input type="hidden" name="nim" value="{{auth()->user()->username}}">
                                <input type="hidden" name="revisike" value="{{$revisi}}">
                                <input type="hidden" name="nama_field" value="status_biayaJadwal">
                                <p>
                                Dengan menekan tombol dibawah ini, saya sudah yakin dengan data-data diatas dan siap untuk dinilai dan dikomentari
                                oleh reviewer.
                                <span style='color:red'> Setelah menekan tombol dibawah ini, data-data diatas sudah tidak bisa diubah kembali, jadi pastikan data tersebut
                                SUDAH DIISI DAN DISIMPAN (dengan menekan tombol simpan sebagai draft) TERLEBIH DAHULU !!!</span>
                                </p>
                                <span class='btn btn-lg btn-danger' >Sudah difinalisasi</span>
                                <button class='btn btn-lg btn-success col-md-12'> Finalisasi</button>
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
                            
                            <form method="post" action='simpan_daftar_pustaka'>
                              <input type="hidden" name="nim_ketua" value="{{auth()->user()->username}}">
                              <input type="hidden" name="revisike" value="{{$revisi}}">
                              <!--INDIKATOOORR-->
                              @for ($i=1; $i <=11 ; $i++)
                                <input type='hidden' name='indikator_A_dapus{{$i}}' value='A_dapus_p{{$i}}'>
                                <input type='hidden' name='indikator_B_dapus{{$i}}' value='B_dapus_p{{$i}}'>
                                <input type='hidden' name='indikator_C_dapus{{$i}}' value='C_dapus_p{{$i}}'>
                              @endfor
                              <!--INDIKATOOORR-->
                              
                              @for ($j=0; $j < 10 ; $j++)
                                <div class='row'>
                                  <div class='col-md-6'>
                                    <label>Pustaka {{$j+1}} Sumber dari :
                                      @if ($j <= 4)
                                        Jurnal/proceding/artikel ilmiah/majalah ilmiah/buku
                                      @elseif($j >=5 and $j <= 7)
                                        Pustaka online / semua yang ada diatas
                                      @else
                                        Laporan akhir / semua yang ada diatas 
                                      @endif 
                                    </label>
                                    <div class="card card-body alert-dark">
                                        <b>Data Sebelumnya :</b>
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                                    </div>
                                    <textarea name="dapus_{{$j+1}}" rows="2" class="form-control" required></textarea> 
                                  </div>

                                  
                                  <div class='col-md-6'>
                                    <!-- ./ Daftar Pustaka A -->
                                    <label>Nilai dan Komentar Poin Pustaka {{$j+1}} A (Ada/Tidak)</label>
                                    <div class='row'>
                                      <div class='col-md-2'>
                                          <div class="card card-body">
                                              100
                                          </div>
                                      </div>
                                      <div class='col-md-10'>
                                          <div class="card card-body alert-danger">
                                              Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, 
                                          </div>
                                      </div>
                                    </div>

                                    <!-- ./ Daftar Pustaka B -->
                                    <label>Nilai dan Komentar Poin Pustaka {{$j+1}} B (Kesesuaian)</label>
                                    <div class='row'>
                                        <div class='col-md-2'>
                                            <div class="card card-body">
                                                100
                                            </div>
                                        </div>
                                        <div class='col-md-10'>
                                            <div class="card card-body alert-danger">
                                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, 
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- ./ Daftar Pustaka C -->
                                    <label>Nilai dan Komentar Poin Pustaka {{$j+1}} C (Digunakan/Tidak)</label>
                                    <div class='row'>
                                        <div class='col-md-2'>
                                            <div class="card card-body">
                                                100
                                            </div>
                                        </div>
                                        <div class='col-md-10'>
                                            <div class="card card-body alert-danger">
                                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, 
                                            </div>
                                        </div>
                                    </div>
                                  </div>

                                
                                </div>
                                <hr>
                              @endfor
                              
                              <div class='form-group'>
                                <input type="submit" value="Simpan" class="btn btn-primary">
                              </div>

                            </form>
                            <div class='row'>
                              <div class='col-md-12'>
                                <form action="simpan_finalisasi" method="post" id='finalisasiform_dapus'>
                                  {{ csrf_field() }}
                                  <input type="hidden" name="nim" value="{{auth()->user()->username}}">
                                  <input type="hidden" name="revisike" value="{{$revisi}}">
                                  <input type="hidden" name="nama_field" value="status_dapus">
                                  <p>
                                  Dengan menekan tombol dibawah ini, saya sudah yakin dengan data-data diatas dan siap untuk dinilai dan dikomentari
                                  oleh reviewer.
                                  <span style='color:red'> Setelah menekan tombol dibawah ini, data-data diatas sudah tidak bisa diubah kembali, jadi pastikan data tersebut
                                  SUDAH DIISI DAN DISIMPAN (dengan menekan tombol simpan sebagai draft) TERLEBIH DAHULU !!!</span>
                                  </p>
                                  <span class='btn btn-lg btn-danger' >Sudah difinalisasi</span>
                                  <button class='btn btn-lg btn-success col-md-12'> Finalisasi</button>                                  
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
                          <form method='post' action='simpan_justifikasi_susunan'>
                            {{ csrf_field() }}
                            <input type="hidden" name="nim" value="{{auth()->user()->username}}">
                            <input type="hidden" name="revisike" value="{{$revisi}}">

                            <div class='form-group row'>
                                  <div class='col-md-6'>
                                      <label>Justifikasi Anggaran</label>
                                      <label>Anggaran Biaya</label>
                                      <br>
                                      Data Sebelumnya
                                      <textarea id='justifikasi_anggaran_before' cols="80" rows="20" class="form-control" disabled> ad</textarea>
                                      <textarea cols="80" id="justifikasi_anggaran" name="justifikasi_anggaran" rows="20" class="form-control">{{$justifikasi_anggaran}}</textarea>
                                  </div>
                                  <div class='col-md-2'>
                                      <label> <center>Nilai</center> </label>
                                      <div class="card card-body">
                                          100
                                      </div>
                                  </div>
                                  <div class='col-md-4'>
                                      <label>Komentar</label>
                                      <div class="card card-body alert-danger">
                                          Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, 
                                      </div>
                                  </div>
                            </div>
                              
                            <div class='form-group'>
                                <input type="submit" value="Simpan" class='btn btn-info'>
                            </div>
                          </form>
                        </div>

                        <div class='row'>
                          <div class='col-md-12'>
                            <form action="simpan_finalisasi" method="post" id='finalisasiform_justifikasiOrganisasi'>
                              {{ csrf_field() }}
                              <input type="hidden" name="nim" value="{{auth()->user()->username}}">
                              <input type="hidden" name="revisike" value="{{$revisi}}">
                              <input type="hidden" name="nama_field" value="status_justifikasiOrganisasi">
                              <p>
                              Dengan menekan tombol dibawah ini, saya sudah yakin dengan data-data diatas dan siap untuk dinilai dan dikomentari
                              oleh reviewer.
                              <span style='color:red'> Setelah menekan tombol dibawah ini, data-data diatas sudah tidak bisa diubah kembali, jadi pastikan data tersebut
                              SUDAH DIISI DAN DISIMPAN (dengan menekan tombol simpan sebagai draft) TERLEBIH DAHULU !!!</span>
                              </p>
                              <span class='btn btn-lg btn-danger' >Sudah difinalisasi</span>
                              <button class='btn btn-lg btn-success col-md-12'> Finalisasi</button>                              
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

              <!---Upload File-->
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
                      <!---Pengesahan--->
                      <div class="form-group row">
                        <div class="col-md-6">
                          <form role="form" method='post' action='upload_lembarPengesahan' enctype='multipart/form-data'>
                            {{ csrf_field() }}
                            <input type="hidden" name="nim" value="{{auth()->user()->username}}">
                            <input type="hidden" name="revisike" value="{{$revisi}}">
                            <label for="exampleInputFile">Lembar Pengesahan
                              
                            <br>
                              <span for="exampleInputFile" style="color:#dc3545;font-size:15px;">
                                Dokumen harus sudah ditandatangani lalu discan seluruh halaman / dokumen <br>
                                Maximal Ukuran File 2 MB <br>
                                File harus PDF
                              </span>
                            </label>
                            <input type="file" name="pengesahan" id="pengesahan" accept=".pdf" onchange="return validate_pengesahan();"  required>
                            <br>
                            <span id="pengesahan_error" style="color:#dc3545 "></span>
                            <br>
                            Berkas Sebelumnya
                            <div class="input-group-append">
                              <input type="submit" class="btn btn-info" id="btn_pengesahan" Value="Upload">
                            </div>
                          </form>
                        </div>
                        <div class='col-md-2'>
                            <label> <center>Nilai</center> </label>
                            <div class="card card-body">
                                100
                            </div>
                        </div>
                        <div class='col-md-4'>
                            <label>Komentar</label>
                            <div class="card card-body alert-danger">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, 
                            </div>
                        </div>
                      </div>

                      <!---BIODATA KETUA--->
                      <div class="form-group row">
                        <div class="col-md-6">
                          <form role="form" method='post' action='upload_biodataKetua' enctype='multipart/form-data'>
                            {{ csrf_field() }}
                            <input type="hidden" name="nim" value="{{auth()->user()->username}}">
                            <input type="hidden" name="revisike" value="{{$revisi}}">
                            <div class="form-group">
                                <label for="exampleInputFile">Biodata Ketua
                                <span for="exampleInputFile" style="color:#dc3545;font-size:15px;">
                                  Dokumen harus sudah ditandatangani lalu discan seluruh halaman / dokumen
                                  <br>
                                  Maximal Ukuran File 2 MB <br>
                                  File harus PDF
                                </span>
                                </label>
                                <div class="form-group">
                                  <input type="file" name="biodata_ketua" id="biodata_ketua" accept=".pdf,.doc,.docx,aplication/msword" onchange="return validate_biodataKetua();"  required>
                                  <br>
                                  <span id="biodataKetua_error" style="color:#dc3545 "></span>
                                </div>
                                Berkas Sebelumnya
                                
                                <div class="input-group-append">
                                  <input type="submit" class="btn btn-info" id="btn_biodataKetua" Value="Upload">
                                </div>
                            </div> <!-- /.form group -->
                          </form>
                        </div>
                        <div class='col-md-2'>
                            <label> <center>Nilai</center> </label>
                            <div class="card card-body">
                                100
                            </div>
                        </div>
                        <div class='col-md-4'>
                            <label>Komentar</label>
                            <div class="card card-body alert-danger">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, 
                            </div>
                        </div>
                      </div>

                      <!---BIODATA Pembimbing--->
                      <div class="row">
                        <div class="col-md-6">
                          <form role="form" method='post' action='upload_biodataPembimbing' enctype='multipart/form-data'>
                            {{ csrf_field() }}
                            <input type="hidden" name="nim" value="{{auth()->user()->username}}">
                            <input type="hidden" name="revisike" value="{{$revisi}}">
                            <div class="form-group">
                              <label for="exampleInputFile">Biodata Pembimbing
                                <span for="exampleInputFile" style="color:#dc3545;font-size:15px;">
                                  Dokumen harus sudah ditandatangani lalu discan seluruh halaman / dokumen
                                  <br>
                                  Maximal Ukuran File 2 MB <br>
                                  File harus PDF
                                </span>
                              </label>
                              <div class="form-group">
                                <input type="file" name="biodata_pembimbing" id="biodata_pembimbing" accept=".pdf,.doc,.docx,aplication/msword" onchange="return validate_biodata_pembimbing();"  required>
                                <br>
                                <span id="biodata_pembimbing_error" style="color:#dc3545 "></span>
                              </div>
                              Berkas Sebelumnya

                              <div class="input-group-append">
                                <input type="submit" class="btn btn-info" id="btn_biodata_pembimbing" Value="Upload">
                              </div>
                            </div> <!-- /.form group -->      
                          </form>
                        </div>
                        <div class='col-md-2'>
                            <label> <center>Nilai</center> </label>
                            <div class="card card-body">
                                100
                            </div>
                        </div>
                        <div class='col-md-4'>
                            <label>Komentar</label>
                            <div class="card card-body alert-danger">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, 
                            </div>
                        </div>
                      </div>

                      <!---Pernyataan--->
                      <div class="row">
                        <div class="col-md-6">
                          <form role="form" method='post' action='upload_pernyataan' enctype='multipart/form-data'>
                            {{ csrf_field() }}
                            <input type="hidden" name="nim" value="{{auth()->user()->username}}">
                            <input type="hidden" name="revisike" value="{{$revisi}}">
                            <div class="form-group">
                              <label for="exampleInputFile">Surat Pernyataan
                                <br>
                                <span for="exampleInputFile" style="color:#dc3545;font-size:15px;">
                                  Dokumen harus sudah ditandatangani lalu discan seluruh halaman / dokumen
                                  <br>
                                  Maximal Ukuran File 2 MB <br>
                                  File harus PDF
                                </span>
                              </label>
                              <div class="form-group">
                                <input type="file" name="surat_pernyataan" id="surat_pernyataan" accept=".pdf,.doc,.docx,aplication/msword" onchange="return validate_surat_pernyataan();"  required>
                                <br>
                                <span id="surat_pernyataan_error" style="color:#dc3545 "></span>
                              </div>
                              Berkas Sebelumnya
                              
                              <div class="input-group-append">
                                <input type="submit" class="btn btn-info" id="btn_surat_pernyataan" Value="Upload">
                              </div>
                            </div> <!-- /.form group -->      
                          </form>
                        </div>
                        <div class='col-md-2'>
                            <label> <center>Nilai</center> </label>
                            <div class="card card-body">
                                100
                            </div>
                        </div>
                        <div class='col-md-4'>
                            <label>Komentar</label>
                            <div class="card card-body alert-danger">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, 
                            </div>
                        </div>
                      </div>

                      <div class='row'>
                        <div class='col-md-12'>
                          <form action="simpan_finalisasi" method="post" id='finalisasiform_uploadFile'>
                            {{ csrf_field() }}
                            <input type="hidden" name="nim" value="{{auth()->user()->username}}">
                            <input type="hidden" name="revisike" value="{{$revisi}}">
                            <input type="hidden" name="nama_field" value="status_uploadFile">
                            <p>
                            Dengan menekan tombol dibawah ini, saya sudah yakin dengan data-data diatas dan siap untuk dinilai dan dikomentari
                            oleh reviewer.
                            <span style='color:red'> Setelah menekan tombol dibawah ini, data-data diatas sudah tidak bisa diubah kembali, jadi pastikan data tersebut
                            SUDAH DIISI DAN DISIMPAN (dengan menekan tombol simpan sebagai draft) TERLEBIH DAHULU !!!</span>
                            </p>
                            <span class='btn btn-lg btn-danger' >Sudah difinalisasi</span>
                            <button class='btn btn-lg btn-success col-md-12'> Finalisasi</button>
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
                      <form role="form" method='post' action='upload_gambaran_teknologi' enctype='multipart/form-data'>
                        {{ csrf_field() }}
                        <input type="hidden" name="nim" value="{{auth()->user()->username}}">
                        <input type="hidden" name="revisike" value="{{$revisi}}">

                        <!---Ilustrasi--->
                        <div class="form-group row">
                          <div class="col-md-6">
                              <label for="exampleInputFile">A.	Ilustrasi system (gambar)
                                <br>
                                <span for="exampleInputFile" style="color:#dc3545;font-size:15px;">Maximal Ukuran File 2 MB</span>
                              </label>
                              <input type="file" name="gambar_ilustrasi" id="gambar_ilustrasi" accept=".JPG,.JPEG,.PNG" >
                              <br>
                              <span id="pengesahan_error" style="color:#dc3545 "></span>
                              <br>
                              Berkas Sebelumnya
                          </div>
                          <div class='col-md-2'>
                              <label> <center>Nilai</center> </label>
                              <div class="card card-body">
                                  100
                              </div>
                          </div>
                          <div class='col-md-4'>
                              <label>Komentar</label>
                              <div class="card card-body alert-danger">
                                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, 
                              </div>
                          </div> 
                        </div>

                        <!---Penjelasan Ilustrasi--->
                        <div class="form-group row">
                          <div class="col-md-6">
                              <div class='form-group row'>
                                <label>B.	Penjelasan gambar ilustrasi tersebut diatas (narasi).</label>
                                <div class="accordion col-12">
                                    <div class="card">
                                      <div class="alert-dark" id="headingOne">
                                        <h2 class="mb-0">
                                          <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#penj_ilus" aria-expanded="true" >
                                              <b>Data Sebelumnya :</b>
                                          </button>
                                        </h2>
                                      </div>
                                      <div id="penj_ilus" class="collapse">
                                          <div class="card-body">
                                              Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven
                                          </div>
                                      </div>
                                    </div>
                                </div>
                                <textarea name="penjelasan_ilustrasi" class='form-control' id="penjelasan_ilustrasi" cols="30" rows="5"></textarea>
                              </div>
                          </div>
                          <div class='col-md-2'>
                              <label> <center>Nilai</center> </label>
                              <div class="card card-body">
                                  100
                              </div>
                          </div>
                          <div class='col-md-4'>
                              <label>Komentar</label>
                              <div class="card card-body alert-danger">
                                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, 
                              </div>
                          </div>
                        </div>

                        <!---Spek yang diharapkan--->
                        <div class="form-group row">
                          <div class="col-md-6">
                              <div class='form-group row'>
                                  <label>C.	Spesifikasi Teknis yang Diharapkan.</label>
                                  <div class="accordion col-12">
                                      <div class="card">
                                        <div class="alert-dark" id="headingOne">
                                          <h2 class="mb-0">
                                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#spek" aria-expanded="true" >
                                                <b>Data Sebelumnya :</b>
                                            </button>
                                          </h2>
                                        </div>
                                        <div id="spek" class="collapse">
                                            <div class="card-body">
                                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven
                                            </div>
                                        </div>
                                      </div>
                                  </div>
                                  <textarea name="spek_teknis" class='form-control' id="spek_teknis" cols="30" rows="5"></textarea>
                              </div>
                          </div>
                          <div class='col-md-2'>
                              <label> <center>Nilai</center> </label>
                              <div class="card card-body">
                                  100
                              </div>
                          </div>
                          <div class='col-md-4'>
                              <label>Komentar</label>
                              <div class="card card-body alert-danger">
                                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, 
                              </div>
                          </div>
                        </div>

                        <!---blok diagram keseluruhan--->
                        <div class="form-group row">
                          <div class="col-md-6">
                              <label for="exampleInputFile">D.	Blok Diagram Sistem Keseluruhan (gambar) (bila 1 topik dibagi menjadi 2 atau lebih subtopic).
                                <span for="exampleInputFile" style="color:#dc3545;font-size:15px;">Maximal Ukuran File 2 MB</span>
                              </label>
                              <input type="file" name="blok_diagram" id="blok_diagram" accept=".JPG,.JPEG,.PNG" >
                              <br>
                              <span id="pengesahan_error" style="color:#dc3545 "></span>
                              <br>
                              Berkas Sebelumnya
                          </div>
                          <div class='col-md-2'>
                              <label> <center>Nilai</center> </label>
                              <div class="card card-body">
                                  100
                              </div>
                          </div>
                          <div class='col-md-4'>
                              <label>Komentar</label>
                              <div class="card card-body alert-danger">
                                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, 
                              </div>
                          </div>
                          
                        </div>

                        <!---Penjelasan Blok Diagram Keseluruhan--->
                        <div class="form-group row">
                          <div class="col-md-6">
                              <div class='form-group row'>
                                <label>E.	Penjelasan blok diagram tersebut diatas (narasi) (bila 1 topik dibagi menjadi 2 atau lebih subtopic).</label>
                                <div class="accordion col-12">
                                    <div class="card">
                                      <div class="alert-dark" id="headingOne">
                                        <h2 class="mb-0">
                                          <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#penj_blok" aria-expanded="true" >
                                              <b>Data Sebelumnya :</b>
                                          </button>
                                        </h2>
                                      </div>
                                      <div id="penj_blok" class="collapse">
                                          <div class="card-body">
                                              Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven
                                          </div>
                                      </div>
                                    </div>
                                </div>
                                <textarea name="penjelasan_blok_diagram" class='form-control' id="penjelasan_ilustrasi" cols="30" rows="5"></textarea>
                              </div>
                          </div>
                          <div class='col-md-2'>
                              <label> <center>Nilai</center> </label>
                              <div class="card card-body">
                                  100
                              </div>
                          </div>
                          <div class='col-md-4'>
                              <label>Komentar</label>
                              <div class="card card-body alert-danger">
                                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, 
                              </div>
                          </div>
                        </div>

                        <!---blok diagram yang dibuat--->
                        <div class="form-group row">
                          <div class="col-md-6">
                            <label for="exampleInputFile">F.	Blok Diagram Sistem yang dibuat (gambar).
                              <span for="exampleInputFile" style="color:#dc3545;font-size:15px;">Maximal Ukuran File 2 MB</span>
                            </label>
                            <input type="file" name="blok_diagram2" id="blok_diagram2" accept=".JPG,.JPEG,.PNG" >
                            <br>
                            <span id="pengesahan_error" style="color:#dc3545 "></span>
                            <br>
                            Berkas Sebelumnya
                          </div>
                          <div class='col-md-2'>
                              <label> <center>Nilai</center> </label>
                              <div class="card card-body">
                                  100
                              </div>
                          </div>
                          <div class='col-md-4'>
                              <label>Komentar</label>
                              <div class="card card-body alert-danger">
                                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, 
                              </div>
                          </div>
                        </div>

                        <!---Penjelasan Blok Diagram 2--->
                        <div class="form-group row">
                          <div class="col-md-6">
                              <div class='form-group row'>
                                <label>G.	Penjelasan blok diagram tersebut diatas (narasi).</label>
                                <div class="accordion col-12">
                                    <div class="card">
                                      <div class="alert-dark" id="headingOne">
                                        <h2 class="mb-0">
                                          <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#penj_blok2" aria-expanded="true" >
                                              <b>Data Sebelumnya :</b>
                                          </button>
                                        </h2>
                                      </div>
                                      <div id="penj_blok2" class="collapse">
                                          <div class="card-body">
                                              Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven
                                          </div>
                                      </div>
                                    </div>
                                </div>
                                <textarea name="penjelasan_blok_diagram2" class='form-control' id="penjelasan_ilustrasi" cols="30" rows="5"></textarea>
                              </div>
                          </div>
                          <div class='col-md-2'>
                              <label> <center>Nilai</center> </label>
                              <div class="card card-body">
                                  100
                              </div>
                          </div>
                          <div class='col-md-4'>
                              <label>Komentar</label>
                              <div class="card card-body alert-danger">
                                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, 
                              </div>
                          </div>
                        </div>

                        <!---FLOWCHART--->
                        <div class="form-group row">
                          <div class="col-md-6">
                              <label for="exampleInputFile">H.	Flow Chart system keseluruhan dan bagian yang dibuat (gambar).
                                <span for="exampleInputFile" style="color:#dc3545;font-size:15px;">Maximal Ukuran File 2 MB</span>
                              </label>
                              <input type="file" name="flowchart" id="flowchart" accept=".JPG,.JPEG,.PNG" >
                              <br>
                              <span id="pengesahan_error" style="color:#dc3545 "></span>
                              <br>
                              Berkas Sebelumnya
                          </div>
                          <div class='col-md-2'>
                              <label> <center>Nilai</center> </label>
                              <div class="card card-body">
                                  100
                              </div>
                          </div>
                          <div class='col-md-4'>
                              <label>Komentar</label>
                              <div class="card card-body alert-danger">
                                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, 
                              </div>
                          </div>
                        </div>

                        <!---Penjelasan Flowchart--->
                        <div class="form-group row">
                          <div class="col-md-6">
                              <div class='form-group row'>
                                <label>I.	Penjelasan flowchart tersebut diatas (narasi).</label>
                                <div class="accordion col-12">
                                    <div class="card">
                                      <div class="alert-dark" id="headingOne">
                                        <h2 class="mb-0">
                                          <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#penj_flow" aria-expanded="true" >
                                              <b>Data Sebelumnya :</b>
                                          </button>
                                        </h2>
                                      </div>
                                      <div id="penj_flow" class="collapse">
                                          <div class="card-body">
                                              Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven
                                          </div>
                                      </div>
                                    </div>
                                </div>
                                <textarea name="penjelasan_flowchart" class='form-control' id="penjelasan_ilustrasi" cols="30" rows="5"></textarea>
                              </div>
                          </div>
                          <div class='col-md-2'>
                              <label> <center>Nilai</center> </label>
                              <div class="card card-body">
                                  100
                              </div>
                          </div>
                          <div class='col-md-4'>
                              <label>Komentar</label>
                              <div class="card card-body alert-danger">
                                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, 
                              </div>
                          </div>
                        </div>

                        <!---Komponen Utama yang digunakan--->
                        <div class="form-group row">
                          <div class="col-md-6">
                              <div class='form-group row'>
                                <label>J.	Komponen Utama yang Digunakan.</label>
                                <div class="accordion col-12">
                                    <div class="card">
                                      <div class="alert-dark" id="headingOne">
                                        <h2 class="mb-0">
                                          <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#komponen" aria-expanded="true" >
                                              <b>Data Sebelumnya :</b>
                                          </button>
                                        </h2>
                                      </div>
                                      <div id="komponen" class="collapse">
                                          <div class="card-body">
                                              Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven
                                          </div>
                                      </div>
                                    </div>
                                </div>
                                <textarea name="komponen_utama" class='form-control' id="penjelasan_ilustrasi" cols="30" rows="5"></textarea>
                              </div>
                          </div>
                          <div class='col-md-2'>
                              <label> <center>Nilai</center> </label>
                              <div class="card card-body">
                                  100
                              </div>
                          </div>
                          <div class='col-md-4'>
                              <label>Komentar</label>
                              <div class="card card-body alert-danger">
                                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, 
                              </div>
                          </div>
                        </div>
                        
                        <div class="form-group row">
                          <div class="col-md-6">
                              <div class='form-group row'>
                              <input type="submit" value="Simpan Sebagai Draft" class='btn btn-info'>
                              </div>
                          </div>
                        </div>
                      </form>
                      <div class='row'>
                          <div class='col-md-12'>
                            <form action="simpan_finalisasi" method="post" id='finalisasiform_gambaranTeknologi'>
                              {{ csrf_field() }}
                              <input type="hidden" name="nim" value="{{auth()->user()->username}}">
                              <input type="hidden" name="revisike" value="{{$revisi}}">
                              <input type="hidden" name="nama_field" value="status_gambaranTeknologi">
                              <p>
                              Dengan menekan tombol dibawah ini, saya sudah yakin dengan data-data diatas dan siap untuk dinilai dan dikomentari
                              oleh reviewer.
                              <span style='color:red'> Setelah menekan tombol dibawah ini, data-data diatas sudah tidak bisa diubah kembali, jadi pastikan data tersebut
                              SUDAH DIISI DAN DISIMPAN (dengan menekan tombol simpan sebagai draft) TERLEBIH DAHULU !!!</span>
                              </p>
                              <span class='btn btn-lg btn-danger' >Sudah difinalisasi</span>
                              <button class='btn btn-lg btn-success col-md-12'> Finalisasi</button>
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
          </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@stop

@push('scripts')
  <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
  <script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
  <script src="{{asset('js/ckeditor.js')}}"></script>
  

@endpush