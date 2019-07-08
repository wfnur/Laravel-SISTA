@extends('Layout.master')

@section('title','Paper')

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
                <h1>Upload Paper</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Upload Paper</li>
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
                      <div class="card-header">
                        <h3 class="card-title">
                          Upload Paper
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
                        <div class="row" style="margin-top:20px;">
                            <div class="col-md-12">
                                <table class="table table-hover table-responsive">
                                    <thead align='center' >
                                        <tr>
                                            <th>NIM </th>
                                            <th>Nama</th>
                                            <th>Judul</th>
                                            <th>Bukti Pembayaran</th>
                                            <th>Paper</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($paper as $item)
                                            <tr>
                                                <td>{{$item->mahasiswa->NIM}}</td>
                                                <td>{{$item->mahasiswa->nama}}</td>
                                                <td>{{$item->judul}}</td>
                                                <td><a href={{asset('storage/Bukti_Pembayaran/'.$item->bukti)}} class="btn btn-primary" target="_blank">Lihat Bukti</a></td>
                                                <td><a href={{asset('storage/Paper/'.$item->paper)}} class="btn btn-primary" target="_blank">Lihat Paper</a></td>
                                                <td>
                                                    <?php 
                                                        if($item->status == 1){
                                                            $status = "Sudah Diverifikasi";
                                                            $Bstatus = "Batalkan";
                                                        }else{
                                                            $status = "Belum Diverifikasi";
                                                            $Bstatus = "Verifikasi";
                                                        }
                                                    ?>
                                                    <div id={{$item->id}}> {{ $status }} </div>
                                                </td>
                                                <td>
                                                    <form onsubmit='save({{$item->id}}); return false;' id={{$item->id}}  action=''>
                                                        {{ csrf_field() }}
                                                        <input type='hidden' name='id' id='verifikasi' value={{$item->id}} />
                                                        <button class="btn btn-warning" id={{$item->id}}> {{$Bstatus}} </button>
                                                    </form>
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                
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
          </div>
    <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@stop

@push('scripts')
  
<script>
    function save(id){
        var kode_bimbingan = $("form[id="+id+"]").serialize();
        console.log(kode_bimbingan);
        $.ajax({
            type:"post",
            url:"{{url('/Paper/saveStatusPaper')}}",
            data: kode_bimbingan,
            cache:false,
            success: function (a){
                if(a=='Success'){
                    alert('Sukses Melakukan Verifikasi');
                    $('div#'+id).html('Diverifikasi');
                    $("input[id="+id+"]").val("1");
                    $("button[id="+id+"]").html('Batalkan');
                }else{
                    if(a=='Dibatalkan'){
                        alert('Sukses Melakukan Pebatalan Verifikasi');
                        $('div#'+id).html('Belum Diverifikasi');
                        $("input[id="+id+"]").val("0");
                        $("button[id="+id+"]").html('Verifikasi');
                    }else{
                        alert('Gagal Melakukan Verifikasi');
                    }
                }
            }
        });
        return false; 
    }
</script>

@endpush