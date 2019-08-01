@extends('Layout.master')

@section('content')
@if (session('sukses'))
    <div class="col-8" style="margin:10px auto;">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('sukses')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>       
@endif
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="">
        <h1 class="m-0 text-dark">Minggu Bimbingan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6" style="margin-top:7px;">
        <ol class="breadcrumb float-sm-left">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Minggu Bimbingan</li>
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
        <section class="col-10 offset-1">
        <!-- Custom tabs (Charts with tabs)-->
        <div class="card">
            <div class="card-header">
            <h3 class="card-title p-3">
                <i class="fa fa-pie-chart mr-1"></i>
                Data Minggu Bimbingan
            </h3>
            </div><!-- /.card-header -->
            <div class="card-body" style="padding:30px">
                <div class="row">
                    <div class="col-10">
                        <h1>Data Minggu Bimbingan</h1>
                    </div>
                    
                    <div class="col-2">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal" style="margin-right:40px;">
                            Tambah
                        </button>
                    </div>              
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-hover table-responsive">
                            <thead align='center' >
                                <tr>
                                    <th>Nama </th>
                                    <th>Mulai</th>
                                    <th>Akhir</th>
                                    <th colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mingguBimbingan as $item)
                                <tr>
                                    <td>{{ $item->mingguke}}</td>
                                    <td>{{ Carbon\Carbon::parse($item->awal)->formatLocalized('%A, %d %B %Y %H:%M:%S')}}</td>
                                    <td>{{ Carbon\Carbon::parse($item->akhir)->formatLocalized('%A, %d %B %Y %H:%M:%S')}}</td>
                                    <td><a href="{{ route('Minggu-Bimbingan.edit',$item->id) }}" class="btn btn-warning">Edit</a></td>
                                    <td>
                                        <form action="{{ route('Minggu-Bimbingan.destroy', $item->id)}}" method="post">
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


<!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Form Tambah Minggu Bimbingan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('Minggu-Bimbingan.store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="mingguke" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Tangga Mulai</label>
                        <input type="text" name="awal"  class="tanggalawal form-control" required>
                    </div> 
                    <div class="form-group">
                        <label>Tangga Akhir</label>
                        <input type="text" name="akhir"  class="tanggalakhir form-control" required>
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
     
@endsection