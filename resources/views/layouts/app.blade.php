<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

  <title>Bacata - Baca Berita Dong</title>

  <!-- Bootstrap core CSS -->
  <link href="{{asset('vendor1/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">


  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="{{asset('assets2/css/fontawesome.css')}}">
  <!-- <link rel="stylesheet" href="assets1/css/fontawesome-all.min.css"> -->
  <link rel="stylesheet" href="{{asset('assets2/css/templatemo-digimedia-v3.css')}}">
  <link rel="stylesheet" href="{{asset('assets2/css/animated.css')}}">
  <link rel="stylesheet" href="{{asset('assets2/css/owl.css')}}">
  <link rel="stylesheet" href="{{asset('assets1/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('assets1/css/ticker-style.css')}}">

</head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- Pre-header Starts -->
  <div class="pre-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-sm-8 col-7">
          <ul class="info">
            <li><a href="#"><i class="fa fa-envelope"></i>digimedia@gmail.com</a></li>
            <li><a href="#"><i class="fa fa-whatsapp"></i>0895388458497</a></li>
          </ul>
        </div>
        <div class="col-lg-4 col-sm-4 col-5">
          <ul class="social-media">
            <li><a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Pre-header End -->



  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="{{URL::to('/')}}" class="logo">
              <img src="{{('assets2/images/logo-v3.png')}}" alt="">
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav" id="okejekk">
              <li class="scroll-to-section"><a href="#top" class="active">Beranda</a></li>
              <li class="scroll-to-section"><a href="#blog">Berita</a></li>
              <li class="scroll-to-section"><a href="#kategori">Kategori</a></li>
              <li class="scroll-to-section"><a href="#contact">Kontak</a></li>
              <li class="scroll-to-section">
                <div class="border-first-button"><a href="{{URL::to('/login')}}">Login</a></div>
              </li>
            </ul>
            <a class='menu-trigger'>
              <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <div id="app">
    <main class="py-4">
        @yield('content')
    </main>
  </div>



  <footer>
    <!-- Footer Start-->
    <div class="footer-area footer-padding fix">
      <div class="container">
        <div class="row d-flex justify-content-between">
          <div class="col-xl-5 col-lg-5 col-md-7 col-sm-12 mt-60">
            <div class="single-footer-caption">
              <div class="single-footer-caption">
                <!-- logo -->
                <div class="footer-tittle">
                  <div class="footer-pera">
                    <h4>DIGI MEDIA</h4>
                    <p>Sebuah website yang berisi tentang berita terbaru dengan berbagai kategori berita. Berita yang ada sumbernya terpercaya dan akurat
                  </div>
                </div>
                <!-- social -->

              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-4  col-sm-6">
            <div class="single-footer-caption mt-60">
              <div class="footer-tittle">
                <h4>Maps</h4>
                <!-- Form -->
                <div class="footer-form">
                  <iframe
                  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63245.98363571293!2d110.33982527581509!3d-7.803163972653284!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a5787bd5b6bc5%3A0x21723fd4d3684f71!2sYogyakarta%2C%20Yogyakarta%20City%2C%20Special%20Region%20of%20Yogyakarta!5e0!3m2!1sen!2sid!4v1635952487609!5m2!1sen!2sid"
                    width="100%" height="206px" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-5 col-sm-6">
            <div class="single-footer-caption mb-50 mt-60">
              <div class="footer-tittle">
                <h4>Sosial Media</h4>
              </div>
              <div class="footer-social">
                <a href="#"><i class="fa fa-twitter" style="color: white;"></i></a>
                <a href="#"><i class="fa fa-instagram" style="color: white;"></i></a>
                <a href="#"><i class="fa fa-facebook" style="color: white;"></i></a>
                <a href="#"><i class="fa fa-whatsapp" style="color: white;"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- footer-bottom aera -->
    <div class="footer-bottom-area">
      <div class="container">
        <div class="footer-border">
          <div class="row d-flex align-items-center justify-content-between">
            <div class="col-lg">
              <div class="footer-copy-right">
                <p>
                  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                  Copyright &copy;
                  <script>document.write(new Date().getFullYear());</script> All rights reserved
                  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
    <!-- Footer End-->
  </footer>




  <!-- Scripts -->
  <script src="{{asset('vendor1/jquery/jquery.min.js')}}"></script>
   <script src="{{asset('vendor1/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
 <script src="{{asset('assets2/js/owl-carousel.js')}}"></script>
    <script src="{{asset('assets2/js/animation.js')}}"></script>
  <script src="{{asset('assets2/js/imagesloaded.js')}}"></script>
    <script src="{{asset('assets2/js/custom.js')}}"></script>
  <!-- Breaking New Pluging -->
 <script src="{{asset('assets1/js/jquery.ticker.js')}}"></script>
   <script src="{{asset('assets1/js/site.js')}}"></script>

  <!-- <script src="./assets1/js/vendor/jquery-1.12.4.min.js"></script> -->
    <script src="{{asset('assets1/js/popper.min.js')}}"></script>
 <script src="{{asset('assets1/js/bootstrap.min.js')}}"></script>

 <script src="https://kit.fontawesome.com/7de2ffd618.js" crossorigin="anonymous"></script>

  <!-- <script src="./assets1/js/main.js"></script> -->
     <script src="{{asset('assets1/js/jquery.scrollUp.min.js')}}"></script>

     <script>
    // Page loading animation
    $(window).on('load', function() {

    $('#js-preloader').addClass('loaded');

    });

     </script>

</body>

    
</body>
</html>
