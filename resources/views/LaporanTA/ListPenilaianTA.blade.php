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
                <h1>Penilaian Laporan Tugas Akhir</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">Laporan Tugas Akhir</li>
                    <li class="breadcrumb-item active">Daftar Mahasiswa</li>
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
                      <!-- /.card-header -->
                      <div class="card-body" style="display: block;">
                          <table class="table table-hover table-responsive" id='tableListMhsNilaiTA'>
                              <thead>
                                <th>No</th>
                                <th>Judul Tugas Akhir</th>
                                <th>Bidang</th>
                                <!---<th>Sebagai</th>--->
                                <th>Aksi</th>
                              </thead>
                              <tbody>
                                @php $i=1; @endphp
                                @foreach ($listmhs as $record)
                                    @php
                                    $judul_ta = \App\laporanTA::where('nim','=',$record->nim)->first();
                                    $bidang = \App\bidang::where('id','=',$judul_ta->bidang)->first();   
                                    @endphp
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$judul_ta->judul_ta or ''}}</td>
                                        <td>{{$bidang->nama or ''}}</td>
                                        <!--<td>
                                            @php
                                                if(auth()->user()->username == $record->pembimbing){
                                                    echo "Pembimbing";
                                                }elseif(auth()->user()->username == $record->ketua_penguji){
                                                    echo "Ketua Penguji";
                                                }elseif(auth()->user()->username == $record->penguji1){
                                                    echo "Penguji 1 ";
                                                }elseif(auth()->user()->username == $record->penguji2){
                                                    echo "Penguji 2 ";
                                                }else{
                                                    echo "error";
                                                }
                                            @endphp
                                        </td>-->
                                        <td><a href="{{url('/Laporan/Penilaian',[$judul_ta->nim])}}" class="btn btn-success">Mulai Menilai</a></td>
                                    </tr>
                                @php $i++; @endphp
                                @endforeach
                              </tbody>
                          </table>
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
  
 <script>
    $(function () {
        $("#tableListMhsNilaiTA").DataTable({

        });
    });
 </script>

@endpush