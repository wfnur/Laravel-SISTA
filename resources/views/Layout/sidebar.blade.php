<?php
  $user = \App\Dosen::find(auth()->user()->username);
  if ($user == null) {
      $user = \App\Mahasiswa::find(auth()->user()->username);            
  }
?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-danger elevation-4">
  <!-- Brand Logo -->
  <a href="" class="brand-link bg-primary">
    <img src="{{asset('adminlte/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{asset('adminlte/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{$user->nama}}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          @if (auth()->user()->tipe_user =='admin')
            <!--Dashboard-->
            <li class="nav-item ">
              <a href="/Dashboard-Admin" class="nav-link {{ Request::getPathInfo() == "/Dashboard-Admin" ? "active" : "" }} ">
                <i class="nav-icon fa fa-dashboard"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>

            <!--Mahasiswa-->
            <li class="nav-item">
              <a href="/Mahasiswa" class="nav-link {{ Request::getPathInfo() == "/Mahasiswa" ? "active" : "" }} ">
                <i class="nav-icon fa fa-group"></i>
                <p>
                  Mahasiswa
                </p>
              </a>
            </li>

            <!--Dosen-->
            <li class="nav-item">
              <a href="/Dosen" class="nav-link {{ Request::getPathInfo() == "/Dosen" ? "active" : "" }} ">
                <i class="nav-icon fa fa-group"></i>
                <p>
                  Dosen
                </p>
              </a>
            </li>

            <!--BAB-->
            <li class="nav-item">
              <a href="/BAB" class="nav-link {{ Request::getPathInfo() == "/BAB" ? "active" : "" }} ">
                <i class="nav-icon fa fa-group"></i>
                <p>
                  BAB
                </p>
              </a>
            </li>

            <!--SubBab-->
            <li class="nav-item">
              <a href="/SubBab" class="nav-link {{ Request::getPathInfo() == "/SubBab" ? "active" : "" }} ">
                <i class="nav-icon fa fa-group"></i>
                <p>
                  Sub BAB
                </p>
              </a>
            </li>

            <!--Minggu-Bimbingan-->
            <li class="nav-item">
              <a href="/Minggu-Bimbingan" class="nav-link {{ Request::getPathInfo() == "/Minggu-Bimbingan" ? "active" : "" }} ">
                <i class="nav-icon fa fa-group"></i>
                <p>
                  Minggu Bimbingan
                </p>
              </a>
            </li>

            <!--Deadline-->
            <li class="nav-item">
              <a href="/Deadline" class="nav-link {{ Request::getPathInfo() == "/Deadline" ? "active" : "" }} ">
                <i class="nav-icon fa fa-group"></i>
                <p>
                  Deadline
                </p>
              </a>
            </li>
          @endif

          @if (auth()->user()->tipe_user =='mhs')
            <!--Dashboard
            <li class="nav-item ">
              <a href="/Dashboard-Mahasiswa" class="nav-link {{ Request::getPathInfo() === "/Dashboard-Mahasiswa" ? "active" : "" }} ">
                <i class="nav-icon fa fa-dashboard"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li> -->

            <!--Proposal TA-->
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-group"></i>
                  <p>Propsal Tugas Akhir</p>
                    <i class="fa fa-angle-left pull-right" style="margin-top:5px;" ></i>
                  </p>
                </a>

                <ul class="nav nav-treeview" style="display: none;">
                  <li class="nav-item">
                    <a href="/Proposal/TA/R0" class="nav-link {{ Request::getPathInfo() === "/Proposal/TA/R0" ? "active" : "" }}">
                      <i class="fa fa-check nav-icon"></i>
                      <p>Revisi 0</p>
                    </a>
                  </li>
                  <li class="nav-item">
                      <a href="/Proposal/TA/R1" class="nav-link {{ Request::getPathInfo() === "/Proposal/TA/R1" ? "active" : "" }}">
                      <i class="fa fa-check nav-icon"></i>
                      <p>Revisi 1</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="Proposal-Manpro-Dosen_2" class="nav-link">
                      <i class="fa fa-check nav-icon"></i>
                      <p>Revisi 2</p>
                    </a>
                  </li>
                </ul>
              </li>
          @endif
          

        
        
        <li class="nav-item">
          <a href="/Logout" class="nav-link">
            <i class="nav-icon fa fa-power-off"></i>
            <p>
              Logout
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>