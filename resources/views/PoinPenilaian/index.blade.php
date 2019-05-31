@extends('Layout.master')

@section('title','Poin Penilaian')

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
            <li class="breadcrumb-item active">Sub BAB</li>
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
                Data Bab
            </h3>
            </div><!-- /.card-header -->
            <div class="card-body" style="padding:30px">
                <div class="row">
                    <div class="col-10">
                        <h1>Data Sub BAB</h1>
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
                        <table class="table table-hover table-responsive" id="poin">
                            <thead >
                                <tr>
                                    <td>Poin Penilaian</td>
                                    <td>Bobot</td>
                                    <td>Kategori</td>
                                    <td>Keterangan</td>
                                    <td>Action</td>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($PoinPenilaian as $item)
                                <tr>
                                    <td>{{ $item->poin_penilaian }}</td>
                                    <td>{{ $item->bobot }}</td>
                                    <td>{{ $item->kategori }}</td>
                                    <td>{{ $item->ket }}</td>
                                    <td><a href="{{ route('Poin-Penilaian.edit',$item->id) }}" class="btn btn-warning">Edit</a></td>
                                    <td>
                                        <form action="{{ route('Poin-Penilaian.destroy', $item->id)}}" method="post">
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
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('Poin-Penilaian.store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Poin Penilaian</label>
                        <input type="text" name="poin_penilaian" class="form-control">
                    </div>
                    <div class="form-group">
                            <label>Bobot</label>
                            <input type="text" name="bobot" class="form-control">
                        </div>
                    <div class="form-group">
                        <label>Kategori Nilai</label>
                        <Select class="form-control" name='kategori'>
                            <option value="Nilai Pembimbing">Nilai Pembimbing</option>
                            <option value="Nilai Presentasi">Nilai Presentasi</option>
                            <option value="Nilai Demo Alat">Nilai Demo Alat</option>
                            <option value="Nilai Tanya Jawab"Tanya Jawab</option>
                        </Select>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <Select class="form-control" name='ket'>
                            <option value="Pembimbing">Pembimbing</option>
                            <option value="Penguji">Penguji</option>
                        </Select>
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
            $("#poin").DataTable();
        });
    </script>
@endpush