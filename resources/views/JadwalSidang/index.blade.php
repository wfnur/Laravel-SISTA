@extends('Layout.master')

@section('title','Jadwal Sidang')

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
        <h1 class="m-0 text-dark">Jadwal Sidang</h1>
        </div><!-- /.col -->
        <div class="col-sm-6" style="margin-top:7px;">
        <ol class="breadcrumb float-sm-left">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Jadwal Sidang</li>
            <li class="breadcrumb-item active">Tambah</li>
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
                Jadwal Sidang
            </h3>
            </div><!-- /.card-header -->
            <div class="card-body" style="padding:30px">
                <div class="row">
                    <div class="col-10">
                        <h1>Jadwal Sidang</h1>
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
                        <table class="table table-hover table-responsive" id='jadwal_sidang'>
                            <thead align='center' >
                                <tr>
                                    <th>Tanggal </th>
                                    <th>NIM</th>
                                    <th>Nama </th>
                                    <th>Pembimbing</th>
                                    <th>Ketua Penguji</th>
                                    <th>Penguji 1</th>
                                    <th>Penguji 2</th>
                                    <th>Action</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jadwalSidang as $item)
                                <tr>
                                    <td>{{ Carbon\Carbon::parse($item->tanggal)->formatLocalized('%A, %d %B %Y %H:%M:%S')}}</td>
                                    <td>{{ $item->nim }}</td>
                                    <td>{{ $item->mahasiswa->nama }}</td>
                                    <td>{{ $item->pembimbingRelasi->nama }}</td>
                                    <td>{{ $item->ketua_pengujiRelasi->nama }}</td>
                                    <td>{{ $item->penguji1Relasi->nama }}</td>
                                    <td>{{ $item->penguji2Relasi->nama }}</td>
                                    <td><a href="{{ route('Jadwal-Sidang.edit',$item->id) }}" class="btn btn-warning">Edit</a></td>
                                    <td>
                                        <form action="{{ route('Jadwal-Sidang.destroy', $item->id)}}" method="post">
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
            <h5 class="modal-title" id="exampleModalLabel">Tambah Jadwal Sidang</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('Jadwal-Sidang.store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="text" name="tanggal"  class="tanggalsidang form-control" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>NIM</label>
                        <input type="text" name="nim" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Pembimbing</label>
                        <select name="pembimbing" class="form-control">
                            @foreach ($dosen as $record)
                                <option value="{{ $record->kode_dosen }}"> {{ $record->nama }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Ketua Penguji</label>
                        <select name="ketua_penguji" class="form-control">
                            @foreach ($dosen as $record)
                                <option value="{{ $record->kode_dosen }}"> {{ $record->nama }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Penguji 1</label>
                        <select name="penguji1" class="form-control">
                            @foreach ($dosen as $record)
                                <option value="{{ $record->kode_dosen }}"> {{ $record->nama }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Penguji 2</label>
                        <select name="penguji2" class="form-control">
                            @foreach ($dosen as $record)
                                <option value="{{ $record->kode_dosen }}"> {{ $record->nama }} </option>
                            @endforeach
                        </select>
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


@push('scripts')
    <script>
        $(function () {
            $("#jadwal_sidang").DataTable();
        });
        $('.tanggalsidang').datepicker({  
            format: 'yyyy-mm-dd 00:00:00'
          }); 
    </script>
@endpush
