 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
     

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
          
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item" >
            <!-- Message Start -->
            <center><div class="image">
              <img src="{{ url('dist/img/user.jpg') }}" class="img-circle elevation-2" alt="User Image" style="height: 40px; width: 40px;">
            </div>
            {{ auth()->user()->name }}</center>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <center><a class="dropdown-item dropdown-footer" href="/superadmin/pengaturan_akun" style="color: blue;"><i class="nav-icon fas fa-user-cog" ></i> Pengaturan Akun</a></center> 
          <div class="dropdown-divider"></div>
         <center><a class="dropdown-item dropdown-footer" href="/superadmin/log" style="color: blue;"><i class="nav-icon fas fa-history" ></i> Log Pengguna</a></center> 
          <div class="dropdown-divider"></div>
          <form method="POST" action="{{ route('logout') }}">
          @csrf
          <a href="route('logout')" class="dropdown-item dropdown-footer" style="color: blue;"  onclick="event.preventDefault();
                                                this.closest('form').submit();"><i class="nav-icon fas fa-sign-out-alt" ></i> Sign Out</a>
          </form>
        </div>
      </li>


    </ul>
  </nav>
  <!-- /.navbar -->