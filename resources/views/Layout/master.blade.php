<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('adminlte/plugins/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('adminlte/dist/css/adminlte.min.css')}}">
  <link href="https://getbootstrap.com/docs/4.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('adminlte/plugins/iCheck/flat/blue.css')}}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{asset('adminlte/plugins/datepicker/datepicker3.css')}}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{asset('adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('adminlte/plugins/datatables/dataTables.bootstrap4.css')}}">
  <style>
  .alert-fixed {
    position:fixed; 
    width: 100%;
    z-index:9999; 
    border-radius:0px;
    left:30%;
    top:10%;
  }

  .notif-fixed {
    position:fixed; 
    width: 100%;
    z-index:9999; 
    border-radius:20px;
    right:2%;
    bottom:10%;
  }
  #bola{
    position:fixed; 
    z-index:9999; 
    left:50%;
    top:50%;
     
  }
  .wait{
    top:0%;
    position:absolute; 
    width:100%;
    height:100%;
    background-color: black;
    opacity:0.3;
    z-index:99999;
    color:white
  }
  
  </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

 
 @yield('navbar')
 

  @include('Layout.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('content')
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2018 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.0-alpha
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- datepicker -->
<script src="{{asset('adminlte/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<!-- DataTables -->
<script src={{asset('adminlte/plugins/datatables/jquery.dataTables.js')}}></script>
<script src={{asset('adminlte/plugins/datatables/dataTables.bootstrap4.js')}}></script>
<!-- AdminLTE App -->
<script src="{{asset('adminlte/dist/js/adminlte.js')}}"></script>

<script>
    window.setTimeout(function() {
      $(".alert").fadeTo(2000, 0).slideUp(500, function(){
          $(this).remove(); 
      });
  }, 1000);
</script>
<script type="text/javascript">
  $('.tanggalawal').datepicker({  
     format: 'yyyy-mm-dd 00:00:00'
   }); 
  $('.tanggalakhir').datepicker({  
    format: 'yyyy-mm-dd 23:59:59'
  });
  $('.tanggalbimbingan').datepicker({  
    format: 'yyyy-mm-dd 12:00:00'
  }); 
  //$('.collapse').collapse() 
</script> 
@stack('scripts')
</body>
</html>
