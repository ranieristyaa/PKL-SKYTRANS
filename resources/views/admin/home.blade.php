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
            <a href="/admin/home" class="nav-link active">
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
          <i class="fas fa-home"></i>
            <span>Dashboard</span></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    
    

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
      @if (session()->has('successLogin'))
      <div class="alert alert-success alert-dismissible" role="alert" style="background-color: #D3EBCD; color: black;">
        {{ session('successLogin') }}
        @php
        session()->forget('successLogin')
        @endphp
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     @endif
      <div class="row">
        
          <div class="col-lg-8">
            <div class="shadow-lg card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title" style="font-weight: 700;">Pembelian Barang</h3>
             
                </div>
              </div>
              <br>
              <div class="card-body" style="padding: 0rem 2rem 1.2rem 1.5rem;">
                
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                  <canvas id="visitors-chart" height="350"></canvas>
                </div>

               
              </div>
              
            </div>
           
            
          </div>
    
          <!-- /.col-md-6 -->
          <div class="col-lg">
            
            <!-- /.card -->
            <div class="shadow-lg info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user"></i></span>
              <div class="info-box-content">
              <span class="info-box-text">Total User</span>
              <span class="info-box-number">{{ \DB::table('users')->count('id') }}</span>
              </div>
            </div>
            <div class="shadow-lg info-box mb-3">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-plane"></i></span>
              <div class="info-box-content">
              <span class="info-box-text">Total Barang Aviasi</span>
              <span class="info-box-number">{{ \DB::table('aviasi_stocks')->count() }}</span>
              </div>
            </div>
            <div class="shadow-lg info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-tools"></i></span>
              <div class="info-box-content">
              <span class="info-box-text">Total Barang Migas</span>
              <span class="info-box-number">{{ \DB::table('migas_stocks')->sum('quantity') }}</span>
              </div>
            </div>
            @foreach($data3 as $d)
              @php $x = $d->jm @endphp
            @endforeach
            @foreach($data1 as $d)
            
            <div class="shadow-lg info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-tools"></i></span>
              <div class="info-box-content">
              <span class="info-box-text">Total Barang Masuk Minggu Ini</span>
              <span class="info-box-number">{{ $d->jum_msk !== null ? $d->jum_msk : 0}} barang Aviasi dan {{ $x != null ? $x : 0 }} barang Migas</span>
              </div>
            </div>
            
           @endforeach
           @foreach($data4 as $d)
              @php $y = $d->jk @endphp
            @endforeach
           @foreach($data2 as $d)
            <div class="shadow-lg info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-tools"></i></span>
              <div class="info-box-content">
              <span class="info-box-text">Total Barang Keluar Minggu Ini</span>
              
              <span class="info-box-number">{{ $d->jum_msk !== null ? $d->jum_msk : 0 }} barang Aviasi dan {{ $y }} barang Migas</span>
              </div>
            </div>
           @endforeach
            
            
            

          </div>
          <!-- /.col-md-6 -->
        </div>
      <div class="row">
      
                  <div class="col-lg-4">
                  <div class="shadow-lg card" >
              <div class="card-header border-0" style="background-color: gray; color: white;">
                <h3 class="card-title">Overview Stock Aviasi</h3>

              </div>
              <div class="card-body">
                @php
                  $a = \DB::table('aviasi_stocks')->latest('created_at')->first();
                  $b = \DB::table('aviasi_stocks')->latest('updated_at')->first();
                  $c = \DB::table('activity_log')->where('log_name', 'Aviasi Stock')->where('event', '=', 'deleted')->orderBy('created_at', 'desc')->first();
                  if( $c != null)
                     $d = json_decode($c->properties);
                @endphp
              
                 
               
                <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                  <p class="text-success text-xl">
                    <i class="far fa-plus-square" style="color: gray;"></i>
                  </p>
                  
                  <p class="d-flex flex-column text-right">
                    <span class="font-weight-bold">
                       Terakhir Ditambahkan
                    </span>
                    <span class="text-info">{{ $a == null ? '-' : $a->name }}</span>
                  </p>
                </div>
                <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                  <p class="text-success text-xl">
                    <i class="far fa-clock" style="color: gray;"></i>
                  </p>
                  
                  <p class="d-flex flex-column text-right">
                    <span class="font-weight-bold">
                       Terakhir Diperbarui
                    </span>
                    <span class="text-info">{{ $b == null ? '-' : $b->name }}</span>
                  </p>
                </div>
                <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                  <p class="text-success text-xl">
                    <i class="fas fa-trash" style="color: gray;"></i>
                  </p>
                  
                  <p class="d-flex flex-column text-right">
                    <span class="font-weight-bold">
                       Terakhir Dihapus
                    </span>
                    <span class="text-info">{{ $d == null ? $d->old->name : '-' }}</span>
                  </p>
                </div>
                
           
                
              </div>
            </div>
                  </div>
                  <div class="col-lg-4">
                  <div class="shadow-lg card">
              <div class="card-header border-0" style="background-color: gray; color: white;">
                <h3 class="card-title">Overview Stock Migas</h3>

              </div>
              <div class="card-body">
                @php
                  $a = \DB::table('migas_stocks')->latest('created_at')->first();
                  $b = \DB::table('migas_stocks')->latest('updated_at')->first();
                  $x = \DB::table('activity_log')->where('log_name', 'Migas Stock')->where('event', '=', 'deleted')->orderBy('created_at', 'desc')->first();
                  if ($x != null)
                    $z = json_decode($x->properties);
                @endphp
              
                 
               
                <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                  <p class="text-success text-xl">
                    <i class="far fa-plus-square" style="color: gray;"></i>
                  </p>
                  
                  <p class="d-flex flex-column text-right">
                    <span class="font-weight-bold">
                       Terakhir Masuk
                    </span>
                    <span class="text-info">{{ $a == null ? '-' : $a->name }}</span>
                  </p>
                </div>
                <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                  <p class="text-success text-xl">
                    <i class="far fa-clock" style="color: gray;"></i>
                  </p>
                  
                  <p class="d-flex flex-column text-right">
                    <span class="font-weight-bold">
                       Terakhir Diperbarui
                    </span>
                    <span class="text-info">{{ $b == null ? '-' : $b->name }}</span>
                  </p>
                </div>
                <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                  <p class="text-success text-xl">
                    <i class="fas fa-trash" style="color: gray;"></i>
                  </p>
                  
                  <p class="d-flex flex-column text-right">
                    <span class="font-weight-bold">
                       Terakhir Dihapus
                    </span>
                    <span class="text-info">{{ isset($z) ? $z->old->name : '-' }}</span>
                  </p>
                </div>
                
           
                
              </div>
              
              
          <!-- ./col -->
        </div>
        
        
        <!-- /.row -->
      </div>
      <div class="col-lg-4">
      <div class="card">
<div class="card-header">
<h3 class="card-title">Log Aktivitas</h3>
<div class="card-tools">

</div>
</div>

<div class="card-body p-0" style="display: block;">
<ul class="products-list product-list-in-card  pr-2" >
@if($data5->count() == 0)
  <li class="item">
<div class="product-info" style="margin-left: 0;" >
<center>
  <a href="javascript:void(0)" class="product-title">No data.</a>
</center>

</div>
</li>

@endif
@foreach($data5->take(5) as $d)
<li class="item">
<div class="product-info" style="margin-left: 20px;">
<a href="javascript:void(0)" class="product-title">{{ $d->description }}
<span class="badge float-right {{ $d->log_name == 'Aviasi Stock' ? 'badge-info' : 'badge-success' }}">{{ $d->log_name == 'Aviasi Stock' ? 'Aviasi' : 'Migas' }}</span></a>
<span class="product-description">
@php
$en = json_decode($d->properties);
@endphp
{{ $d->created_at }}
</span>
</div>
</li>
@endforeach








</ul>
</div>

<div class="card-footer text-center" style="display: block;">
<a href="/admin/log" class="uppercase">Lihat Semua Log</a>
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

  
</div>
<!-- ./wrapper -->
@php

$a = array();
for($i=0;$i<=12;$i++){
  $a[] = \DB::table('aviasi_purchases')->whereMonth('date', $i+1)->sum('price');

}

$m = array();
for($i=0;$i<=12;$i++){
  $m[] = \DB::table('migas_purchases')->whereMonth('date', $i+1)->sum('total_price');

}

@endphp

@section('script')
<script>
$(function () {
   var $visitorsChart = $('#visitors-chart')
  // eslint-disable-next-line no-unused-vars
  var visitorsChart = new Chart($visitorsChart, {
    type: 'line',
    data: {
      labels: ['Januari', 'Febuari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', ' Oktober', 'November', 'Desember'],
      datasets: [{
        data: [{{ $m[0] }}, {{ $m[1] }}, {{ $m[2] }}, {{ $m[3] }}, {{ $m[4] }}, {{ $m[5] }}, {{ $m[6] }}, {{ $m[7] }}, {{ $m[8] }}, {{ $m[9] }}, {{ $m[10] }}, {{ $m[11] }}, {{ $m[12] }}],
        label: 'barang migas',
        borderColor: '#3e95cd',
        fill: false,
        // pointHoverBackgroundColor: '#007bff',
        // pointHoverBorderColor    : '#007bff'
      },
      {
        data: [{{ $a[0] }},{{ $a[1] }}, {{ $a[2] }}, {{ $a[3] }}, {{ $a[4] }}, {{ $a[5] }}, {{ $a[6] }}, {{ $a[7] }}, {{ $a[8] }}, {{ $a[9] }}, {{ $a[10] }}, {{ $a[11] }}, {{ $a[12] }}],
        label: 'barang aviasi',
        borderColor: 'orange',
        fill: false,
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: {
          position: 'top',
        },
        title: {
          display: true,
          text: 'Chart.js Line Chart'
        }
      },
      scales: {
        xAxes: [{
          display: true,
          scaleLabel: {
              display: true,
              labelString: 'Bulan'
          }
      }],
  yAxes: [{
          display: true,
          ticks: {
              beginAtZero: true,
              steps: 10,
              stepValue: 5,
              max: 5000000
          },
          scaleLabel: {
            display: true,
            labelString: 'Total Pengeluaran (Rp)'
        }
      }]
      }
    }
  })
})
</script>
@endsection
@include('partials.admin-footer')
