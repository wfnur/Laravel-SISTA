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
        <a href="{{url('/Dosen/Beranda')}}" class="nav-link">Beranda</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
        <a href="{{url('/Dosen/Profile')}}" class="nav-link">Ubah Profile</a>
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
                <h1>Penilaian Sidang Tugas Akhir <br> {{$laporanTA->mahasiswa->nama}} ( {{$laporanTA->mahasiswa->NIM}} )</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">Sidang Tugas Akhir</li>
                    <li class="breadcrumb-item active">Penilaian</li>
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
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">NIM / Nama</label>
                                <div class="col-sm-10">
                                    <input type="text"  class="form-control" value="{{$laporanTA->mahasiswa->NIM}} / {{$laporanTA->mahasiswa->nama}}" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Judul Tugas Akhir</label>
                                <div class="col-sm-10">
                                   <textarea cols="30" rows="4" class="form-control" disabled>{{ $laporanTA->judul_ta }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Lihat Berkas</label>
                                <div class="col-sm-10">
                                    <a href={{url('/Laporan/Download',[$laporanTA->abstrak] )}} class="btn btn-primary" target="_blank"> Lihat Abstrak Laporan</a>
                                    <a href={{url('/Laporan/Download',[$laporanTA->laporan] )}} class="btn btn-primary" target="_blank"> Lihat Isi Laporan</a>
                                    <a href={{url('/Laporan/Download',[$laporanTA->lampiran] )}} class="btn btn-primary" target="_blank"> Lihat Lampiran Laporan</a>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Status Dosen</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="{{$statusDosen}}" disabled >
                                </div>
                            </div>
                        
                      </div>
                    </div>
                    <!-- /.card -->          
                </div>
              <!-- /.col-->
              </div>
              <!-- ./row -->

              <div class="row">
                <div class="col-12">
                  <!-- Custom Tabs -->
                  <div class="card">
                    <div class="card-header d-flex p-0">
                      <ul class="nav nav-pills p-2">
                        <li class="nav-item"><a class="nav-link active" href="#pembimbing" data-toggle="tab">Halaman Pembimbing</a></li>
                        <li class="nav-item"><a class="nav-link" href="#finalisasi" data-toggle="tab">Finalisasi Nilai Sidang TA</a></li>
                      </ul>
                    </div><!-- /.card-header -->
                    
                    <div class="card-body">
                      <div class="tab-content">

                        <div class="tab-pane active" id="pembimbing">
                            <table class="table table-responsive table-bordered table-striped" style="width:100%;">
                                <thead class="thead-dark" style="text-align:center">
                                    <th style="width:5%">No. </th> <th style="min-width:45%">Poin Penilaian</th> <th style="width:50%">Nilai</th>
                                </thead>
                                <tbody>
                                    @php $i=1; @endphp
                                    @foreach ($poinPenilaianSTA_Pembimbing as $item)
                                        @php

                                            $nilaiSidang = \App\nilaiSidangTA::where('poin_penilaian_id','=',$item->id)
                                            ->where(function ($query) use($nim) {
                                                $query->where('kode_dosen','=',Auth::user()->username)
                                                ->where('nim','=',$nim);
                                            })
                                            ->first();

                                            if (isset($nilaiSidang->nilai)) {
                                                $nilai = strval($nilaiSidang->nilai); 
                                            }else{
                                                $nilai = "";
                                            }                                  
                                        @endphp
                                        
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td>{{$item->poin_penilaian}}</td>
                                                <td>  
                                                    <form onsubmit='saveNilaiSidang({{$item->id}}); return false;' id={{$item->id}} class="Myform">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="nim" id="nim" value="{{$laporanTA->nim}}">
                                                        <input type="hidden" name="kode_dosen" id="kode_dosen" value="{{auth()->user()->username}}">
                                                        <input type="hidden" name="poin_penilaian_id" id="poin_penilaian_id" value="{{$item->id}}">
                                                        <div class="btn-group btn-group-toggle" data-toggle="buttons" id="radioBtnDiv">
                                                            
                                                            <div class="btn-group btn-group-toggle" data-toggle="buttons" id="radioBtnDiv">
                                                                <label class="btn btn-outline-primary btn-lg @if($nilai=='1' and $nilai!='' ) focus active @endif">
                                                                    <input type="radio" name="nilaiLaporan" autocomplete="off" value="1" onchange="submitForm({{$item->id}})">1
                                                                </label>
                                                                <label class="btn btn-outline-primary btn-lg @if($nilai=='2' and $nilai!='') focus active @endif">
                                                                    <input type="radio" name="nilaiLaporan" autocomplete="off" value="2" onchange="submitForm({{$item->id}})">2
                                                                </label>
                                                                <label class="btn btn-outline-primary btn-lg @if($nilai=='3' and $nilai!='') focus active @endif">
                                                                    <input type="radio" name="nilaiLaporan" autocomplete="off" value="3" onchange="submitForm({{$item->id}})">3
                                                                </label>
                                                                <label class="btn btn-outline-primary btn-lg @if($nilai=='4' and $nilai!='') focus active @endif">
                                                                    <input type="radio" name="nilaiLaporan" autocomplete="off" value="4" onchange="submitForm({{$item->id}})">4
                                                                </label>
                                                                <label class="btn btn-outline-primary btn-lg @if($nilai=='5' and $nilai!='') focus active @endif">
                                                                    <input type="radio" name="nilaiLaporan" autocomplete="off" value="5" onchange="submitForm({{$item->id}})">5
                                                                </label>
                                                                <label class="btn btn-outline-primary btn-lg @if($nilai=='6' and $nilai!='') focus active @endif">
                                                                    <input type="radio" name="nilaiLaporan" autocomplete="off" value="6" onchange="submitForm({{$item->id}})">6
                                                                </label>
                                                                <label class="btn btn-outline-primary btn-lg @if($nilai=='7' and $nilai!='') focus active @endif">
                                                                    <input type="radio" name="nilaiLaporan" autocomplete="off" value="7" onchange="submitForm({{$item->id}})">7
                                                                </label>
                                                                <label class="btn btn-outline-primary btn-lg @if($nilai=='8' and $nilai!='') focus active @endif">
                                                                    <input type="radio" name="nilaiLaporan" autocomplete="off" value="8" onchange="submitForm({{$item->id}})">8
                                                                </label>
                                                                <label class="btn btn-outline-primary btn-lg @if($nilai=='9' and $nilai!='') focus active @endif">
                                                                    <input type="radio" name="nilaiLaporan" autocomplete="off" value="9" onchange="submitForm({{$item->id}})">9
                                                                </label>
                                                                <label class="btn btn-outline-primary btn-lg @if($nilai=='10' and $nilai!='') focus active @endif">
                                                                    <input type="radio" name="nilaiLaporan" autocomplete="off" value="10" onchange="submitForm({{$item->id}})">10
                                                                </label>                                                
                                                            </div>
                                                            
                                                                                                        
                                                        </div>
                                                    </form>
                                                </td>
                                            </tr>
                                        
                                    @php $i++; @endphp
                                    @endforeach                                
                                </tbody>
                            </table>                            
                        </div>
                        <!-- /.tab-pane --> 

                        <div class="tab-pane" id="finalisasi">
                            <form action="{{url('/SidangTA/finalisasi')}}" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="nim" value="{{$nim}}">
                                <input type="hidden" name="kode_dosen" value="{{Auth::user()->username}}">
                                <input type="hidden" name="status_dosen" value="Pembimbing">
                                <div style="color:red">
                                    <center>
                                        <h3> !!! REVISI HARUS DISIMPAN TERLEBIH DAHULU SEBELUM MEMFINALISASI NILAI DAN REVISI !!!</h3>
                                        <h3> !!! SETELAH MENGKLIK TOMBOL FINALISASI, NILAI TIDAK BISA DIUBAH !!!</h3>
                                    </center>
                                </div>
                                <input type="submit" value="Finalisasi Penilaian" class="btn btn-warning btn-lg col-md-12" onclick="alert('Apakah Anda Yakin ingin Memfinalisasi Penilaian ?')">
                            </form>
                        </div>
                        <!-- /.tab-pane -->

                      </div>
                      <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                  </div>
                  <!-- ./card -->
                </div>
                <!-- /.col -->
              </div>

              <!-- ./Data Proposal -->    
              <div class="row">
                <div class="col-md-12">
                    <div class="card card-info card-outline">
                        <div class="card-header">
                            <h3>Revisi Laporan</h3>
                        </div>
                      <!-- /.card-header -->
                      <div class="card-body" style="display: block;">
                            <form action="{{url('/Laporan/Revisi/simpan')}}" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="nim" value="{{$nim}}">
                                <input type="hidden" name="kode_dosen" value="{{auth()->user()->username}}">
                                <div class="form-group">
                                    <textarea name="revisi" id="revisiLaporan" cols="30" rows="10">{{$revisiLaporan->revisi or ''}}</textarea>
                                </div>
                                <input type="submit" value="Simpan Revisi" class="btn btn-primary btn-lg">
                            </form>
                            <br>
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

<div class="wait">
    <div class="spinner-border text-danger" role="status" style="width: 3rem; height: 3rem;" id="bola">
        <span class="sr-only">Loading...</span>
    </div>
</div> 

<div class='btn btn-success col-md-2 notif-fixed' style="padding:10px 20px;">
    <b>Nilai Berhasil Disimpan</b>
</div>

@stop

@push('scripts')    
<script>

    function submitForm(id){
        $("form#"+id).submit(); 
        console.log(id); 
    }
    function saveNilaiSidang(id){
        
        var kode_bimbingan = $("form[id="+id+"]").serialize();
        console.log(kode_bimbingan);
        $.ajax({
            type:"post",
            url:"{{url('/Laporan/Penilaian/SidangTA/simpan')}}",
            data: kode_bimbingan,
            cache:false,
            beforeSend: function(){
                $('.wait').show();
            },
            complete: function(){
                $('.wait').hide();
            },
            success: function (a){
                if(a == 'Saved'){
                    $(".notif-fixed").show();
                    $('.notif-fixed').delay(2000).fadeOut(400)
                }
            }
        });
        
        return false; 
    }
    $(document).ready(function(){
        $(".wait").hide();
        $(".notif-fixed").hide();        
    });
    
</script>
    <script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
    <script src="{{asset('js/ckeditor.js')}}"></script>
@endpush