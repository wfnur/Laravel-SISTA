@extends('Layout.master')

@section('title','Edit Jadwal Sidang')

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
                <h1 class="m-0 text-dark">Jadwal Sidang</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left" style="margin-top:7px;">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item">Jadwal Sidang</li>
                <li class="breadcrumb-item active"> Edit {{$jadwalSidang->nim}}</li>
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
                        <form action="{{ route('Jadwal-Sidang.update', $jadwalSidang->id) }}" method="POST">
                            
                            <input type="hidden" name="_method" value="PUT">                 
                            {{csrf_field()}}
                            <div class="form-group">
                                <label>Tanggal</label>
                                <input type="text" name="tanggal"  class="tanggalsidang form-control" value="{{ $jadwalSidang->tanggal }}" required autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label>NIM</label>
                                <input type="text" name="nim" class="form-control" value={{ $jadwalSidang->nim }} required>
                            </div>
                            <div class="form-group">
                                <label>Pembimbing</label>
                                <select name="pembimbing" class="form-control">
                                    @foreach ($dosen as $record)
                                        <option value="{{ $record->kode_dosen }}" @if($jadwalSidang->pembimbing == $record->kode_dosen ) Selected @endif > {{ $record->nama }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Ketua Penguji</label>
                                <select name="ketua_penguji" class="form-control">
                                    @foreach ($dosen as $record)
                                        <option value="{{ $record->kode_dosen }}" @if($jadwalSidang->ketua_penguji == $record->kode_dosen ) Selected @endif > {{ $record->nama }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Penguji 1</label>
                                <select name="penguji1" class="form-control">
                                    @foreach ($dosen as $record)
                                        <option value="{{ $record->kode_dosen }}" @if($jadwalSidang->penguji1 == $record->kode_dosen ) Selected @endif> {{ $record->nama }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Penguji 2</label>
                                <select name="penguji2" class="form-control">
                                    @foreach ($dosen as $record)
                                        <option value="{{ $record->kode_dosen }}" @if($jadwalSidang->penguji2 == $record->kode_dosen ) Selected @endif> {{ $record->nama }} </option>
                                    @endforeach
                                </select>
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
    <script>
       
        $('.tanggalsidang').datepicker({  
            format: 'yyyy-mm-dd 00:00:00'
          }); 
    </script>
@endpush