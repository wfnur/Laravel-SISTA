@extends('Layout.master')

@section('title','Ubah Poin Penilaian')

@section('content')
    @if (session('sukses'))
    <div class="alert alert-success" role="alert">
        {{session('sukses')}}
    </div>        
    @endif
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="offset-2">
                <h1 class="m-0 text-dark">Edit Poin Penilaian</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left" style="margin-top:7px;">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" >Poin Penilaian</li>
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
            <section class="col-8 offset-2">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
                <div class="card-body">
                    <div class="col-12">
                        <form action="{{ route('Poin-Penilaian-Laporan.update', $PoinPenilaianLaporan->id) }}" method="POST">
                            
                            <input type="hidden" name="_method" value="PUT">                 
                            {{csrf_field()}}
                            <div class="form-group">
                                <label>Poin Penilaian</label>
                                <input type="text" name="poin_penilaian" class="form-control" value="{{$PoinPenilaianLaporan->poin_penilaian}}">
                            </div>
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea name="deskripsi" class="form-control" id="deskripsiPoinLaporan">{{$PoinPenilaianLaporan->deskripsi}}</textarea>
                            </div>

                            <div class="form-group">
                                <label>Bobot</label>
                                <input type="text" name="bobot" class="form-control" value="{{$PoinPenilaianLaporan->bobot}}">
                            </div>
                            <div class="form-group">
                                <label>Keterangan Nilai</label>
                                <Select class="form-control" name='ket'>
                                    <option value="Depan" @if($PoinPenilaianLaporan->ket == "Depan") Selected @endif >Halaman Depan</option>
                                    <option value="BAB 1" @if($PoinPenilaianLaporan->ket == "BAB 1") Selected @endif >BAB 1</option>
                                    <option value="BAB 2" @if($PoinPenilaianLaporan->ket == "BAB 2") Selected @endif >BAB 2</option>
                                    <option value="BAB 3" @if($PoinPenilaianLaporan->ket == "BAB 3") Selected @endif >BAB 3</option>
                                    <option value="BAB 4" @if($PoinPenilaianLaporan->ket == "BAB 4") Selected @endif >BAB 4</option>
                                    <option value="BAB 5" @if($PoinPenilaianLaporan->ket == "BAB 5") Selected @endif >BAB 5</option>
                                    <option value="Lampiran" @if($PoinPenilaianLaporan->ket == "Lampiran") Selected @endif >Lampiran</option>
                                </Select>
                            </div>

                            <div class="form-group">
                                <label> Jenis Judul TA</label>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="jenis[]" value="1" class="custom-control-input" id="Hardware" @if(in_array("1",$jenis)) checked @endif>
                                    <label class="custom-control-label" for="Hardware">Hardware</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="jenis[]" value="2" class="custom-control-input" id="Software" @if(in_array("2",$jenis)) checked @endif>
                                    <label class="custom-control-label" for="Software">Software</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="jenis[]" value="3" class="custom-control-input" id="SoftwareHardware" @if(in_array("3",$jenis)) checked @endif>
                                    <label class="custom-control-label" for="SoftwareHardware">Software+Hardware</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="jenis[]" value="4" class="custom-control-input" id="Antenna/Filter" @if(in_array("4",$jenis)) checked @endif>
                                    <label class="custom-control-label" for="Antenna/Filter">Antenna/Filter</label>
                                </div>
                            </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-warning" value="Simpan"> Update</button>
                                </div>
                        </form>
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
@endsection

@push('scripts')
    <script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
    <script src="{{asset('js/ckeditor.js')}}"></script>
@endpush