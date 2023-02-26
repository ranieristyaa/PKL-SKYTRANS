@include('partials.admin-header')
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  @include('layouts.admin2-navbar')

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-blue elevation-4" style="background-color: #0A2647;" > 
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link" >
      
      <center class="brand-text font-weight-bold" style="text-align :center; color: white;">SIMI</center>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ url('dist/img/user.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block" style="color: white;">{{ auth()->user()->name }}</a>
        </div>
      </div>

      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">Home</li>
          <li class="nav-item">
            <a href="/admin/home" class="nav-link ">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
                
              </p>
            </a>
          </li>
          <li class="nav-header">Kelola Data</li>
          


          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-box-open"></i>
              <p>
              Data Stock Barang
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/stock/aviasi" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Aviasi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/stock/migas" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Migas</p>
                </a>
              </li>
              
            </ul>
          </li>
          
          <li class="nav-item">
            <a href="/admin/rental" class="nav-link">
              <i class="nav-icon fas fa-clipboard-list"></i>
              <p>
                Data Peminjaman Aviasi
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-clipboard-check"></i>
              <p>
                Data Pembelian
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/pembelian/aviasi" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Aviasi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/pembelian/migas" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Migas
                 
                  </p>
                  
                </a>
                
          </li>
          


        </ul>
          </li>
          
         

          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-exchange-alt"></i>
              <p>
              Data Mutasi Barang
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/mutasi/aviasi" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Aviasi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/mutasi/migas" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Migas
                 
                  </p>
                  
                </a>
                
          </li>
          
          


        </ul>
        <li class="nav-header">Akun</li>
        <li class="nav-item">
            <a href="/admin/pengaturan_akun" class="nav-link active">
              <i class="nav-icon fas fa-user-cog"></i>
              <p>
                Pengaturan Akun
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/log" class="nav-link">
              <i class="nav-icon fas fa-history"></i>
              <p>
                Log Pengguna
                
              </p>
            </a>
          </li>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>
          <i class="fas fa-user-cog"></i>
            <span>Pengaturan Akun</span></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item active">Pengaturan Akun</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card" style="align-items: center;">
                    <br>
                        <div class="col-md-6">
                            <div class="card-body">
                            <form action="/admin/pengaturan_akun" method="post">
                                @csrf
                                <div class="form-group" style="display: flex;">
                                
                                <label class="control-label col-md-3" for="name">Username</label>
                                
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan username" value="{{ auth()->user()->name }}" required>
                                </div>
                                <div class="form-group" style="display: flex; margin-bottom: 0;">
                                
                                <label class="control-label col-md-3" for="email">Email</label>
                                
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Masukkan email" value="{{ auth()->user()->email }}" required>
                                </div>
                                <div style="display: flex;">
                                  <div class="col-md-3">
                                  
                                </div>
                                <div class="col-md-8" >

                                  <div class="text-danger" style="margin-bottom: 1rem;">
                                        @error('email')
                                        {{ $message }}
                                        @enderror
                                  </div>
                                </div>
                                </div>
                                <div class="form-group" style="display: flex; margin-bottom: 0;">
                                
                                <label class="control-label col-md-3" for="password">Password Baru*</label>
                                
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password baru" value="{{ old('password') }}" >
                                    
                                        
                                    
                                </div>
                                
                                <div style="display: flex;">
                                  <div class="col-md-3">
                                  
                                </div>
                                <div class="col-md-8" >
                                  <small ><p style="margin-bottom: 0;">*Password minimal 5 karakter dan harus mengandung minimal satu simbol dan angka.</p></small>
                                  <div class="text-danger" style="margin-bottom: 1rem;">
                                        @error('password')
                                        {{ $message }}
                                        @enderror
                                  </div>
                                </div>
                                </div>
                                
                                
                               
                                <div class="form-group" style="display: flex">
                                
                                <label class="control-label col-md-3" for="confirm_password">Konfirmasi Password</label>
                                
                                    <input type="password" class="form-control" id="confirm_password" name="password_confirmation" placeholder="Ketik ulang password" value="" >
                                </div>
                                <div class="card-footer" style="background-color: white;">
                                    <center>
                                    <button class="btn btn-success" type="submit">
									Simpan
								</button>
                                </center>
                                </div>
                                
                                
                            </form>
                        </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>

  @section('script')
  <script>
  $(document).ready(function() {
    toastr.options = {
            "closeButton":false,
            "debug":false,
            "newestOnTop":false,
            "progressBar":true,
            "positionClass":"toast-top-right",
            "preventDuplicates":true,
            "onclick":null,
            "showDuration":"300",
            "hideDuration":"1000",
            "timeOut":"7000",
            "extendedTimeOut":"1000",
            "showEasing":"swing",
            "hideEasing":"linear",
            "showMethod":"fadeIn",
            "hideMethod":"fadeOut"
    }
    @if (session()->has('success'))
      toastr.success("{{ session('success') }}")
    @endif

    @if (session()->has('error'))
      toastr.error("{{ session('error') }}")
    @endif
    });
</script>
  @endsection

  @include('partials.admin-footer')