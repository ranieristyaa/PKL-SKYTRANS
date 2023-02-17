
@extends('layouts.main')
@section('content')
<body>
<!-- Header Area wrapper Starts -->
<header id="header-wrap">
  <!-- Navbar Start -->
  <nav class="navbar navbar-expand-md bg-inverse fixed-top scrolling-navbar">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <a href="/" class="navbar-brand"><h4 style="font-size: 1.25rem !important; font-weight:600;"">SKYTRANS INDONESIA PERSADA</h4></a>       
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <i class="lni-menu"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto w-100 justify-content-end clearfix">
          <li class="nav-item">
            <a class="nav-link" href="/">
              Home
            </a>
          </li>
          

          <li class="nav-item active">
            <a class="nav-link" href="{{ route('login') }}">
              Sign in
            </a>
          </li>
          
        </ul>
      </div>
    </div>
  </nav>
  <!-- Navbar End -->

  

</header>

<section class="background-radial-gradient overflow-hidden" >
  <style>
    .gradient-custom{
      position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 2;
  width: 80%;
  padding: 20px;
  text-align: center;
    }
    
    
    #radius-shape-1 {
      height: 220px;
      width: 220px;
      top: -60px;
      left: -130px;
      background: radial-gradient(#44006b, #ad1fff);
      overflow: hidden;
    }

    #radius-shape-2 {
      border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
      bottom: -60px;
      right: -110px;
      width: 300px;
      height: 300px;
      background: radial-gradient(#44006b, #ad1fff);
      overflow: hidden;
    }

    .bg-glass {
      background-color: hsla(0, 0%, 100%, 0.9) !important;
      backdrop-filter: saturate(200%) blur(25px);
    }
  </style>
  <div class="bg-image">
    <style>
    .bg-image {
      background-image: url('assets/img/heli2bg.jpg');
      filter: blur(10px);
     -webkit-filter: blur(10px);
     height: 90%;
     background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    }
    </style>
  </div>

  

<section class=" gradient-custom" >
  <div class="container">
    <div class="row d-flex justify-content-center align-items-center" style="height:500px;">
      <div class=" col-12 col-md-8 col-lg-4 col-xl-5" style="width: 450px; height:500px; border-color: white ;">
        <div class="shadow-lg card  text-white" style="border-radius: 1rem;  background-color: #0A2647; border-color: white !important; width: 450px; height:500px;">
          <div class="card-body text-center">

            <div class="mb-md-5 mt-md-4 pb-5">
             
              <h2 class="fw-bold mb-2 text-uppercase" style="color: #BFEAF5; font-size: 1.5rem;">Sign In</h2> <br>
              <form id="contactForm" method="POST" action="{{ route('login') }}">
              @csrf
              <div class="form-group">
                <div class="form-outline form-white mb-4">
                  <input type="email" id="email" name="email" class="form-control form-control-lg"  value='{{ old('email') }}' autofocus required/>
                  <label class="form-label" for="email">Email</label>
                
                </div>
                <span class="text-danger">
                  <small>
                    @error('email')
                            {{ $message }}
                          @enderror
                  </small>
                        </span>
              </div>
              
              <div class="form-group">
                <div class="form-outline form-white mb-4">
                <input type="password" id="password" name="password" class="form-control form-control-lg"  autocomplete="off" required/>
                <label class="form-label" for="password">Password</label>
                
              </div>
              <span class="text-danger text-left">
                <small>
                    @error('password')
                                {{ $message }}
                    @enderror
                    @if (session()->has('loginError'))
                        
                            {{ session('loginError') }}
                        
                    @endif
                </small>
                          
                        </span>
              </div>
              

              <p class="small mb-5 pb-lg-2"><a class="text-blue-50" href="#!">Forgot password?</a></p>

              <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>
              </form>
              

            </div>

            

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</section>
<footer>
  <div id="copyright" >
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="copyright-content" style="margin-top: 0; ">
            <p >Copyright © 2023 <a rel="nofollow"></p>
          </div>
        </div>
      </div>
    </div>
  </div> 
</footer>






