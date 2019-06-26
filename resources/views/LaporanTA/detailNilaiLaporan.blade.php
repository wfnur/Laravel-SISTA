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
                <h1 class="m-0 text-dark">Nilai Laporan {{ $mahasiswa->nama }} ( {{ $mahasiswa->NIM }} )</h1>
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

            <!-- ./Data Proposal -->    
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info card-outline">
                    <!-- /.card-header -->
                    <div class="card-body" style="display: block;">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="{{ $mahasiswa->nama }}" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kelas</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="{{ $mahasiswa->angkatan }}/{{ $mahasiswa->kelas }}" disabled>
                                </div>
                            </div>
                        
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Judul Tugas Akhir</label>
                            <div class="col-sm-10">
                                <textarea cols="30" rows="4" class="form-control" disabled>{{ $mahasiswa->judul_ta }}</textarea>
                            </div>
                        </div>
                        
                    </div>
                    </div>
                    <!-- /.card -->          
                </div>
            <!-- /.col-->
            </div>
            <!-- ./row -->
        
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-12">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
                <div class="card-body">
                    <table class="table table-responsive table-striped" id="listMhs">
                        <thead class="thead-dark">
                           <th style="width:50px;">No</th> <th style="width:500px;">Poin Penilaian</th> <th>Nilai </th>
                        </thead>
                        <tbody>
                            @php $i=1; @endphp
                            @foreach ($poinPenilaianLaporan as $item)
                                
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$item->poin_penilaian}}</td>
                                    <td>
                                        <table>
                                            <tr>
                                                <td>{{getNamaDosen($jadwalSidang->ketua_penguji)}}</td>
                                                <td>{{getNilaiLaporan($nim,$jadwalSidang->ketua_penguji,$item->id)}}</td>
                                            </tr>
                                            <tr>
                                                <td>{{getNamaDosen($jadwalSidang->penguji1)}}</td>
                                                <td>{{getNilaiLaporan($nim,$jadwalSidang->penguji1,$item->id)}}</td>
                                            </tr>
                                            <tr>
                                                <td>{{getNamaDosen($jadwalSidang->penguji2)}}</td>
                                                <td>{{getNilaiLaporan($nim,$jadwalSidang->penguji2,$item->id)}}</td>
                                            </tr>
                                            
                                        </table>
                                    </td>
                                    
                                </tr>
                            @php $i++; @endphp
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