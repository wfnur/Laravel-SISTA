<?php
  $user = \App\Dosen::find(auth()->user()->username);
  if ($user == null) {
      $user = \App\Mahasiswa::find(auth()->user()->username);            
  }
  $tipe_user = explode(",",auth()->user()->tipe_user);
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
        <!--<img src="{{asset('adminlte/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">-->
      </div>
      <div class="info">
        <a href="#" class="d-block">{{$user->nama}}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        
          @php if(in_array("admin",$tipe_user)){ @endphp

            <!--Dashboard-->
            <li class="nav-item ">
              <a href="{{url('/Dashboard-Admin')}}" class="nav-link {{ Request::getPathInfo() == "/Dashboard-Admin" ? "active" : "" }} ">
                <i class="nav-icon fa fa-dashboard"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>

            <!--Mahasiswa-->
            <li class="nav-item">
              <a href="{{url('/Mahasiswa')}}" class="nav-link {{ Request::getPathInfo() == "/Mahasiswa" ? "active" : "" }} ">
                <i class="nav-icon fa fa-group"></i>
                <p>
                  Mahasiswa
                </p>
              </a>
            </li>

            <!--Dosen-->
            <li class="nav-item">
              <a href="{{url('/Dosen/Create')}}" class="nav-link {{ Request::getPathInfo() == "/Dosen/Create" ? "active" : "" }} ">
                <i class="nav-icon fa fa-group"></i>
                <p>
                  Dosen
                </p>
              </a>
            </li>

            <!--BAB-->
            <li class="nav-item">
              <a href="{{url('/BAB')}}" class="nav-link {{ Request::getPathInfo() == "/BAB" ? "active" : "" }} ">
                <i class="nav-icon fa fa-group"></i>
                <p>
                  BAB
                </p>
              </a>
            </li>

            <!--SubBab-->
            <li class="nav-item">
              <a href="{{url('/SubBab')}}" class="nav-link {{ Request::getPathInfo() == "/SubBab" ? "active" : "" }} ">
                <i class="nav-icon fa fa-group"></i>
                <p>
                  Sub BAB
                </p>
              </a>
            </li>

            <!--Minggu-Bimbingan-->
            <li class="nav-item">
              <a href="{{url('/Minggu-Bimbingan')}}" class="nav-link {{ Request::getPathInfo() == "/Minggu-Bimbingan" ? "active" : "" }} ">
                <i class="nav-icon fa fa-group"></i>
                <p>
                  Minggu Bimbingan
                </p>
              </a>
            </li>

            <!--Deadline-->
            <li class="nav-item">
              <a href="{{url('/Deadline')}}" class="nav-link {{ Request::getPathInfo() == "/Deadline" ? "active" : "" }} ">
                <i class="nav-icon fa fa-group"></i>
                <p>
                  Deadline
                </p>
              </a>
            </li>

            <!--Poin Penilaian-->
            <li class="nav-item">
              <a href="{{url('/Poin-Penilaian')}}" class="nav-link {{ Request::getPathInfo() == "/Poin-Penilaian" ? "active" : "" }} ">
                <i class="nav-icon fa fa-group"></i>
                <p>
                  Poin Penilaian Sidang
                </p>
              </a>
            </li>

            <!--Poin Penilaian Laporan-->
            <li class="nav-item">
              <a href="{{url('/Poin-Penilaian-Laporan')}}" class="nav-link {{ Request::getPathInfo() == "/Poin-Penilaian-Laporan" ? "active" : "" }} ">
                <i class="nav-icon fa fa-group"></i>
                <p>
                  Poin Penilaian Laporan
                </p>
              </a>
            </li>

            <!--Jadwal Sidang-->
            <li class="nav-item">
              <a href="{{url('/Jadwal-Sidang')}}" class="nav-link {{ Request::getPathInfo() == "/Jadwal-Sidang" ? "active" : "" }} ">
                <i class="nav-icon fa fa-group"></i>
                <p>
                  Jadwal Sidang
                </p>
              </a>
            </li>

          @php } @endphp

          @php if (in_array("mhs",$tipe_user)){ @endphp
            @php
                $mhs = \App\Mahasiswa::where('NIM','=',auth()->user()->username)->first();
                $kelas = date('Y') - $mhs->angkatan;
            @endphp
            <!--Dashboard
            <li class="nav-item ">
              <a href="{{url('/Dashboard-Mahasiswa')}}" class="nav-link {{ Request::getPathInfo() === "/Dashboard-Mahasiswa" ? "active" : "" }} ">
                <i class="nav-icon fa fa-dashboard"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li> -->

            @if ($kelas == 3)
              @if ($mhs->kelas != 'NK')
                <!--Proposal TA-->
                <li class="nav-item has-treeview">
                  <a href="#" class="nav-link">
                    <p>Propsal Tugas Akhir </p>
                      <i class="fa fa-angle-left pull-right" style="margin-top:5px;" ></i>
                    </p>
                  </a>

                  <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                      <a href="{{url('/Proposal/TA/R0')}}" class="nav-link {{ Request::getPathInfo() === "/Proposal/TA/R0" ? "active" : "" }}">
                        <i class="fa fa-check nav-icon"></i>
                        <p>Revisi 0</p>
                      </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('/Proposal/TA/R1')}}" class="nav-link {{ Request::getPathInfo() === "/Proposal/TA/R1" ? "active" : "" }}">
                        <i class="fa fa-check nav-icon"></i>
                        <p>Revisi 1</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="fa fa-check nav-icon"></i>
                        <p>Revisi 2</p>
                      </a>
                    </li>
                  </ul>
                </li>

                <!--Bimbingan Mahasiswa-->
                <li class="nav-item has-treeview">
                  <a href="#" class="nav-link
                  @if(Request::getPathInfo() == "/Bimbingan/create" || Request::getPathInfo() == "/Bimbingan" )
                  active
                  @endif
                  ">
                    <p>Bimbingan</p>
                      <i class="fa fa-angle-left pull-right" style="margin-top:5px;" ></i>
                    </p>
                  </a>
    
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{url('/Bimbingan/create')}}" class="nav-link {{ Request::getPathInfo() == "/Bimbingan/create" ? "active" : "" }}">
                        <i class="fa fa-cloud-upload nav-icon"></i>
                        <p>Upload Bimbingan</p>
                      </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('/Bimbingan')}}" class="nav-link {{ Request::getPathInfo() === "/Bimbingan" ? "active" : "" }}">
                        <i class="fa fa-bars nav-icon"></i>
                        <p>History Bimbingan</p>
                      </a>
                    </li>
                  </ul>
                </li>

                <!--Laporan TA-->
                <li class="nav-item ">
                  <a href="{{url('/Laporan/TA')}}" class="nav-link {{ Request::getPathInfo() === "/Laporan/TA" ? "active" : "" }} ">
                    <p>
                      Laporan Tugas Akhir
                    </p>
                  </a>
                </li>
              @endif
              
            @endif            
          @php } @endphp

          @php if(in_array("dsn",$tipe_user)){ @endphp
            <!--Penilaian Laporan TA-->
            <li class="nav-item">
              <a href="{{url('/Laporan/Penilaian/List-Mahasiswa')}}" class="nav-link" {{ Request::getPathInfo() == "/Laporan/Penilaian/List-Mahasiswa" ? "active" : "" }}>
                <i class="nav-icon fa fa-star"></i>
                <p>
                  Penilaian Laporan TA
                </p>
              </a>
            </li>
          @php } @endphp

          

          @php if(in_array("panitia",$tipe_user)){ @endphp
            <!--Bimbingan Dosen -->
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <p>Bimbingan</p>
                  <i class="fa fa-angle-left pull-right" style="margin-top:5px;" ></i>
                </p>
              </a>

              <ul class="nav nav-treeview" style="display: none;">
                <li class="nav-item">
                  <a href="{{url('/Bimbingan/Verifikasi')}}" class="nav-link {{ Request::getPathInfo() === "/Bimbingan/Verifikasi" ? "active" : "" }}">
                    <i class="fa fa-check nav-icon"></i>
                    <p>Verifikasi Bimbingan</p>
                  </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/Bimbingan/Rekap')}}" class="nav-link {{ Request::getPathInfo() === "/Bimbingan/Rekap" ? "active" : "" }}">
                    <i class="fa fa-bars nav-icon"></i>
                    <p>Rekap Bimbingan</p>
                  </a>
                </li>
              </ul>
            </li>
          @php } @endphp

          @php if(in_array("reviewer_proposalPKMPolban",$tipe_user)){ @endphp
            <!--Proposal TA-->
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <p>Review Proposal <br> PKM POLBAN </p>
                  <i class="fa fa-angle-left pull-right" style="margin-top:5px;" ></i>
                </p>
              </a>

              <ul class="nav nav-treeview" style="display: none;">
                <li class="nav-item">
                  <a href="#" class="nav-link {{ Request::getPathInfo() === "/Proposal/TA/R0" ? "active" : "" }}">
                    <i class="fa fa-check nav-icon"></i>
                    <p>Revisi 0</p>
                  </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link {{ Request::getPathInfo() === "/Proposal/TA/R1" ? "active" : "" }}">
                    <i class="fa fa-check nav-icon"></i>
                    <p>Revisi 1</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="fa fa-check nav-icon"></i>
                    <p>Revisi 2</p>
                  </a>
                </li>
              </ul>
            </li>
          @php } @endphp

          @php if(in_array("reviewer_proposalPKMBelmawa",$tipe_user)){ @endphp
            <!--Proposal TA-->
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <p>Review Proposal <br> PKM BELMAWA </p>
                  <i class="fa fa-angle-left pull-right" style="margin-top:5px;" ></i>
                </p>
              </a>

              <ul class="nav nav-treeview" style="display: none;">
                <li class="nav-item">
                  <a href="#" class="nav-link {{ Request::getPathInfo() === "/Proposal/TA/R0" ? "active" : "" }}">
                    <i class="fa fa-check nav-icon"></i>
                    <p>Revisi 0</p>
                  </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link {{ Request::getPathInfo() === "/Proposal/TA/R1" ? "active" : "" }}">
                    <i class="fa fa-check nav-icon"></i>
                    <p>Revisi 1</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="fa fa-check nav-icon"></i>
                    <p>Revisi 2</p>
                  </a>
                </li>
              </ul>
            </li>
          @php } @endphp

          @php if(in_array("reviewer_proposalTA",$tipe_user)){ @endphp
            <!--Proposal TA-->
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <p>Review Proposal TA </p>
                  <i class="fa fa-angle-left pull-right" style="margin-top:5px;" ></i>
                </p>
              </a>

              <ul class="nav nav-treeview" style="display: none;">
                <li class="nav-item">
                  <a href="#" class="nav-link {{ Request::getPathInfo() === "/Proposal/TA/R0" ? "active" : "" }}">
                    <i class="fa fa-check nav-icon"></i>
                    <p>Revisi 0</p>
                  </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link {{ Request::getPathInfo() === "/Proposal/TA/R1" ? "active" : "" }}">
                    <i class="fa fa-check nav-icon"></i>
                    <p>Revisi 1</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="fa fa-check nav-icon"></i>
                    <p>Revisi 2</p>
                  </a>
                </li>
              </ul>
            </li>
          @php } @endphp

          @php if(in_array("reviewer_SKTA",$tipe_user)){ @endphp
            <!--Bimbingan-->
            <li class="nav-item ">
              <a href="#" class="nav-link {{ Request::getPathInfo() === "/Dashboard-Mahasiswa" ? "active" : "" }} ">
                <p>
                  Review SKTA
                </p>
              </a>
            </li> 
          @php } @endphp       
        
        <li class="nav-item">
          <a href="{{url('/Logout')}}" class="nav-link">
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