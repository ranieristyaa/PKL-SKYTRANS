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
            <a href="/superadmin/home" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
                
              </p>
            </a>
          </li>
          <li class="nav-header">Kelola Data</li>
          <li class="nav-item">
            <a href="/superadmin/dataadmin" class="nav-link active">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Manajemen Akun
                
              </p>
            </a>
          </li>
          <li class="nav-item ">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-box-open"></i>
              <p>
              Data Stock Barang
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item ">
                <a href="/superadmin/stock/aviasi" class="nav-link" >
                  <i class="far fa-circle nav-icon"></i>
                  <p>Aviasi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/superadmin/stock/migas" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Migas</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item">
            <a href="/superadmin/rental" class="nav-link">
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
                <a href="/superadmin/pembelian/aviasi" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Aviasi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/superadmin/pembelian/migas" class="nav-link">
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
                <a href="/superadmin/mutasi/aviasi" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Aviasi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/superadmin/mutasi/migas" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Migas
                 
                  </p>
                  
                </a>
                
          </li>
          </ul>
          <li class="nav-header">Akun</li>
        <li class="nav-item">
            <a href="/superadmin/pengaturan_akun" class="nav-link">
              <i class="nav-icon fas fa-user-cog"></i>
              <p>
                Pengaturan Akun
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/superadmin/log" class="nav-link">
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
          <i class="fas fa-users"></i>
            <span>Manajemen Akun</span></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item active">Manajemen Akun</li>
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
                      <th>No.</th>
                      <th>Username</th>
                      <th>Email</th>
                      <th>Role</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($data as $index => $d)
                     <tr>
                      <td>{{ $index+1 }}</td>
                     
                      <td>{{ $d->name }}</td>
                      <td>{{ $d->email }}</td>
                      <td>@if($d->role_id === 1)
                            Super Admin
                          @else
                            Admin
                          @endif
                      </td>
                      <td style="text-align: center;">
                      <button class="btn btn-info" data-toggle="modal"  id="btnEdit-{{ $d->id }}"
                              data-target="modal-edit-{{ $d->id }}" style="font-size: 0.8rem; padding: 0.2rem 0.75rem;"><span><i class="fas fa-edit"></i></span>  Edit</button>
                      <button class="btn btn-danger" data-toggle="modal" id="btnDelete-{{ $d->id }}"
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
                                                  <p><b>Hapus akun pengguna "{{ $d->email }}"</b></p>
                                                  <p class="mb-0">Akun pengguna yang telah dihapus tidak dapat
                                                      dikembalikan.
                                                  </p>
                                              </div>
                                          </div>
                                          <div class="modal-footer">
                                              <button type="button" class="btn btn-light btn-sm"
                                                  data-dismiss="modal">Batal</button>
                                              <form action="/superadmin/dataadmin/{{ $d->id }}" method="post"
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
                              

                              {{-- Modal Edit --}}
                              <div class="modal fade bd-example-modal-sm" id="modal-edit-{{ $d->id }}" tabindex="-1" role="dialog"
                                  aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered" role="document">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <h4 class="modal-title" id="exampleModalLongTitle" style="font-size: 1.25rem;">
                                                  Edit Pengguna</h4>
                                              <button type="button" class="close" data-dismiss="modal"
                                                  aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                              </button>
                                              
                                          </div>
                                          <div class="modal-body">
                                            <form action="/superadmin/dataadmin/{{ $d->id }}" name="modal_popup" enctype="multipart/form-data" method="post">
                                            @method('PUT')  
                                            @csrf
                                              <div class="form-group" 
                                              @error('name') style="border: 1px solid rgb(255, 0, 0)" @enderror>
                                                <label for="name"><span class="fas fa-user"></span> Username</label>
                                                <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan username"
                                                 value= "{{ old('name') !== null ?  old('name') : "$d->name" }}" required>
                                                <span class="text-danger">
                                                  @error('name')
                                                    {{ $message }}
                                                  @enderror
                                                </span>
                                              </div>
                                              <div class="form-group"  
                                              @error('email') style="border: 1px solid rgb(255, 0, 0)" @enderror>
                                                <label for="email"><span class="fas fa-envelope"></span> Email</label>
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email"
                                                 value= "{{ old('email') !== null ? old('email') : "$d->email" }}" required>
                                                <span class="text-danger">
                                                  @error('email')
                                                    {{ $message }}
                                                  @enderror
                                                </span>
                                              </div>
                                              <div class="form-group"
                                              @error('role') style="border: 1px solid rgb(255, 0, 0)" @enderror>
                                                <label for="role_id"><span class="fas fa-users"></span> Role</label><br>
                                                <select name="role_id" id="role" class="form-control" style="width: 466px; margin-left:0;"  required>
                                                  <option value="" disabled selected>Choose role</option>
                                                  <option value="1" {{ $d->role_id == '1' ? 'selected' : '' }}>super admin</option>
                                                  <option value="2" {{ $d->role_id == '2' ? 'selected' : '' }}>admin</option>
                                                </select>
                                                <span class="text-danger">
                                                  @error('role_id')
                                                    {{ $message }}
                                                  @enderror
                                                </span>
                                              </div>
                                              <div class="form-group"
                                              @error('psw') style="border: 1px solid rgb(255, 0, 0)" @enderror>
                                                <label for="psw"><span class="fas fa-lock"></span> Password</label>
                                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" value="{{ old('password') }}" maxlength="15">
                                                <small class="form-text text-muted">Isi jika ingin melakukan perubahan password.</small>
                                                <span class="text-danger">
                                                  @error('password')
                                                    {{ $message }}
                                                  @enderror
                                                </span>
                                              </div>
                                              <div class="form-group"
                                              @error('psw') style="border: 1px solid rgb(255, 0, 0)" @enderror>
                                                <label for="psw_confirm"><span class="fas fa-lock"></span> Confirm Password</label>
                                                <input type="password" class="form-control" id="psw" name="password_confirmation" placeholder="Enter password" value="{{ old('password_confirm') }}"  maxlength="15">
                                                <span class="text-danger">
                                                  @error('password')
                                                    {{ $message }}
                                                  @enderror
                                                </span>
                                              </div>
                                            
                                              <div class="modal-footer">
                                                <button class="btn btn-success" type="submit">
                                                  Save
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
                    <h5 class="modal-title" id="titleModalLabel">Tambah Pengguna</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  <form action="/superadmin/dataadmin" name="modal_popup" enctype="multipart/form-data" method="post">
                  
                    @csrf
                    <div class="form-group" 
                    @error('name') style="border: 1px solid rgb(255, 0, 0)" @enderror>
                      <label for="name"><span class="fas fa-user"></span> Username</label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan username" value="{{ old('name') }}" required>
                      <span class="text-danger">
                        @error('name')
                          {{ $message }}
                        @enderror
                      </span>
                    </div>
                    <div class="form-group"  
                    @error('email') style="border: 1px solid rgb(255, 0, 0)" @enderror>
                      <label for="email"><span class="fas fa-envelope"></span> Email</label>
                      <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="{{ old('email') }}" required>
                      <span class="text-danger">
                        @error('email')
                          {{ $message }}
                        @enderror
                      </span>
                    </div>
                    <div class="form-group"
                    @error('role') style="border: 1px solid rgb(255, 0, 0)" @enderror>
                      <label for="role_id"><span class="fas fa-users"></span> Role</label><br>
                      <select name="role_id" id="role" class="form-control" style="width: 466px; margin-left:0;" required>
                        <option value="" disabled selected>Choose role</option>
                        <option value="1" {{ old('role_id') == '1' ? 'selected' : '' }}>super admin</option>
                        <option value="2" {{ old('role_id') == '2' ? 'selected' : '' }}>admin</option>
                      </select>
                      <span class="text-danger">
                        @error('role_id')
                          {{ $message }}
                        @enderror
                      </span>
                    </div>
                    <div class="form-group"
                    @error('password') style="border: 1px solid rgb(255, 0, 0)" @enderror>
                      <label for="psw"><span class="fas fa-lock"></span> Password</label>
                      <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" value="{{ old('password') }}" required maxlength="15">
                      <span class="text-danger">
                        @error('password')
                          {{ $message }}
                        @enderror
                      </span>
                    </div>
                    <div class="form-group"
                    @error('password') style="border: 1px solid rgb(255, 0, 0)" @enderror>
                      <label for="psw_confirm"><span class="fas fa-lock"></span> Confirm Password</label>
                      <input type="password" class="form-control" id="psw" name="password_confirmation" placeholder="Enter password" value="{{ old('password_confirm') }}" required maxlength="15">
                      <span class="text-danger">
                        @error('password')
                          {{ $message }}
                        @enderror
                      </span>
                    </div>
                  
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
            "timeOut":"30000",
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
      toastr.error("<b>Input gagal</b><br>Mohon cek kembali.")
    @endif
  });
  </script>
  @for ($i = 0; $i <= $d->id; $i++)
  <script>
  $(document).on('click', '#btnDelete-{{ $i }}', function(){
    $("#modal-delete-{{ $i }}").modal('show',{backdrop: 'true'});
  });
  $(document).on('click', '#btnEdit-{{ $i }}', function(){
    $("#modal-edit-{{ $i }}").modal('show',{backdrop: 'true'});
  });
  </script>
  @endfor

@endsection

@include('partials.admin-footer')
