@extends('layouts.main')
@section('content')
<body>
<!-- Header Area wrapper Starts -->
<header id="header-wrap">
  <!-- Navbar Start -->
  <nav class="navbar navbar-expand-md bg-inverse fixed-top scrolling-navbar">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <a href="/" class="navbar-brand"><h4 style="font-size: 1.25rem !important; font-weight:600;">SKYTRANS INDONESIA PERSADA</h4></a>       
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <i class="lni-menu"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto w-100 justify-content-end clearfix">
          <li class="nav-item active">
            <a class="nav-link" href="#hero-area">
              Home
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#services">
              Services
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="#testimonial">
              Projects
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">
              Sign in
            </a>
          </li>
          
        </ul>
      </div>
    </div>
  </nav>
  <!-- Navbar End -->

  <!-- Hero Area Start -->
  <div id="hero-area" class="hero-area-bg">
    <div class="container">      
      <div class="row">
        <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
          <div class="contents">
            <h2 class="head-title">THE BEST PARTNER AVIATION IN INDONESIA </h2>
            <p>PT. Skytrans Indonesia Persada is an independent provider of aviation services to commercial customers. We also the only one company from Indonesia who trusted by DOSAAF of Russia.</p>
            
          </div>
        </div>
        
      </div> 
    </div> 
  </div>
  <!-- Hero Area End -->

</header>
<!-- Header Area wrapper End -->





<!-- Features Section Start -->
<section id="services" class="section-padding">
  <div class="container" >
    <div class="section-header text-center">          
      <h2 class="section-title wow fadeInDown" data-wow-delay="0.3s">Services</h2>
      <div class="shape wow fadeInDown" data-wow-delay="0.3s"></div>
    </div>
    <div class="row" style="margin-left: 40px; ">
      <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
        <div class="content-left">
          <div class="shadow-lg box-item wow fadeInLeft" data-wow-delay="0.3s">
            <span class="icon">
            <i class="fa-solid fa-plane"></i>

            </span>
            <div class="text">
              <h4>Aircraft Leasing</h4>
              <p>Provide suitable aircraft for customer's operational needs.</p>
            </div>
          </div>
          <div class="shadow-lg box-item wow fadeInLeft" data-wow-delay="0.6s">
            <span class="icon">
              <i class="fa-solid fa-screwdriver-wrench"></i>
            </span>
            <div class="text">
              <h4>Aircraft Maintenance</h4>
              <p>Provide aircraft, engine, APU & component repair/overhaul services and replacement parts.</p>
            </div>
          </div>
          <div class="shadow-lg box-item wow fadeInLeft" data-wow-delay="0.9s">
            <span class="icon">
            <i class="fa-solid fa-file-circle-check"></i>
            </span>
            <div class="text">
              <h4>Aviation Consulting</h4>
              <p>Provide consultancy services for compliance with  DGCA CASR part 121, 135, and 145 and industry standard such IOSA.</p>
            </div>
          </div>
          <div class="shadow-lg box-item wow fadeInLeft" data-wow-delay="1.2s">
            <span class="icon">
            <i class="fa-solid fa-people-group"></i>
            </span>
            <div class="text">
              <h4>Aviation Specialist Provider</h4>
              <p>Provide support to customers looking for expert manpower in aviation.</p>
            </div>
          </div>
          
        </div>
      </div>
      <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >
        <div class="show-box wow fadeInUp" data-wow-delay="0.3s" >
          <img src="assets/img/heli.png" alt="" style="padding-left: 40px;" >
        </div>
      </div>
      <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
        <div class="content-right">
        <div class="shadow-lg box-item wow fadeInRight" data-wow-delay="0.3s">
            <span class="icon">
            <i class="fa-solid fa-hammer"></i>
            </span>
            <div class="text">
              <h4>Construction</h4>
              <p>Civil building contractor, airport and runway contractor.</p>
            </div>
          </div>
          <div class="shadow-lg box-item wow fadeInRight" data-wow-delay="0.6s">
            <span class="icon">
            <i class="fa-solid fa-helicopter"></i>
            </span>
            <div class="text">
              <h4>Sling Load and Fire Fighting</h4>
              <p>Transporting cargo via sling load to ensure firefighters have the support they need to fight a fire.</p>
            </div>
          </div>
          <div class="shadow-lg box-item wow fadeInRight" data-wow-delay="0.9s">
            <span class="icon-2">
            <i class="fa-solid fa-building-user"></i>
            </span>
            <div class="text">
              <h4>Developer Property</h4>
              <p>Developing property for profit.</p>
            </div>
          </div>
          <div class="shadow-lg box-item wow fadeInRight" data-wow-delay="1.2s">
            <span class="icon">
            <i class="fa-solid fa-laptop-file"></i>
            </span>
            <div class="text">
              <h4>ITE Consultants</h4>
              <p>Provide expert advice during technological projects.</p>
            </div>
          </div>
          <div class="shadow-lg box-item wow fadeInRight" data-wow-delay="1.2s">
            <span class="icon-2">
            <i class="fa-solid fa-user-shield"></i>
            </span>
            <div class="text">
              <h4>Security Guard</h4>
              <p>Provide protection for property.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Features Section End -->   





<!-- Testimonial Section Start -->
<section id="testimonial" class="testimonial section-padding">
  <div class="container">
  <div class="section-header text-center">          
      <h2 class="section-title-x wow fadeInDown" data-wow-delay="0.3s">Projects</h2>
      <div class="shape-x wow fadeInDown" data-wow-delay="0.3s"></div>
    </div>
    <div class="row justify-content-center">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div id="testimonials" class="owl-carousel wow fadeInUp" data-wow-delay="1.2s">
          <div class="item">
            <div class="testimonial-item">
              <div class="img-thumb">
                <img src="assets/img/testimonial/build.png" alt="">
              </div>
              <div class="info">
                <h2><a href="#">BUILD HELIPAD ON SEA</a></h2>
                
              </div>
              <div class="content">
                <p class="description">Build helipad above the sea on Samber Gelap Island.</p>
              
              </div>
            </div>
          </div>
          <div class="item">
            <div class="testimonial-item">
              <div class="img-thumb">
                <img src="assets/img/testimonial/boing.png" alt="">
              </div>
              <div class="info">
                <h2><a href="#">BOEING ENGINE</a></h2>
                
              </div>
              <div class="content">
                <p class="description">Engine for Boeing airplane.</p>
                
              </div>
            </div>
          </div>
          <div class="item">
            <div class="testimonial-item">
              <div class="img-thumb">
                <img src="assets/img/testimonial/bambi.png" alt="">
              </div>
              <div class="info">
                <h2><a href="#">BAMBI BUCKET 4000L</a></h2>
                
              </div>
              <div class="content">
                <p class="description">Bambi bucket for firefighting.</p>
                
              </div>
            </div>
          </div>
          <div class="item">
            <div class="testimonial-item">
              <div class="img-thumb">
                <img src="assets/img/testimonial/ff.png" alt="">
              </div>
              <div class="info">
                <h2><a href="#">FIRE FIGHTING</a></h2>
                
              </div>
              <div class="content">
                <p class="description">Helicopter are used to fight fire or support firefighters on the ground.</p>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Testimonial Section End -->



<!-- Footer Section Start -->
<footer id="footer" class="footer-area section-padding">
  <div class="container">
    <div class="container">
      <div class="row">
        
        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
          <h3 class="footer-titel">Contact</h3>
          <ul class="address">
            <li>
              <a href="#"><i class="lni-map-marker"></i> Mutiara, Gading timur, RT.003/RW.024, Mustika Jaya, <br>Kec. Mustika Jaya, Kota Bks, Jawa Barat 17158</a>
            </li>
            
            <li>
              <a href="#"><i class="lni-envelope"></i> indonesiaskytrans@gmail.com</a>
            </li>
          </ul>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
          <div class="mapouter"><div class="gmap_canvas"><iframe width="331" height="294" id="gmap_canvas" src="https://maps.google.com/maps?q=PT.%20SKYTRANS%20INDONESIA%20PERSADA,%20Mutiara,%20Gading%20timur,%20RT.003/RW.024,%20Mustika%20Jaya,%20Kec.%20Mustika%20Jaya,%20Kota%20Bks,%20Jawa%20Barat%2017158&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://123movies-to.org">123movies</a><br><style>.mapouter{position:relative;text-align:right;height:294px;width:331px;}</style><a href="https://www.embedgooglemap.net"></a><style>.gmap_canvas {overflow:hidden;background:none!important;height:294px;width:331px;}</style></div></div>
        </div>
          </div>
    </div>  
  </div> 
  <div id="copyright">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="copyright-content">
            <p>Copyright © 2023 <a rel="nofollow"></p>
          </div>
        </div>
      </div>
    </div>
  </div>   
</footer> 
<!-- Footer Section End -->

<!-- Go to Top Link -->
<a href="#" class="back-to-top">
  <i class="lni-arrow-up"></i>
</a>

<!-- Preloader -->
<div id="preloader">
  <div class="loader" id="loader-1"></div>
</div>
<!-- End Preloader -->

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="assets/js/jquery-min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/wow.js"></script>
<script src="assets/js/jquery.nav.js"></script>
<script src="assets/js/scrolling-nav.js"></script>
<script src="assets/js/jquery.easing.min.js"></script>  
<script src="assets/js/main.js"></script>
<script src="assets/js/form-validator.min.js"></script>
<script src="assets/js/contact-form-script.min.js"></script>
  
</body>

@endsection