@extends('Layout.master')

@section('title','Nilai Sidang Tugas Akhir')

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
                           <th>NIM</th> <th>Nama</th> <th>Kelas </th> <th>Judul Tugas Akhir</th> <th>Status Penilaian</th> 
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
                                            <table>
                                                <tr>
                                                    <td>
                                                        @if (isset($item->pembimbing))
                                                        <?php $nama_pembimbing = getNamaDosen($item->pembimbing); ?>
                                                            <a href={{url('/SidangTA/Penilaian/Panitia/'.$item->NIM.'/'.$item->pembimbing )}}> {{$nama_pembimbing}} </a>
                                                        @else
                                                            Pembimbing
                                                        @endif
                                                    </td>
                                                    <td>{!! cekNilaiLaporanDosen($item->NIM, $item->pembimbing) !!}</td>
                                                    <td>
                                                        <form onsubmit='unlock({{$item->NIM}}); return false;' id={{$item->NIM}}_1 action='' method='post'>
                                                            {{ csrf_field() }}
                                                            <input type="hidden" name="nim" value={{$item->NIM}}>
                                                            <input type="hidden" name="kode_dosen" value={{$item->pembimbing}}>
                                                            <div id="ok1">
                                                                {!! cekFinalisasiNilaiLaporanDosen($item->NIM, $item->pembimbing) !!}
                                                            </div>
                                                            <div id="ok2"></div>
                                                        </form>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        @if (isset($item->ketua_penguji))
                                                        <?php $nama_ketuaPenguji = getNamaDosen($item->ketua_penguji); ?>
                                                            <a href={{url('/SidangTA/Penilaian/Panitia/'.$item->NIM.'/'.$item->ketua_penguji )}}> {{$nama_ketuaPenguji}} </a>
                                                        @else
                                                            Ketua Penguji
                                                        @endif
                                                    </td>
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
                                                    <td>
                                                        @if (isset($item->penguji1))
                                                        <?php $nama_penguji1 = getNamaDosen($item->penguji1); ?>
                                                        <a href={{url('/SidangTA/Penilaian/Panitia/'.$item->NIM.'/'.$item->penguji1 )}}> {{$nama_penguji1}} </a>
                                                        @else
                                                            Penguji 1
                                                        @endif
                                                    </td>
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
                                                    <td>
                                                        @if (isset($item->penguji2))
                                                        <?php $nama_penguji2 = getNamaDosen($item->penguji2); ?>
                                                        <a href={{url('/SidangTA/Penilaian/Panitia/'.$item->NIM.'/'.$item->penguji2 )}}> {{$nama_penguji2}} </a>
                                                        @else
                                                            Penguji 2
                                                        @endif
                                                    </td>
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