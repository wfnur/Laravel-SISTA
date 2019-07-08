@extends('Layout.master')

@section('title','Ubah Nilai PKM dan Publikasi Ilmilah')

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
                <li class="breadcrumb-item">PKM dan Publikasi</li>
                <li class="breadcrumb-item active">Ubah</li>
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
                    <form action="{{ route('Nilai-PKM-Publikasi.update',$mhs->NIM ) }}" method="POST">
                        <input type="hidden" name="_method" value="PUT">                 
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>NIM</label>
                            <input type="text" name="nim" class="form-control" value="{{$mhs->NIM}}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" value="{{$mhs->nama}}" readonly>
                        </div>

                        <h4>Nilai PKM</h4>

                        @foreach ($poin_pkm as $item)
                            <div class="custom-control custom-radio">
                                <input type="radio" id="{{$item->id}}" name="poin_pkm_id" class="custom-control-input" value="{{$item->id}}" 
                                @if (isset($nilai_pkmpublikasi))
                                    @if ($nilai_pkmpublikasi->poin_pkm_id == $item->id) checked @endif
                                @endif >
                                <label class="custom-control-label" for="{{$item->id}}">{{$item->nama_pkm}} {{$item->bobot}}</label>
                            </div>
                        @endforeach
                            <br>
                        <h4>Nilai Publikasi</h4>

                        @foreach ($poin_publikasi as $value)
                            <div class="custom-control custom-radio">
                                <input type="radio" id="publikasi_{{$value->id}}" name="poin_publikasi_id"  value="{{$value->id}}" class="custom-control-input" 
                                @if (isset($nilai_pkmpublikasi))
                                    @if ($nilai_pkmpublikasi->poin_publikasi_id == $value->id) checked @endif
                                @endif
                                >
                                <label class="custom-control-label" for="publikasi_{{$value->id}}">{{$value->nama_publikasi}} {{$value->bobot}}</label>
                            </div>
                        @endforeach

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-warning" value="Simpan"> Update</button>
                        </div>
                    </form>
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