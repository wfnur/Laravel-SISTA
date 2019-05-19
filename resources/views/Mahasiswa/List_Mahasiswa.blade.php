@extends('Layout.master')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard v2</li>
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
            <div class="card-header d-flex p-0">
            <h3 class="card-title p-3">
                <i class="fa fa-pie-chart mr-1"></i>
                Data Mahasiwa
            </h3>
            </div><!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered table-striped" id="users-table">
                    <thead>
                        <tr>
                            <th>nourut</th>
                            <th>NIM</th>
                            <th>nama</th>
                            <th>angkatan</th>
                            <th>kelas</th>
                            <th>prodi</th>
                            <th>jk</th>
                            <th>alamat</th>
                            <th>ttl</th>
                            <th>email</th>
                            <th>telpon</th>
                        </tr>
                    </thead>
                </table>
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
$(function() {
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/Mahasiswa/json',
        columns: [
            { data: 'nourut', name: 'nourut' },
            { data: 'NIM', name: 'NIM' },
            { data: 'nama', name: 'nama' },
            { data: 'angkatan', name: 'angkatan' },
            { data: 'kelas', name: 'kelas' },
            { data: 'prodi', name: 'prodi' },
            { data: 'jk', name: 'jk' },
            { data: 'alamat', name: 'alamat' },
            { data: 'ttl', name: 'ttl' },
            { data: 'email', name: 'email' },
            { data: 'telpon', name: 'telpon' }
        ]
    });
});
</script>
@endpush