@include('partials.admin-header')

<body class="hold-transition sidebar-mini sidebar-closed sidebar-collapse">
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
            <a href="/admin/home" class="nav-link">
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
            <a href="/admin/pengaturan_akun" class="nav-link">
              <i class="nav-icon fas fa-user-cog"></i>
              <p>
                Pengaturan Akun
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/log" class="nav-link active">
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
          <i class="fas fa-history"></i>
            <span>Log Aktivitas</span></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-user"></i></a></li>
              <li class="breadcrumb-item active">Log Aktivitas</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    
    

    <!-- Main content -->
    <div class="content">
    <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                
                <!-- /.card-header -->
                <div class="card-body">
                  
                
                  <table id="example1" class="table table-bordered table-hover" >
                    <thead>
                    <tr>
                      <th>No.</th>
                      <th>Tanggal</th>
                      <th>Kategori Barang</th>
                      <th>Aktivitas</th>
                      
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $index => $d)
                    <tr>
                        <td>{{ $index+1 }}</td>
                        <td>{{ $d->created_at }}</td>
                        <td>{{ $d->log_name == 'Aviasi Stock' ? 'Aviasi' : 'Migas' }}</td>
                        <td>{{ $d->description }}</td>
                    </tr>
                    @endforeach
                    </tbody>
                  
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->

              
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
   

 
</div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  
</div>
<!-- ./wrapper -->
@section('script')
<script>
   $("document").ready(function () {
      $("#example1").DataTable({
        "searching": true,
        "responsive": true, "lengthChange": false, "autoWidth": false,
        buttons: {
          dom: {
              button: {
                  className: 'btn btn-outline-dark' //Primary class for all buttons
              }
          },
          buttons: [
            {
            extend: 'print',
            title: 'Migas Mutations',
              text: '<span><i class="fas fa-print"></i></span>  Print',
            
          },
          {
              extend: 'excel',
              
              title: 'Migas Mutations',
              text: '<span><i class="fas fa-download"></i></span>  Download as Excel',
             
          }
          ]
        }
      }).buttons().container().appendTo('#example1_wrapper .row .col-sm-12:eq(2)');
      $(".dt-buttons").css("margin-top", "20px");
      
    });
</script>
@endsection
@include('partials.admin-footer')