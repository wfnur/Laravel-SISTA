<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SISTA | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('adminlte/dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style>
    .hari{
      background:#dc3545 !important;border-radius: 10px;padding:0px;
      display:flex;
      align-items: center;
      justify-content: center;
    }
    .box-bg{
      margin:-20px -20px -20px 20px !important;
    }
  </style>
</head>
<body class="hold-transition login-page">
@if (session('gagal'))
<div class="col-8" style="margin:10px auto;">
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{session('gagal')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>       
@endif
<div class="col-md-7" style="margin:60px auto;">
  <div class="login-logo">
    <a href="#"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-md-6 col xs-12">
          <div class="login-card-body">
              <p class="login-box-msg">Sign in to start your session</p>
              <form action="{{url('/postlogin')}}" method="post">
                {{ csrf_field() }}
                <div class="form-group has-feedback">
                  <input type="text" class="form-control" placeholder="NIM/Kode Dosen" name="username" required autofocus>
                </div>
                <div class="form-group has-feedback">
                  <input type="password" class="form-control" placeholder="Password" name="password" required>
                </div>
                <div class="form-group has-feedback">
                    <input type="submit" class="btn btn-primary btn-info" placeholder="Password">
                </div>
              </form>
        
              <!-- /.social-auth-links -->
            </div>
        </div>
        <div class="col-md-6 col xs-12" style="">
          <div class="bd-example">
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="{{asset('public/Images/bgwhite.jpg')}}" class="d-block w-100" alt="..." style="height:300px;">
                  <div class="carousel-caption d-none d-md-block">
                      <div id="demo" class="row" >
                      </div>
                      <div class="row" style="color:#dc3545">
                        <h3>{{$deadline->nama}}</h3>
                      </div>
                  </div>
                </div>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
      </div>
    </div> 
    
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script>
    $(".alert").fadeTo(1000, 500).slideUp(500, function(){
      $(".alert").slideUp(500);
  });
</script>
<script>
    // Set the date we're counting down to
    var countDownDate = new Date("{{$deadline->tanggal}}").getTime();
    // Update the count down every 1 second
    var x = setInterval(function() {
    
      // Get todays date and time
      var now = new Date().getTime();
        
      // Find the distance between now and the count down date
      var distance = countDownDate - now;
        
      // Time calculations for days, hours, minutes and seconds
      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);

      
        
      // Output the result in an element with id="demo"
      document.getElementById("demo").innerHTML = "<div class='col-md-2'><div class='row'><center><h4 style='color:#aaa;'> Hari </h4></center></div><div class='row hari'><h1>"+days+"</h1></div></div>"+
      "<div class='col-md-1'><div class='row' style='color:red'><h1 style='margin:35px auto;'>:</h1></div></div>"+
      "<div class='col-md-2'><div class='row' style='color:red'><h4 style='color:#aaa' style='color:#aaa;'>Jam</h4></div><div class='row hari'><h1>"+hours+"</h1></div></div>"+
      "<div class='col-md-2'><div class='row' style='color:red'><h1 style='margin:35px auto;'>:</h1></div></div>"+
      "<div class='col-md-2'><div class='row' style='color:red'><h4 style='color:#aaa' style='color:#aaa;'>Menit</h4></div><div class='row hari'><h1>"+minutes+"</h1></div></div>"+
      "<div class='col-md-1'><div class='row' style='color:red'><h1 style='margin:35px auto;'>:</h1></div></div>"+
      "<div class='col-md-2'><div class='row' style='color:red'><h4 style='color:#aaa' style='color:#aaa;'>Detik</h4></div><div class='row hari'><h1>"+seconds+"</h1></div></div>";
        
      // If the count down is over, write some text 
      if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "EXPIRED";
      }
    }, 1000);
    </script>
</body>
</html>
