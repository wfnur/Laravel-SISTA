@extends('Layout.master')

@section('title','Poin Penilaian Laporan')

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
            <li class="breadcrumb-item">Poin Penilaian Laporan</li>
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
                Data Poin Penilaian Laporan
            </h3>
            </div><!-- /.card-header -->
            <div class="card-body" style="padding:30px">
                <div class="row">
                    <div class="col-10">
                        <h1>Data Poin Penilaian</h1>
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
                        <table class="table table-striped table-responsive" id="poin">
                            <thead >
                                <tr>
                                    <td>Poin Penilaian</td>
                                    <td>Deskripsi</td>
                                    <td>Bobot</td>
                                    <td>Keterangan</td>
                                    <td style="max-width:15%">Jenis</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($PoinPenilaianLaporan as $item)
                                <tr>
                                    <td>{{ $item->poin_penilaian }}</td>
                                    <td>{!! $item->deskripsi !!}</td>
                                    <td>{{ $item->bobot }}</td>
                                    <td>{{ $item->ket }}</td>
                                    <td>
                                        @php
                                            $jenis = explode(",",$item->jenis);
                                            if(in_array("1",$jenis)){ echo "- Hardware<br>";}
                                            if(in_array("2",$jenis)){ echo "- Software<br>";}
                                            if(in_array("3",$jenis)){ echo "- Hardware + Software<br>";}
                                            if(in_array("4",$jenis)){ echo "- Antenna / Filter <br>";}
                                        @endphp
                                    </td>
                                    <td>
                                        <a href="{{ route('Poin-Penilaian-Laporan.edit',$item->id) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('Poin-Penilaian-Laporan.destroy', $item->id)}}" method="post">
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
                <form action="{{ route('Poin-Penilaian-Laporan.store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Poin Penilaian</label>
                        <input type="text" name="poin_penilaian" class="form-control">
                    </div>
                    <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" id="deskripsiPoinLaporan"></textarea>
                        </div>
                    <div class="form-group">
                            <label>Bobot</label>
                            <input type="text" name="bobot" class="form-control">
                        </div>
                    <div class="form-group">
                        <label>Keterangan Nilai</label>
                        <Select class="form-control" name='ket'>
                            <option value="Depan">Halaman Depan</option>
                            <option value="BAB 1">BAB 1</option>
                            <option value="BAB 2">BAB 2</option>
                            <option value="BAB 3">BAB 3</option>
                            <option value="BAB 4">BAB 4</option>
                            <option value="BAB 5">BAB 5</option>
                            <option value="Lampiran">Lampiran</option>
                        </Select>
                    </div>
                    <div class="form-group">
                        <label> Jenis Judul TA</label>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="jenis[]" value="1" class="custom-control-input" id="Hardware">
                            <label class="custom-control-label" for="Hardware">Hardware</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="jenis[]" value="2" class="custom-control-input" id="Software">
                            <label class="custom-control-label" for="Software">Software</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="jenis[]" value="3" class="custom-control-input" id="SoftwareHardware">
                            <label class="custom-control-label" for="SoftwareHardware">Software+Hardware</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="jenis[]" value="4" class="custom-control-input" id="Antenna/Filter">
                            <label class="custom-control-label" for="Antenna/Filter">Antenna/Filter</label>
                        </div>
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
            $("#poin").DataTable( {
                "order": [[ 3, "desc" ]]
            } );
        });
    </script>
    <script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
    <script src="{{asset('js/ckeditor.js')}}"></script>
@endpush