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
                           <th>NIM</th> <th>Nama</th> <th>Kelas </th> <th>Judul Laporan</th> <th>Uploaded File</th> <th>Status Penilaian</th> 
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
                                        <td><a href={{url('/Laporan/Nilai',[$item->NIM])}} target='_blank'>{{$item->NIM}}</a></td>
                                        <td>{{$item->nama}}</td>
                                        <td>{{$fixkelas}}</td>
                                        <td>{{$item->judul_ta}}</td>
                                        <td>
                                            @if ($item->abstrak)
                                                <a href={{asset('storage/Berkas_LaporanTA/'.$item->abstrak)}} target="_blank" class="btn btn-success" style="margin-bottom:5px;">
                                                    <i class="fa fa-check-circle"></i>
                                                    Abstrak
                                                </a>
                                            @else
                                                <div class="btn btn-danger" style="margin-bottom:5px;">
                                                    <i class="fa fa-remove"></i>
                                                    Abstrak
                                                </div>
                                            @endif

                                            @if ($item->laporan)
                                                <a href={{asset('storage/Berkas_LaporanTA/'.$item->laporan)}} target="_blank" class="btn btn-success" style="margin-bottom:5px;">
                                                    <i class="fa fa-check-circle"></i>
                                                    Daftar Isi s.d Bab 5
                                                </a>
                                            @else
                                                <div class="btn btn-danger" style="margin-bottom:5px;">
                                                    <i class="fa fa-remove"></i>
                                                    Daftar Isi s.d Bab 5
                                                </div>
                                            @endif

                                            @if ($item->lampiran)
                                                <a href={{asset('storage/Berkas_LaporanTA/'.$item->lampiran)}} target="_blank" class="btn btn-success" style="margin-bottom:5px;">
                                                    <i class="fa fa-check-circle"></i>
                                                    Lampiran
                                                </a>
                                            @else
                                                <div class="btn btn-danger" style="margin-bottom:5px;">
                                                    <i class="fa fa-remove"></i>
                                                    Lampiran
                                                </div>
                                            @endif

                                            @if ($item->form_bimbingan)
                                                <a href={{asset('storage/Form_Bimbingan/'.$item->form_bimbingan)}} target="_blank" class="btn btn-success" style="margin-bottom:5px;">
                                                    <i class="fa fa-check-circle"></i>
                                                    Form Bimbingan
                                                </a>
                                            @else
                                                <div class="btn btn-danger" style="margin-bottom:5px;">
                                                    <i class="fa fa-remove"></i>
                                                    Form Bimbingan
                                                </div>
                                            @endif

                                            @if ($item->form_permohonan)
                                                <a href={{asset('storage/Form_Permohonan/'.$item->form_permohonan)}} class="btn btn-success" style="margin-bottom:5px;">
                                                    <i class="fa fa-check-circle"></i>
                                                    Form Permohonan Sidang
                                                </a>
                                            @else
                                                <div class="btn btn-danger" style="margin-bottom:5px;">
                                                    <i class="fa fa-remove"></i>
                                                    Form Permohonan Sidang
                                                </div>
                                            @endif
                                            
                                        </td>
                                        <td>
                                            <table>
                                                <tr>
                                                    <td><a href={{url('/Laporan/Penilaian/Panitia/'.$item->NIM.'/'.$item->ketua_penguji )}}> Ketua Penguji</td>
                                                    <td>{!! cekNilaiLaporanDosen($item->NIM, $item->ketua_penguji) !!}</td>
                                                    <td>
                                                        <form onsubmit='unlock({{$item->NIM}}); return false;' id={{$item->NIM}}_1 action='' method='post'>
                                                            {{ csrf_field() }}
                                                            <input type="hidden" name="nim" value={{$item->NIM}}>
                                                            <input type="hidden" name="kode_dosen" value={{$item->ketua_penguji}}>
                                                            <div id="ok1">
                                                                {!! cekFinalisasiNilaiLaporanDosen($item->NIM, $item->ketua_penguji) !!}
                                                            </div>
                                                            <div id="ok2"></div>
                                                        </form>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><a href={{url('/Laporan/Penilaian/Panitia/'.$item->NIM.'/'.$item->penguji1 )}}> Ketua Penguji</td>
                                                    <td>{!! cekNilaiLaporanDosen($item->NIM, $item->penguji1) !!}</td>
                                                    <td>
                                                        <form onsubmit='unlock2({{$item->NIM}}); return false;' id={{$item->NIM}}_2 action=''>
                                                            {{ csrf_field() }}
                                                            <input type="hidden" name="nim" value={{$item->NIM}}>
                                                            <input type="hidden" name="kode_dosen" value={{$item->penguji1}}>
                                                            <div id="ok12">
                                                                {!! cekFinalisasiNilaiLaporanDosen($item->NIM, $item->penguji1) !!}
                                                            </div>
                                                            <div id="ok22"></div>
                                                        </form>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><a href={{url('/Laporan/Penilaian/Panitia/'.$item->NIM.'/'.$item->penguji2 )}}> Penguji2</td>
                                                    <td>{!! cekNilaiLaporanDosen($item->NIM, $item->penguji2) !!}</td>
                                                    <td>
                                                        <form onsubmit='unlock3({{$item->NIM}}); return false;' id={{$item->NIM}}_3 action=''>
                                                            {{ csrf_field() }}
                                                            <input type="hidden" name="nim" value={{$item->NIM}}>
                                                            <input type="hidden" name="kode_dosen" value={{$item->penguji2}}>
                                                            <div id="ok13">
                                                                {!! cekFinalisasiNilaiLaporanDosen($item->NIM, $item->penguji2) !!}
                                                            </div>
                                                            <div id="ok23"></div>
                                                        </form>
                                                    </td>
                                                </tr>
                                            </table>
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
        $('#ok2').html('');
        $(function () {
            $("#listMhs").DataTable( {
                "order": [[ 0, "asc" ]]
            } );
        });           

    </script>  
    
    <script>
        function unlock(nim){
            var kode_bimbingan = $("form[id="+nim+"_1]").serialize();
            console.log(kode_bimbingan);
            $.ajax({
                type:"post",
                url:"{{url('/Unlock/Laporan')}}",
                data: kode_bimbingan,
                cache:false,
                success: function (a){
                    if(a=='saved'){
                        alert('Unlock Nilai Laporan Success');
                        $('#ok2').html("<i class='fa fa-unlock fa-2x text-success'></i>");
                        $('#ok1').html("");   
                    }
                }
            });
            return false; 
        }

        function unlock2(nim){
            var kode_bimbingan = $("form[id="+nim+"_2]").serialize();
            console.log(kode_bimbingan);
            $.ajax({
                type:"post",
                url:"{{url('/Unlock/Laporan')}}",
                data: kode_bimbingan,
                cache:false,
                success: function (a){
                    if(a=='saved'){
                        alert('Unlock Nilai Laporan Success');
                        $('#ok22').html("<i class='fa fa-unlock fa-2x text-success'></i>");
                        $('#ok12').html("");   
                    }
                }
            });
            return false; 
        }

        function unlock3(nim){
            var kode_bimbingan = $("form[id="+nim+"_3]").serialize();
            console.log(kode_bimbingan);
            $.ajax({
                type:"post",
                url:"{{url('/Unlock/Laporan')}}",
                data: kode_bimbingan,
                cache:false,
                success: function (a){
                    if(a=='saved'){
                        alert('Unlock Nilai Laporan Success');
                        $('#ok23').html("<i class='fa fa-unlock fa-2x text-success'></i>");
                        $('#ok13').html("");   
                    }
                }
            });
            return false; 
        }
    </script>
@endpush