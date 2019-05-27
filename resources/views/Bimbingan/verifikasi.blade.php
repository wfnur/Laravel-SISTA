@extends('Layout.master')

@section('title','Bimbingan')

@section('navbar')
<!-- Navbar -->
<nav class="main-header navbar navbar-expand bg-primary navbar-dark ">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
        <a href="/Dosen/Beranda" class="nav-link">Beranda</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
        <a href="/Dosen/Profile" class="nav-link">Profile</a>
    </li>
  </ul>

 

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Messages Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="fa fa-comments-o"></i>
        <span class="badge badge-danger navbar-badge">3</span>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <a href="#" class="dropdown-item">
          <!-- Message Start -->
          <div class="media">
            <img src="{{asset('adminlte/dist/img/user1-128x128.jpg')}}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
            <div class="media-body">
              <h3 class="dropdown-item-title">
                Brad Diesel
                <span class="float-right text-sm text-danger"><i class="fa fa-star"></i></span>
              </h3>
              <p class="text-sm">Call me whenever you can...</p>
              <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i> 4 Hours Ago</p>
            </div>
          </div>
          <!-- Message End -->
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <!-- Message Start -->
          <div class="media">
            <img src="{{asset('adminlte/dist/img/user8-128x128.jpg')}}" alt="User Avatar" class="img-size-50 img-circle mr-3">
            <div class="media-body">
              <h3 class="dropdown-item-title">
                John Pierce
                <span class="float-right text-sm text-muted"><i class="fa fa-star"></i></span>
              </h3>
              <p class="text-sm">I got your message bro</p>
              <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i> 4 Hours Ago</p>
            </div>
          </div>
          <!-- Message End -->
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <!-- Message Start -->
          <div class="media">
            <img src="{{asset('dist/img/user3-128x128.jpg')}}" alt="User Avatar" class="img-size-50 img-circle mr-3">
            <div class="media-body">
              <h3 class="dropdown-item-title">
                Nora Silvester
                <span class="float-right text-sm text-warning"><i class="fa fa-star"></i></span>
              </h3>
              <p class="text-sm">The subject goes here</p>
              <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i> 4 Hours Ago</p>
            </div>
          </div>
          <!-- Message End -->
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
      </div>
    </li>
    <!-- Notifications Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="fa fa-bell-o"></i>
        <span class="badge badge-warning navbar-badge">15</span>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-item dropdown-header">15 Notifications</span>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <i class="fa fa-envelope mr-2"></i> 4 new messages
          <span class="float-right text-muted text-sm">3 mins</span>
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <i class="fa fa-users mr-2"></i> 8 friend requests
          <span class="float-right text-muted text-sm">12 hours</span>
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <i class="fa fa-file mr-2"></i> 3 new reports
          <span class="float-right text-muted text-sm">2 days</span>
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
          class="fa fa-th-large"></i></a>
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
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2" style="padding-left:20px">
            <div class="">
                <h1 class="m-0 text-dark">Bimbingan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left" style="margin-top:7px;">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item">Bimbingan</li>
                <li class="breadcrumb-item active">Verifikasi Bimbingan</li>
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
                <div class="card-body">
                    <form method="GET" action="/Bimbingan/Verifikasi">
                        <div class="form-group">
                            <label>Pilih Minggu </label>
                            <select name="cari" onchange="showUser(this.value)" class='form-control'>
                                <option value="">Pilih Minggu:</option>
                                @foreach ($mingguBimbingan as $item)
                                    <option value={{$item->id}}>{{ $item->mingguke }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-grou">
                            <input type="submit" value="Pilih" class="btn btn-primary">
                        </div>
                    </form>
                    <br>
                    @php if(isset($bimbingan)){ @endphp
                        <table class="table table-bordered tabled-hover" id="example1">
                            <thead>
                                <th>No. </th>
                                <th>NIM </th>
                                <th>Nama </th>
                                <th>Kelas </th>
                                <th>Tanggal Bimbingan </th>
                                <th>Pembimbing </th>
                                <th>Status</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @php $i=1; @endphp 
                                @foreach ($bimbingan as $item)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $item->nim }}</td>
                                        <td>{{ $item->mahasiswa->nama }}</td>
                                        <td>{{ $item->mahasiswa->kelas }}</td>
                                        <td>{{ Carbon\Carbon::parse($item->tanggalbimbingan)->formatLocalized('%A, %d %B %Y')}}</td>
                                        <td>
                                            @if ($item->pembimbing == "P1")
                                                Pembimbing 1
                                            @elseif($item->pembimbing == "P2")
                                                Pembimbing 2
                                            @else
                                                Error
                                            @endif
                                        </td>
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
                                                <input type='hidden' name='kode_bimbingan' id='verifikasi' value={{$item->id}} />
                                                <input type='hidden' name='status' id={{$item->id}} value={{$item->status}} />
                                                <button class="btn btn-warning" id={{$item->id}}> {{$Bstatus}} </button>
                                            </form>
                                        </td>
                                    </tr>
                                @php $i++; @endphp
                                @endforeach
                            </tbody>
                            
                        </table>
                    @php } @endphp
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
        function showUser(str) {
            if (str == "") {
                document.getElementById("txtHint").innerHTML = "";
                return;
            } else { 
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("txtHint").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET","Bimbingan/ListVerifikasi?q="+str,true);
                xmlhttp.send();
            }
        }
        function save(id){
            var kode_bimbingan = $("form[id="+id+"]").serialize();
            console.log(kode_bimbingan);
            $.ajax({
                type:"post",
                url:"/Bimbingan/saveBimbingan",
                data: kode_bimbingan,
                cache:false,
                success: function (a){
                    if(a=='Verifikasi Success'){
                        alert('Sukses Melakukan Verifikasi');
                        $('div#'+id).html('Diverifikasi');
                        $("input[id="+id+"]").val("1");
                        $("button[id="+id+"]").html('Batalkan');
                    }else{
                        if(a=='Verifikasi Dibatalkan'){
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
        $(function () {
            $("#example1").DataTable();
          });
    </script>
@endpush