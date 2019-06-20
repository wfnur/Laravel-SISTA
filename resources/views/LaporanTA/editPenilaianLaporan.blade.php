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
                                <label class="col-sm-2 col-form-label">Judul Tugas Akhir</label>
                                <div class="col-sm-10">
                                   <textarea cols="30" rows="4" class="form-control" disabled>{{ $laporanTA->judul_ta }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Lihat Berkas</label>
                                    <div class="col-sm-10">
                                        <a href={{asset('storage/Berkas_LaporanTA/'.$laporanTA->abstrak)}} class="btn btn-primary" target="_blank"> Lihat Abstrak Laporan</a>
                                        <a href={{asset('storage/Berkas_LaporanTA/'.$laporanTA->laporan)}} class="btn btn-primary" target="_blank"> Lihat Isi Laporan</a>
                                        <a href={{asset('storage/Berkas_LaporanTA/'.$laporanTA->lampiran)}} class="btn btn-primary" target="_blank"> Lihat Lampiran Laporan</a>
                                    </div>
                                </div>
                            <!---
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Status Dosen</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="{{$statusDosen}}" disabled >
                                </div>
                            </div>
                            --->
                        <table class="table table-responsive table-bordered table-striped" style="width:100%;">
                            <thead class="thead-dark" style="text-align:center">
                                <th style="width:5%">No. </th> <th style="min-width:45%">Poin Penilaian</th> <th style="width:50%">Nilai</th>
                            </thead>
                            <tbody>
                                @php $i=1; @endphp
                                @foreach ($poinPenilaianLaporan as $item)
                                    @php
                                        $jenis = explode(",",$item->jenis);

                                        $nilaiLaporan = \App\nilaiLaporan::where('poin_penilaian_id','=',$item->id)
                                        ->where(function ($query) use($nim) {
                                            $query->where('kode_dosen','=',Auth::user()->username)
                                            ->where('nim','=',$nim);
                                        })
                                        ->first();
                                        if (isset($nilaiLaporan->nilai)) {
                                            $nilai = strval($nilaiLaporan->nilai); 
                                        }else{
                                            $nilai = "";
                                        }                                  
                                    @endphp
                                    @if (in_array($laporanTA->jenis_judulta,$jenis))
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td>{{$item->poin_penilaian}}</td>
                                            <td>
                                                
                                                <form onsubmit='saveNilai({{$item->id}}); return false;' id={{$item->id}} class="Myform">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="nim" id="nim" value="{{$laporanTA->nim}}">
                                                    <input type="hidden" name="kode_dosen" id="kode_dosen" value="{{auth()->user()->username}}">
                                                    <input type="hidden" name="poin_penilaian_id" id="poin_penilaian_id" value="{{$item->id}}">
                                                    <div class="btn-group btn-group-toggle" data-toggle="buttons" id="radioBtnDiv">
                                                        
                                                            <div class="btn-group btn-group-toggle" data-toggle="buttons" id="radioBtnDiv">
                                                                <label class="btn btn-outline-primary btn-lg @if($nilai=='1' and $nilai!='' ) focus active @endif">
                                                                    <input type="radio" name="nilaiLaporan" autocomplete="off" value="1">1
                                                                </label>
                                                                <label class="btn btn-outline-primary btn-lg @if($nilai=='2' and $nilai!='') focus active @endif">
                                                                    <input type="radio" name="nilaiLaporan" autocomplete="off" value="2">2
                                                                </label>
                                                                <label class="btn btn-outline-primary btn-lg @if($nilai=='3' and $nilai!='') focus active @endif">
                                                                    <input type="radio" name="nilaiLaporan" autocomplete="off" value="3">3
                                                                </label>
                                                                <label class="btn btn-outline-primary btn-lg @if($nilai=='4' and $nilai!='') focus active @endif">
                                                                    <input type="radio" name="nilaiLaporan" autocomplete="off" value="4">4
                                                                </label>
                                                                <label class="btn btn-outline-primary btn-lg @if($nilai=='5' and $nilai!='') focus active @endif">
                                                                    <input type="radio" name="nilaiLaporan" autocomplete="off" value="5">5
                                                                </label>
                                                                <label class="btn btn-outline-primary btn-lg @if($nilai=='6' and $nilai!='') focus active @endif">
                                                                    <input type="radio" name="nilaiLaporan" autocomplete="off" value="6" >6
                                                                </label>
                                                                <label class="btn btn-outline-primary btn-lg @if($nilai=='7' and $nilai!='') focus active @endif">
                                                                    <input type="radio" name="nilaiLaporan" autocomplete="off" value="7" >7
                                                                </label>
                                                                <label class="btn btn-outline-primary btn-lg @if($nilai=='8' and $nilai!='') focus active @endif">
                                                                    <input type="radio" name="nilaiLaporan" autocomplete="off" value="8">8
                                                                </label>
                                                                <label class="btn btn-outline-primary btn-lg @if($nilai=='9' and $nilai!='') focus active @endif">
                                                                    <input type="radio" name="nilaiLaporan" autocomplete="off" value="9">9
                                                                </label>
                                                                <label class="btn btn-outline-primary btn-lg @if($nilai=='10' and $nilai!='') focus active @endif">
                                                                    <input type="radio" name="nilaiLaporan" autocomplete="off" value="10" >10
                                                                </label>                                                
                                                            </div>
                                                                                                      
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                    @endif
                                    
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
    <div id="alert_popover">
            <div class="wrapper2">
                <div class="content2">
                    
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

@stop

@push('scripts')    
<script>
    $(function(){
        $('input:radio').change(function(id){
            $(".Myform").submit();  
        });          
    
    });
   /*$(function(){
        $('input:radio').change(function(id){
            var nilai = $(this).val();
            var nim = document.getElementById('nim').value;
            var kode_dosen = document.getElementById('kode_dosen').value;
            var poin = document.getElementById('poin_penilaian_id').value;
            var nilai_form = document.getElementById('poin_penilaian_id').serialize();
            console.log(id);   
        });          
    
    });
    */
    function saveNilai(id){
        var kode_bimbingan = $("form[id="+id+"]").serialize();
        console.log(kode_bimbingan);
        $.ajax({
            type:"post",
            url:"{{url('/Laporan/Penilaian/simpan')}}",
            data: kode_bimbingan,
            cache:false,
            success: function (a){
                if(a=='Saved'){
                    alert('Nilai Berhasil Disimpan')
                    //$('.content2').html(a);
                    
                }
            }
        });
        
        return false; 
    }
    
</script>
@endpush