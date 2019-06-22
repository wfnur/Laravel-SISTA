@extends('Layout.master')

@section('title','Bimbingan')

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
                <h1 class="m-0 text-dark">Daftar Mahasiswa Nilai Laporan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left" style="margin-top:7px;">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item">Nilai</li>
                <li class="breadcrumb-item active">Laporan</li>
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
                    <table class="table table-responsive table-striped" id="listMhs">
                        <thead class="thead-dark">
                           <th>NIM</th> <th>Nama</th> <th>Kelas </th> <th>Judul Laporan</th> <th>Uploaded File</th>
                        </thead>
                        <tbody>
                            
                            @foreach ($mahasiswa as $item)
                                @php
                                    $kelas = date('Y') - $item->angkatan;
                                    $fixkelas =$kelas.$item->kelas;
                                    $bidang = \App\bidang::where('id','=',$item->bidang)->first();
                                @endphp
                                @if ($fixkelas == '3A' OR $fixkelas == '3B' OR $fixkelas == '4NK')
                                    
                                    <tr>
                                        <td>{{$item->NIM}}</td>
                                        <td>{{$item->nama}}</td>
                                        <td>{{$fixkelas}}</td>
                                        <td>{{$item->judul_ta}}</td>
                                        <!---<td>{{$bidang->nama or ''}}</td>--->
                                        <td>
                                            
                                        </td>
                                    </tr>
                                @endif
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
            $("#listMhs").DataTable( {
                "order": [[ 0, "asc" ]]
            } );
        });
    </script>   
@endpush