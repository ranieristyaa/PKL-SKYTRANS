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
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" name="menu" data-accordion="false">
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
            <a href="/superadmin/dataadmin" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
              Manajemen Akun
                
              </p>
            </a>
          </li>
          <li class="nav-item">
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
            <a href="/superadmin/rental" class="nav-link active">
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
          <i class="fas fa-clipboard-list"></i>
            <span>Data Peminjaman Barang Aviasi</span></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item">Data Peminjaman</li>
              <li class="breadcrumb-item active">Aviasi</li>
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
                
                <div class="category-filter"  >
                <select id="categoryFilter" class="form-control" >
                <option value="x" disabled >Filter by Name</option>
                <option value="">Show All</option>
                    @foreach ($data as $d)
                    <option value="{{ $d->name }}">{{ $d->name }}</option>
                    @endforeach
                </select>
                </div>
                <table id="example1" class="table table-bordered table-hover" >
                    <thead>
                    <tr>
                      <th>No.</th>
                      <th>Tanggal</th>
                      <th>Nama Barang</th>
                      <th>Jumlah</th>
                      <th>Harga</th>
                      <th>Jangka Waktu</th>
                      <th>Penyewa</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($data as $index => $d)
                    <tr>
                      <td>{{ $index+1 }}</td>
                      <td>{{ $d->date }}</td>
                      <td>{{ $d->name }}</td>
                      <td>{{ $d->quantity }}</td>
                      <td>{{ $d->price }}</td>
                      <td>{{ $d->time }}</td>
                      <td>{{ $d->rent }}</td>
                      <td style="text-align: center;">
                      <button class="btn btn-info" data-toggle="modal"  id="btnEdit-{{ $d->id }}"
                      data-target="modal-edit-{{ $d->id }}" style="font-size: 0.8rem; padding: 0.2rem 0.75rem;"><span><i class="fas fa-edit"></i></span>  Edit</button>
                      <button class="btn btn-danger" data-toggle="modal" id="btnDelete-{{ $d->id }}"
                              data-target="modal-delete-{{ $d->id }}" style="font-size: 0.8rem; padding: 0.2rem 0.75rem;"><span><i class="fas fa-trash"></i></span> Hapus</button>
                      
                      </td>

                      {{-- Modal Decline --}}
                              <div class="modal fade bd-example-modal-sm" id="modal-delete-{{ $d->id }}" tabindex="-1" name="dialog"
                                  aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered" name="document">
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
                                                  <p><b>Hapus barang"{{ $d->name }}"</b></p>
                                                  <p class="mb-0">Data yang sudah dihapus tidak dapat dikembalikan.
                                                  </p>
                                              </div>
                                          </div>
                                          <div class="modal-footer">
                                              <button type="button" class="btn btn-light btn-sm"
                                                  data-dismiss="modal">Batal</button>
                                              <form action="/superadmin/rental/{{ $d->id }}" method="post"
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


                      <div class="modal fade" id="modal-edit-{{ $d->id }}" tabindex="-1" aria-labelledby="titleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="titleModalLabel">Edit Barang Aviasi</h5>
                                    <button type="button" class="close" data-dismiss="modal"
                                                                  aria-label="Close">
                                                                  <span aria-hidden="true">&times;</span>
                                                              </button>
                                </div>
                                <div class="modal-body">
                            <form action="/superadmin/rental/{{ $d->id }}" name="modal_popup" enctype="multipart/form-data" method="post">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-group"  
                                    @error('date') style="border: 1px solid rgb(255, 0, 0)" @enderror>
                                      <label for="date"><span class="fas fa-pencil-alt"></span> Keterangan</label>
                                      <input type="date" class="form-control" id="date" name="date" placeholder="Masukkan tanggal" 
                                      value= "{{ old('date') !== null ?  old('date') : "$d->date" }}" >
                                      <span class="text-danger">
                                        @error('date')
                                          {{ $message }}
                                        @enderror
                                      </span>
                                    </div>
                                    <div class="form-group"
                                              @error('name') style="border: 1px solid rgb(255, 0, 0)" @enderror>
                                                <label for="name_id"><span class="fas fa-box"></span> Nama Barang</label><br>
                                                <select name="name" id="name" class="form-control"  required style="width: 466px; margin-left:0;">
                                                  <option value="" disabled selected>Pilih barang</option>
                                                  @foreach($stock as $s)
                                                  <option value="{{ $s->name }}" {{ old('name') == '$s->name' ? 'selected' : '' }}>{{ $s->name }}</option>
                                                  @endforeach
                                                </select>
                                                <span class="text-danger">
                                                  @error('name')
                                                    {{ $message }}
                                                  @enderror
                                                </span>
                                              </div>
                          
                                    <div class="form-group"
                                    @error('quantity') style="border: 1px solid rgb(255, 0, 0)" @enderror>
                                      <label for="quantity"><span class="fas fa-calculator"></span> Jumlah</label>
                                      <input type="number" min="1" class="form-control" id="quantity" name="quantity" placeholder="Masukkan jumlah" 
                                      value= {{ old('quantity') !== null ?  old('quantity') : "$d->quantity" }} required>
                                      <span class="text-danger">
                                        @error('quantity')
                                          {{ $message }}
                                        @enderror
                                      </span>
                                    </div>
                                    <div class="form-group"  
                                    @error('price') style="border: 1px solid rgb(255, 0, 0)" @enderror>
                                      <label for="price"><span class="fas fa-money-bill-alt"></span> Harga</label>
                                      <input type="number" min="1000" class="form-control" id="price" name="price" placeholder="Masukkan harga" 
                                      value="{{ old('price') !== null ?  old('price') : "$d->price" }}" >
                                      <span class="text-danger">
                                        @error('')
                                          {{ $message }}
                                        @enderror
                                      </span>
                                    </div>
                                    <div class="form-group"  
                                    @error('time') style="border: 1px solid rgb(255, 0, 0)" @enderror>
                                      <label for="time"><span class="fas fa-pencil-alt"></span> Keterangan</label>
                                      <input type="text" class="form-control" id="time" name="time" placeholder="Masukkan keterangan" 
                                      value= "{{ old('time') !== null ?  old('time') : "$d->time" }}" >
                                      <span class="text-danger">
                                        @error('time')
                                          {{ $message }}
                                        @enderror
                                      </span>
                                    </div>
                                    <div class="form-group"  
                                    @error('renter') style="border: 1px solid rgb(255, 0, 0)" @enderror>
                                      <label for="renter"><span class="fas fa-pencil-alt"></span> Keterangan</label>
                                      <input type="text" class="form-control" id="renter" name="renter" placeholder="Masukkan keterangan" 
                                      value= "{{ old('renter') !== null ?  old('renter') : "$d->renter" }}" >
                                      <span class="text-danger">
                                        @error('renter')
                                          {{ $message }}
                                        @enderror
                                      </span>
                                    </div>
                                    <div class="form-group" style="display: none;">
                                      <label for="old"><span class="fas fa-calculator"></span> Jumlah</label>
                                      <input type="number" min="1" class="form-control" id="old" name="old" placeholder="Masukkan jumlah" 
                                      value= "{{ $d->quantity }}" required>
                                     
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
                    <h5 class="modal-title" id="titleModalLabel">Tambah Barang Aviasi</h5>
                    <button type="button" class="close" data-dismiss="modal"
                                                  aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                              </button>
                </div>
                <div class="modal-body">
						<form action="/superadmin/rental" name="modal_popup" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="form-group"  
                    @error('date') style="border: 1px solid rgb(255, 0, 0)" @enderror>
                      <label for="date"><span class="fas fa-pencil-alt"></span> Tanggal</label>
                      <input type="date" class="form-control" id="date" name="date" placeholder="Masukkan Tanggal" value="{{ old('date') }}" required>
                      <span class="text-danger">
                        @error('date')
                          {{ $message }}
                        @enderror
                      </span>
                    </div>
                    <div class="form-group"
                                              @error('name') style="border: 1px solid rgb(255, 0, 0)" @enderror>
                                                <label for="name_id"><span class="fas fa-box"></span> Nama Barang</label><br>
                                                <select name="name" id="name" class="form-control"  required style="width: 466px; margin-left:0;">
                                                  <option value="" disabled selected>Pilih barang</option>
                                                  @foreach($stock as $s)
                                                  <option value="{{ $s->name }}" {{ old('name') == '$s->name' ? 'selected' : '' }}>{{ $s->name }}</option>
                                                  @endforeach
                                                </select>
                                                <span class="text-danger">
                                                  @error('name')
                                                    {{ $message }}
                                                  @enderror
                                                </span>
                                              </div>
                    
          
                    <div class="form-group"
                    @error('quantity') style="border: 1px solid rgb(255, 0, 0)" @enderror>
                      <label for="quantity"><span class="fas fa-calculator"></span> Jumlah</label>
                      <input type="number" min="1" class="form-control" id="quantity" name="quantity" placeholder="Masukkan jumlah" value="{{ old('quantity') }}" required >
                      <span class="text-danger">
                        @error('quantity')
                          {{ $message }}
                        @enderror
                      </span>
                    </div>
                    <div class="form-group"  
                    @error('price') style="border: 1px solid rgb(255, 0, 0)" @enderror>
                      <label for="price"><span class="fas fa-money-bill-alt"></span> Harga</label>
                      <input type="number" min="1000" class="form-control" id="price" name="price" placeholder="Masukkan harga" value="{{ old('price') }}" >
                      <span class="text-danger">
                        @error('price')
                          {{ $message }}
                        @enderror
                      </span>
                    </div>
                    <div class="form-group"  
                    @error('time') style="border: 1px solid rgb(255, 0, 0)" @enderror>
                      <label for="time"><span class="fas fa-clock"></span> Jangka Waktu</label>
                      <input type="number" class="form-control" id="time" name="time" placeholder="Masukkan jangka waktu peminjaman (hari)" value="{{ old('time') }}" >
                      <span class="text-danger">
                        @error('time')
                          {{ $message }}
                        @enderror
                      </span>
                    </div>
                    <div class="form-group"  
                    @error('renter') style="border: 1px solid rgb(255, 0, 0)" @enderror>
                      <label for="renter"><span class="fas fa-user"></span> Penyewa</label>
                      <input type="text" class="form-control" id="renter" name="renter" placeholder="Masukkan keterangan" value="{{ old('renter') }}" >
                      <span class="text-danger">
                        @error('renter')
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
            title: 'Aviasi Rental',
              text: '<span><i class="fas fa-print"></i></span>  Print',
              exportOptions: {
                columns: [0, 1, 2, 3, 4, 5, 6]
              }
          },
          {
              extend: 'excel',
              
              title: 'Aviasi Rental',
              text: '<span><i class="fas fa-download"></i></span>  Download as Excel',
              exportOptions: {
                columns: [0, 1, 2, 3, 4, 5, 6]
              }
          }
          ]
        }
      }).buttons().container().appendTo('#example1_wrapper .row .col-sm-12:eq(2)');
      $(".dt-buttons").css("margin-top", "20px");
      //Get a reference to the new datatable
      var table = $('#example1').DataTable();
      //Take the category filter drop down and append it to the datatables_filter div. 
      //You can use this same idea to move the filter anywhere withing the datatable that you want.
      $("#example1_filter.dataTables_filter").append($("#categoryFilter"));
      
      //Get the column index for the Category column to be used in the method below ($.fn.dataTable.ext.search.push)
      //This tells datatables what column to filter on when a user selects a value from the dropdown.
      //It's important that the text used here (Category) is the same for used in the header of the column to filter
      var categoryIndex = 0;
      $("#example1 th").each(function (i) {
        if ($($(this)).html() == "Nama Barang") {
          categoryIndex = i; return false;
        }
      });
      //Use the built in datatables API to filter the existing rows by the Category column
      $.fn.dataTable.ext.search.push(
        function (settings, data, dataIndex) {
          var selectedItem = $('#categoryFilter').val()
          var category = data[categoryIndex];
          if (selectedItem === "" || category.includes(selectedItem) || selectedItem === "x" ) {
            return true;
          }
          return false;
        }
      );
      //Set the change event for the Category Filter dropdown to redraw the datatable each time
      //a user selects a new filter.
      $("#categoryFilter").change(function (e) {
        table.draw();
      });
      table.draw();
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
@if(isset($d))
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
  @endif
@endsection

@include('partials.admin-footer')
