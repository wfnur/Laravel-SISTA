<?php 
use Illuminate\Support\Facades\DB;
?>
@extends('Layout.master')

@section('title','Nilai PKM dan Publikasi Ilmilah')

@section('navbar')
<!-- Navbar -->
<nav class="main-header navbar navbar-expand bg-primary navbar-dark ">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
        <a href="{{url('/Dosen/Beranda')}}" class="nav-link">Beranda</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
        <a href="{{url('/Dosen/Profile')}}" class="nav-link">Profile</a>
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
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2" style="padding-left:20px">
            <div class="">
                <h1 class="m-0 text-dark">Daftar Mahasiswa Nilai PKM dan Publikasi</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left" style="margin-top:7px;">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item">Nilai</li>
                <li class="breadcrumb-item active">PKM dan Publikasi</li>
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
                <div class="card-body">
                    <table class="table table-responsive table-striped" id="listMhs_nilaiPKmpublikasi">
                        <thead class="thead-dark">
                           <th>NIM</th> <th>Nama</th> <th>Kelas </th> <th>Nilai PKM</th> <th>Nilai Publikasi Ilmiah</th> <th>Action</th> <th> Action </th> 
                        </thead>
                        <tbody>
                            
                            @foreach ($mahasiswa as $item)
                                @php
                                    //$nilai_pkmPublikasi = \App\nilaiPKMPublikasi::where('nim','=',$item->NIM)->first();
                                    $nilai_pkm = DB::table('nilai_pkmpublikasi')
                                        ->Join('poin_pkm', 'nilai_pkmpublikasi.poin_pkm_id', '=', 'poin_pkm.id')
                                        ->Where('nilai_pkmpublikasi.nim', '=',$item->NIM)
                                        ->first();
                                    $nilai_publikasi = DB::table('nilai_pkmpublikasi')
                                        ->Join('poin_publikasi', 'nilai_pkmpublikasi.poin_publikasi_id', '=', 'poin_publikasi.id')
                                        ->Where('nilai_pkmpublikasi.nim', '=',$item->NIM)
                                        ->first();
                                    //dd($nilai_pkmpublikasi);
                                @endphp
                                <tr>
                                    <td>{{$item->NIM}}</td>
                                    <td>{{$item->nama}}</td>
                                    <td>{{$item->kelas}}/{{$item->angkatan}}</td>
                                    <td><b>{{ $nilai_pkm->bobot or '' }}</b>  ({{ $nilai_pkm->nama_pkm or 'kosong' }})</td>
                                    <td><b>{{ $nilai_publikasi->bobot or '' }}</b> ( {{ $nilai_publikasi->nama_publikasi or 'kosong' }} )</td>
                                    <td><a href="{{ route('Nilai-PKM-Publikasi.edit',$item->NIM) }}" class="btn btn-warning">Edit</a></td>
                                    <td>
                                        <form action="{{ route('Nilai-PKM-Publikasi.destroy', $item->id)}}" method="post">
                                            <input type="hidden" name="_method" value="DELETE">                 
                                            {{csrf_field()}}
                                        <button class="btn btn-danger" type="submit" onclick="return confirm('Yakin anda akan menghapus data ini ?')">Delete</button>
                                    </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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

@push('scripts')    
    <script>
        $(function () {
            $("#listMhs_nilaiPKmpublikasi").DataTable( {
                "order": [[ 0, "asc" ]]
            } );
        });           

    </script>  
@endpush