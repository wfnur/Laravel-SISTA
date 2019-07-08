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
                        <div class="row">                           
                            <div class="col-2 offset-1">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal" style="margin-right:40px;">
                                    Tambah Paper
                                </button>
                            </div>              
                        </div>
                        <div class="row" style="margin-top:20px;">
                            <div class="col-md-12">
                                <table class="table table-hover table-responsive">
                                    <thead align='center' >
                                        <tr>
                                            <th>Judul </th>
                                            <th>Bukti Pembayaran Paper</th>
                                            <th>Paper</th>
                                            <th colspan="2">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($paper as $item)
                                            <tr>
                                                <td>{{$item->judul}}</td>
                                                <td><a href={{asset('storage/Bukti_Pembayaran/'.$item->bukti)}} class="btn btn-primary" target="_blank">Lihat Bukti</a></td>
                                                <td><a href={{asset('storage/Paper/'.$item->paper)}} class="btn btn-primary" target="_blank">Lihat Paper</a></td>
                                                <td><a href="{{ route('Paper.edit',$item->id) }}" class="btn btn-warning">Edit</a></td>
                                                <td>
                                                    <form action="{{ route('Paper.destroy', $item->id)}}" method="post">
                                                            <input type="hidden" name="_method" value="DELETE">                 
                                                            {{csrf_field()}}
                                                        <button class="btn btn-danger" type="submit" onclick="return confirm('Yakin anda akan menghapus data ini ?')">Delete</button>
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
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload Paper</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('Paper.store') }}" method="POST" enctype='multipart/form-data'>
                {{ csrf_field() }}
                <input type="hidden" name="nim" value="{{auth()->user()->username}}">
                <div class="form-group">
                    <label>Judul</label>
                    <textarea name="judul" rows="5" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile"> Abstrak Laporan Tugas Akhir Final (PDF) </label>
                    <br>
                    <span> Bukti Pembayaran (PDF)</span>
                    <input type="file" name="bukti" accept=".pdf"  class="form-control">         
                </div> 
                <div class="form-group">
                    <label for="exampleInputFile"> Abstrak Laporan Tugas Akhir Final (PDF) </label>
                    <br>
                    <span> Paper (PDF)</span>
                    <input type="file" name="paper" accept=".pdf"  class="form-control">         
                </div>           
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" value="Simpan"> Save changes</button>
        </div>
            </form>
    </div>
    </div>
</div>
@stop

@push('scripts')
  
 

@endpush