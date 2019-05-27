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
        <h1 class="m-0 text-dark">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6" style="margin-top:7px;">
        <ol class="breadcrumb float-sm-left">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dosen</li>
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
            <div class="card-header">
            <h3 class="card-title p-3">
                <i class="fa fa-pie-chart mr-1"></i>
                Data Dosen
            </h3>
            </div><!-- /.card-header -->
            <div class="card-body" style="padding:30px">
                
                <div class="row">
                    <div class="col-4">
                        <h1>Data Dosen</h1>
                    </div>
                    <div class="col-4">
                        <form class="form-inline float-right" method="GET" action="/Dosen/Create" >
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="cari">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </div>
                    <div class="col-4">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="margin-right:40px;">
                            Tambah
                        </button>
                        <a href={{url('/Dosen/CreateUser')}} class="btn btn-warning float-right">Tambah User</a>
                    </div>              
                    
            
                    <div class="col-md-12">
                        <table class="table table-hover table-bordered table-responsive">
                            <thead align='center' >
                                <tr>
                                    <th>Kode Dosen</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Telpon</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Alamat</th>
                                    <th colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_dosen as $item)
                                <tr>
                                    <td>{{ $item->kode_dosen }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->alamat }}</td>
                                    <td>{{ $item->telpon }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td><a href="/Dosen/{{ $item->kode_dosen }}/edit" class="btn btn-warning">Edit</a></td>
                                    <td><a href="/Dosen/{{ $item->kode_dosen }}/delete" class="btn btn-danger" onclick="return confirm('Yakin anda akan menghapus data ini ?')">Hapus</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$data_dosen->links('vendor.pagination.bootstrap-4', ['foo' => $data_dosen])}}
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
        <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="/Dosen/Store" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Kode Dosen</label>
                        <input type="text" name="kode_dosen"  class="form-control" required>  
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama"  class="form-control" required>  
                    </div>
                    <div class="form-group">
                        <label>Tempat, Tanggal Lahir (ch : Bandung 8 September 1998)</label>
                        <input type="text" name="ttl" class="form-control">  
                    </div>
                    <div class="form-group">
                        <label>Jenis kelamin</label>
                    </div>
                    <div class='form-check form-check-inline' style='margin-top:-60px;'>
                        <input type="radio" name="jk" value="L" class="form-check-input" >
                        <label class="form-check-label">Laki - Laki</label>
                        <input type="radio" name="jk" value="P" class="form-check-input"  >
                        <label class="form-check-label">Perempuan</label>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" rows='5' name='alamat'></textarea>
                    </div>
                    <div class="form-group">
                        <label>Telpon</label>
                        <input type="text" name="telpon"  class="form-control">  
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control">  
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