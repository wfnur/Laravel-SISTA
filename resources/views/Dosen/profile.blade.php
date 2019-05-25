@extends('Layout.master')

@section('title','Profile Dosen')

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

@if (session('error'))
    <div class="alert alert-danger col-md-6 alert-fixed">
    {{ session('error') }}
    </div>
@endif
@if (session('success'))
    <div class="alert alert-success col-md-6 alert-fixed">
    {{ session('success') }}
    </div>
@endif
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Profile</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">User Profile</li>
        </ol>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-md-4">

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
            <div class="text-center">
                <img class="profile-user-img img-fluid img-circle" style="max-height:100px;"
                    src="{{asset('Images/'.$dosen->foto)}}"
                    alt="User profile picture">
            </div>

            <h3 class="profile-username text-center">{{$dosen->nama}}</h3>
            <p class="text-muted text-center">{{$dosen->kode_dosen}}</p>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <!-- About Me Box -->
        <div class="card card-primary">
            <div class="card-header">
            <h3 class="card-title">About Me</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <strong><i class="fa fa-book mr-1"></i> Program Studi</strong>

            <hr>

            <strong><i class="fa fa-map-marker mr-1"></i> Alamat</strong>
            <p class="text-muted">{{$dosen->alamat}}</p>
            <hr>

            <strong><i class="fa fa-phone mr-1"></i> Telepon</strong>
            <p class="text-muted">
                    {{$dosen->telpon}}
            </p>
            <hr>

            <strong><i class="fa fa fa-birthday-cake mr-1"></i> Email</strong>

            <p class="text-muted">{{$dosen->email}}</p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-8">
        <div class="card">
            <div class="card-header p-2">
            <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Ubah Profile</a></li>
                <li class="nav-item"><a class="nav-link" href="#password" data-toggle="tab">Ubah Password</a></li>
                <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
            </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane active" id="settings">
                    <form action="/Dosen/{{$dosen->kode_dosen}}/update" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Kode Dosen</label>
                            <input type="text" name="kode_dosen"  class="form-control" value="{{$dosen->kode_dosen}}" required>  
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama"  class="form-control" value="{{$dosen->nama}}" required>  
                        </div>
                        <div class="form-group">
                            <label>Jenis kelamin</label>
                        </div>
                        <div class='form-check form-check-inline' style='margin-top:-60px;'>
                            <input type="radio" name="jk" value="L" class="form-check-input" @if ($dosen->jk == 'L') checked @endif>
                            <label class="form-check-label">Laki - Laki</label>
                            <input type="radio" name="jk" value="P" class="form-check-input" @if ($dosen->jk == 'P') checked @endif >
                            <label class="form-check-label">Perempuan</label>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea class="form-control" rows='5' name='alamat'>{{$dosen->alamat}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Telpon</label>
                            <input type="text" name="telpon"  class="form-control" value="{{$dosen->telpon}}">  
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" value="{{$dosen->email}}">  
                        </div>
                        <div class="form-group">
                                <label>Foto</label>
                                <input type="file" name="foto" class="form-control" accept=".JPG, .JPEG, .png">  
                            </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-warning" value="Simpan"> Update</button>
                        </div>
                    </form>
                </div>
                <!-- /.tab-pane -->

                <div class="tab-pane" id="password">
                    <form class="form-horizontal" method="POST" action="/Dosen/changePassword">
                        {{ csrf_field() }}
                        
                        <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                            <label for="new-password" class="col-md-4 control-label">Current Password</label>
                            <div class="col-md-6">
                                <input id="current-password" type="password" class="form-control" name="current-password" required>    
                                @if ($errors->has('current-password'))
                                <span class="help-block">
                                <strong>{{ $errors->first('current-password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                            <label for="new-password" class="col-md-4 control-label">New Password</label>
                            <div class="col-md-6">
                                <input id="new-password" type="password" class="form-control" name="new-password" required>
                                @if ($errors->has('new-password'))
                                <span class="help-block">
                                <strong>{{ $errors->first('new-password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="new-password-confirm" class="col-md-4 control-label">Confirm New Password</label>
                            <div class="col-md-6">
                                <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">Change Password</button>
                            </div>
                        </div>
                    </form>
                <!-- /.post -->
                </div>
                <!-- /.tab-pane -->

                <div class="tab-pane" id="timeline">
                    <!-- The timeline -->
                    <ul class="timeline timeline-inverse">
                        <!-- timeline time label -->
                        <li class="time-label">
                        <span class="bg-danger">
                            10 Feb. 2014
                        </span>
                        </li>
                        <!-- /.timeline-label -->
                        <!-- timeline item -->
                        <li>
                        <i class="fa fa-envelope bg-primary"></i>

                        <div class="timeline-item">
                            <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                            <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                            <div class="timeline-body">
                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                            weebly ning heekya handango imeem plugg dopplr jibjab, movity
                            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                            quora plaxo ideeli hulu weebly balihoo...
                            </div>
                            <div class="timeline-footer">
                            <a href="#" class="btn btn-primary btn-sm">Read more</a>
                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                            </div>
                        </div>
                        </li>
                        <!-- END timeline item -->
                        <!-- timeline item -->
                        <li>
                        <i class="fa fa-user bg-info"></i>

                        <div class="timeline-item">
                            <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

                            <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request
                            </h3>
                        </div>
                        </li>
                        <!-- END timeline item -->
                        <!-- timeline item -->
                        <li>
                        <i class="fa fa-comments bg-warning"></i>

                        <div class="timeline-item">
                            <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                            <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                            <div class="timeline-body">
                            Take me to your leader!
                            Switzerland is small and neutral!
                            We are more like Germany, ambitious and misunderstood!
                            </div>
                            <div class="timeline-footer">
                            <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                            </div>
                        </div>
                        </li>
                        <!-- END timeline item -->
                        <!-- timeline time label -->
                        <li class="time-label">
                        <span class="bg-success">
                            3 Jan. 2014
                        </span>
                        </li>
                        <!-- /.timeline-label -->
                        <!-- timeline item -->
                        <li>
                        <i class="fa fa-camera bg-purple"></i>

                        <div class="timeline-item">
                            <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

                            <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                            <div class="timeline-body">
                            <img src="http://placehold.it/150x100" alt="..." class="margin">
                            <img src="http://placehold.it/150x100" alt="..." class="margin">
                            <img src="http://placehold.it/150x100" alt="..." class="margin">
                            <img src="http://placehold.it/150x100" alt="..." class="margin">
                            </div>
                        </div>
                        </li>
                        <!-- END timeline item -->
                        <li>
                        <i class="fa fa-clock-o bg-gray"></i>
                        </li>
                    </ul>
                </div>
                <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
            </div><!-- /.card-body -->
        </div>
        <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@stop