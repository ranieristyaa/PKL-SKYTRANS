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
  @include('layouts.admin-navbar')

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-blue elevation-4" style="background-color: #0A2647 ;">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link" >
      
      <center class="brand-text font-weight-bold" style="text-align :center; color: white;">SINVEN</center>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ url('dist/img/user.png') }}" class="img-circle elevation-2" alt="User Image">
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
          
          <li class="nav-item">
            <a href="/admin/home" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
                
              </p>
            </a>
          </li>
         
          <li class="nav-item menu-open">
            <a href="" class="nav-link active">
              <i class="nav-icon fas fa-box-open"></i>
              <p>
              Data Stock Barang
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item ">
                <a href="/admin/stock/aviasi" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Aviasi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/stock/migas" class="nav-link active" style="background-color: #9cc5f0;">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Migas</p>
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
                <a href="/admin/stock/aviasi" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Aviasi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/stock/aviasi" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Migas
                  <i class="right fas fa-angle-left"></i>
                  </p>
                  
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Pipa</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Baut</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>...</p>
                    </a>
                  </li>
                </ul>
          </li>
          </ul>
          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-clipboard"></i>
              <p>
                Data Pesanan
                
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
          <i class="fas fa-box-open"></i>
            <span>Data Stock Migas</span></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item">Data Stock</li>
              <li class="breadcrumb-item active">Migas</li>
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
                  <div class="col-md-6-sm-12">
                <button class="btn btn-primary" data-toggle="modal" 
                              style="font-size: 1rem; " id="btnAdd"><span><i class="fas fa-plus"></i></span>  Tambah</button>

                </div>
                  <table id="example1" class="table table-bordered table-hover" >
                    <thead>
                    <tr>
                      <th>Nama Barang</th>
                      <th>Keterangan</th>
                      <th>Jumlah</th>
                      <th>Harga/m</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($data as $d)
                    <tr>
                      <td>{{ $d->name }}</td>
                      <td>{{ $d->description }}</td>
                      <td>{{ $d->quantity }}</td>
                      <td>{{ $d->price }}</td>
                      <td style="text-align: center;">
                      <button class="btn btn-info" data-toggle="modal" 
                              style="font-size: 0.8rem; padding: 0.2rem 0.75rem;"><span><i class="fas fa-pen"></i></span>  Edit</button>
                      <button class="btn btn-danger" data-toggle="modal" id="btnDelete"
                              data-target="modal-delete-{{ $d->id }}" style="font-size: 0.8rem; padding: 0.2rem 0.75rem;"><span><i class="fas fa-trash"></i></span> Hapus</button>
                      
                      </td>

                      {{-- Modal Decline --}}
                              <div class="modal fade bd-example-modal-sm" id="modal-delete-{{ $d->id }}" tabindex="-1" role="dialog"
                                  aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered" role="document">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <h4 class="modal-title" id="exampleModalLongTitle" style="font-size: 1.25rem;">
                                                  Konfirmasi Hapus</h4>
                                              <button type="button" class="close" data-dismiss="modal"
                                                  aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                              </button>
                                              
                                          </div>
                                          <div class="modal-body">
                                            
                                              <div>
                                                  <p><b>Hapus akun pengguna "{{ $d->id }}"</b></p>
                                                  <p class="mb-0">Akun pengguna yang telah dihapus tidak dapat
                                                      dikembalikan.
                                                  </p>
                                              </div>
                                          </div>
                                          <div class="modal-footer">
                                              <button type="button" class="btn btn-light btn-sm"
                                                  data-dismiss="modal">Batal</button>
                                              <form action="" method="post"
                                                  class="d-inline">
                                                  @method('delete')
                                                  @csrf
                                                  <button class="btn btn-danger btn-sm" data-id="{{ $d->id }}">Hapus</button>
                                              </form>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              {{-- End of modal --}}
                              
                              
                      
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
        
            <!-- Modal Add -->
    <div class="modal fade" id="ModalAdd" tabindex="-1" aria-labelledby="titleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="titleModalLabel">Tambah User</h5>
                    <button type="button" class="close" data-dismiss="modal"
                                                  aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                              </button>
                </div>
                <div class="modal-body">
						<form action="" name="modal_popup" enctype="multipart/form-data" method="post">
              @csrf
					
						
							<div class="modal-footer">
								<button class="btn btn-success" type="submit">
									Add
								</button>
								<button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
									Cancel
								</button>
							</div>
						</form>
					</div>
            </div>
        </div>
    </div>

 
</div>
        <!-- /.container-fluid -->
      </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

<!-- ./wrapper -->
<!-- Page specific script -->
@section('script')
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
     
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
  $(document).on('click', '#btnAdd', function(){
    $("#ModalAdd").modal('show',{backdrop: 'true'});
  });
  
</script>

@endsection

@include('partials.admin-footer')