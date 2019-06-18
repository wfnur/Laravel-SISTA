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
      @import url('https://fonts.googleapis.com/css?family=Archivo+Narrow&display=swap');
    .hari{
      background:#dc3545 !important;border-radius: 10px;padding:0px;
      display:flex;
      align-items: center;
      justify-content: center;
    }
    .box-bg{
      margin:-20px -20px -20px 20px !important;
    }
    :root {
      --input-padding-x: 1.5rem;
      --input-padding-y: .75rem;
    }
    
    body {
      background: #343a40;
      background: linear-gradient(to right, #0062E6, #33AEFF);
    }
    
    .card-signin {
      border: 0;
      border-radius: 1rem;
      box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
      overflow: hidden;
    }
    
    .card-signin .card-title {
      margin-bottom: 1rem;
      font-weight: 300;
      font-size: 1.5rem;
      
    }

    #demo{
      font-weight: bold;
      font-size:40px;
      color:#ed5656;
    }
    
    .card-signin .card-img-left {
      width: 45%;
      /* Link to your background image using in the property below! */
      background: scroll center url('Images/login.jpg');
      background-size: cover;
    }
    
    .card-signin .card-body {
      padding: 2rem;
    }
    
    .form-signin {
      width: 100%;
    }
    
    .form-signin .btn {
      font-size: 80%;
      border-radius: 5rem;
      letter-spacing: .1rem;
      font-weight: bold;
      padding: 1rem;
      transition: all 0.2s;
    }
    
    .form-label-group {
      position: relative;
      margin-bottom: 1rem;
    }
    
    .form-label-group input {
      height: auto;
      border-radius: 2rem;
    }
    
    .form-label-group>input,
    .form-label-group>label {
      padding: var(--input-padding-y) var(--input-padding-x);
    }
    
    .form-label-group>label {
      position: absolute;
      top: 0;
      left: 0;
      display: block;
      width: 100%;
      margin-bottom: 0;
      /* Override default `<label>` margin */
      line-height: 1.5;
      color: #495057;
      border: 1px solid transparent;
      border-radius: .25rem;
      transition: all .1s ease-in-out;
    }
    
    .form-label-group input::-webkit-input-placeholder {
      color: transparent;
    }
    
    .form-label-group input:-ms-input-placeholder {
      color: transparent;
    }
    
    .form-label-group input::-ms-input-placeholder {
      color: transparent;
    }
    
    .form-label-group input::-moz-placeholder {
      color: transparent;
    }
    
    .form-label-group input::placeholder {
      color: transparent;
    }
    
    .form-label-group input:not(:placeholder-shown) {
      padding-top: calc(var(--input-padding-y) + var(--input-padding-y) * (2 / 3));
      padding-bottom: calc(var(--input-padding-y) / 3);
    }
    
    .form-label-group input:not(:placeholder-shown)~label {
      padding-top: calc(var(--input-padding-y) / 3);
      padding-bottom: calc(var(--input-padding-y) / 3);
      font-size: 12px;
      color: #777;
    }
    
    .btn-google {
      color: white;
      background-color: #ea4335;
    }
    
    .btn-facebook {
      color: white;
      background-color: #3b5998;
    }

    
    
  </style>
</head>
<body>
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
<div class="container">
  <div class="row">
    <div class="col-lg-10 col-xl-9 mx-auto">
      <div class="card card-signin flex-row my-5">
        <div class="card-img-left d-none d-md-flex">
           <!-- Background image for card set in CSS! -->
           
        </div>
        <div class="card-body">
          <h5 class="card-title text-center">{{$deadline->nama}}</h5>
          <div class="card-title text-center" id="demo"></div>
          <form class="form-signin" method="POST" action="{{url('/postlogin')}}">
            {{ csrf_field() }}
            <div class="form-label-group">
              <input type="text" name="username" id="inputUserame" class="form-control" placeholder="Username" required autofocus>
              <label for="inputUserame">Username</label>
            </div>
            <br>
            <div class="form-label-group">
              <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
              <label for="inputPassword">Password</label>
            </div>
            <br>
            
            <input type="submit" class="btn btn-lg btn-secondary btn-block text-uppercase" value="Login">
            
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

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
      document.getElementById("demo").innerHTML = days+" : "+hours+" : "+minutes+" : "+seconds;
        
      // If the count down is over, write some text 
      if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "EXPIRED";
      }
    }, 1000);
    </script>
</body>
</html>