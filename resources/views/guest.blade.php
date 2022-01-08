@extends('layouts.app')

@section('content')
<div class="h-100 my-2 d-flex justify-content-center align-items-center border-bottom py-3">
    
 
  </div>

  <div id="blog" class="trending-area fix  wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
    <div class="container" style="margin-top: 58px;">
      <div class="trending-main">
        <!-- Trending Tittle -->
        <div class="row">
          <div class="col-lg-12">
            <div class="trending-tittle">
              <strong>Berita Terbaru</strong>
              <!-- <p>Rem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
              <div class="trending-animated">
                <ul id="js-news" class="js-hidden">
                  <li class="news-item">Selamat datang di website berita kami...</li>
                  <li class="news-item">Berita yang akurat, menarik dan terpercaya</li>
                  <li class="news-item">Semoga bermanfaat...</li>
                </ul>
              </div>
              <div class="col-xl-2 col-lg-2 col-md-4">
                <div class="header-right-btn f-right d-none d-lg-block">
                  <i class="fa fa-search special-tag" style="cursor: pointer;"></i>
                  <div class="search-box">
                    <form action="#">
                      <input type="text" placeholder="Search">

                    </form>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-8">
            <!-- Trending Top -->
            <div class="trending-top mb-30">
              <div class="trend-top-img">
                <div id="demo" class="carousel slide" data-ride="carousel">
                  <!-- Indicators -->
                  <ul class="carousel-indicators">
                    <li data-target="#demo" data-slide-to="0" class="active"></li>
                    <li data-target="#demo" data-slide-to="1"></li>
                    <li data-target="#demo" data-slide-to="2"></li>
                  </ul>

                  <!-- The slideshow -->
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img src="" alt=""> <!-- gambar ada di style.css cuy cari ae carousel item -->
                      <div class="trend-top-cap" style="z-index: 1;">
                        <span>Kesehatan</span>
                        <h2 id="siniaja"><a href="details.html">Welcome To The Best Model Winner<br> Contest At Look of the year</a></h2>
                      </div>
                    </div>
                    <div class="carousel-item">
                      <img style="height: 400px" src="assets1/img/blog/single_blog_2.png" alt="Los Angeles">
                      <div class="trend-top-cap" style="z-index: 1;">
                        <span>Olahraga</span>
                        <h2><a href="details.html">Mantap pokoke year</a></h2>
                      </div>
                    </div>
                    <div class="carousel-item">
                      <img style="height: 400px" src="assets1/img/blog/single_blog_4.png" alt="Los Angeles">
                      <div class="trend-top-cap" style="z-index: 1;">
                        <span>Olahraga</span>
                        <h2><a href="details.html">hem hem hem hem</a></h2>
                      </div>
                    </div>
                  </div>


                  <!-- Left and right controls -->
                  <a class="carousel-control-prev" href="#demo" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                  </a>
                  <a class="carousel-control-next" href="#demo" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                  </a>
                </div>
              </div>
            </div>
            <!-- Trending Bottom -->
            <div class="trending-bottom">
              <div class="row">
                <div class="col-lg-4">
                  <div class="single-bottom mb-35">
                    <div class="trend-bottom-img mb-30">
                      <img src="assets1/img/trending/trending_bottom1.jpg" alt="">
                    </div>
                    <div class="trend-bottom-cap">
                      <span class="color1">Olahraga</span>
                      <h4><a href="details.html">Indonesia mendapatkan sanksi</a></h4>
                      <p style="margin-top: 5px; font-weight: bold;">24-Des-2021 </p>
                      <p style="margin-top: -5px;">Lorem, ipsum dolor sit amet consectetur adipisicing elit... </p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="single-bottom mb-35">
                    <div class="trend-bottom-img mb-30">
                      <img src="assets1/img/trending/trending_bottom2.jpg" alt="">
                    </div>
                    <div class="trend-bottom-cap">
                      <span class="color1">Olahraga</span>
                      <h4><a href="details.html">Indonesia mendapatkan sanksi</a></h4>
                      <p style="margin-top: 5px; font-weight: bold;">24-Des-2021 </p>
                      <p style="margin-top: -5px;">Lorem, ipsum dolor sit amet consectetur adipisicing elit... </p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="single-bottom mb-35">
                    <div class="trend-bottom-img mb-30">
                      <img src="assets1/img/trending/trending_bottom3.jpg" alt="">
                    </div>
                    <div class="trend-bottom-cap">
                      <span class="color1">Olahraga</span>
                      <h4><a href="details.html">Indonesia mendapatkan sanksi</a></h4>
                      <p style="margin-top: 5px; font-weight: bold;">24-Des-2021 </p>
                      <p style="margin-top: -5px;">Lorem, ipsum dolor sit amet consectetur adipisicing elit... </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>


          <!-- Riht content -->
          <div class="col-lg-4">
            <div class="trand-right-single d-flex">
              <div class="trand-right-img">
                <img src="assets1/img/trending/right1.jpg" alt="">
              </div>
              <div class="trand-right-cap">
                <span class="color1">Kesehatan</span>
                <h4><a href="details.html">Vaksinasi Pertama di universitas amikom yogyakarta</a></h4>
                <p style="margin-top: 5px; font-weight: bold;">24-Feb-2021 </p>
                <p style="margin-top: -5px;">Lorem, ipsum dolor sit amet consectetur adipisicing elit... </p>

              </div>
            </div>
            <div class="trand-right-single d-flex">
              <div class="trand-right-img">
                <img src="assets1/img/trending/right2.jpg" alt="">
              </div>
              <div class="trand-right-cap">
                <span class="color1">Olahraga</span>
                <h4><a href="details.html">Indonesia mendapatkan sanksi</a></h4>
                <p style="margin-top: 5px; font-weight: bold;">24-Des-2021 </p>
                <p style="margin-top: -5px;">Lorem, ipsum dolor sit amet consectetur adipisicing elit... </p>
              </div>
            </div>
            <div class="trand-right-single d-flex">
              <div class="trand-right-img">
                <img src="assets1/img/trending/right1.jpg" alt="">
              </div>
              <div class="trand-right-cap">
                <span class="color1">Kesehatan</span>
                <h4><a href="details.html">Vaksinasi Pertama di universitas amikom yogyakarta</a></h4>
                <p style="margin-top: 5px; font-weight: bold;">24-Feb-2021 </p>
                <p style="margin-top: -5px;">Lorem, ipsum dolor sit amet consectetur adipisicing elit... </p>

              </div>
            </div>
          </div>
          <div class="trending-tittle1 border-first-button">
             <strong><a href="{{URL::to('/berita')}}"> Selengkapnya</a></strong>
          </div>
        </div>
      </div>
    </div>
</div>


  <!-- Whats New Start -->
 <category-component></category-component>
  <!-- Whats New End -->

  <div id="services" class="services section">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-heading  wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">
            <h6>Tim</h6>
            <h4>Di Developt oleh  <em>Programmer</em></h4>
            <div class="line-dec"></div>
          </div>
        </div>
        <div class="col-lg-12" style="margin-top: -40px;">
          <div class="naccs">
            <div class="grid">
              <div class="row" id="yahh">
                <div class="col-lg-12">
                  <div class="menu">
                    <div class="first-thumb active" >
                      <div class="thumb" id="siniya">
                        <span class="icon"><img src="{{('assets2/images/use.png')}}" alt=""></span>
                       <span style="font-size: 15px;">Nur Cahyo</span>
                      </div>
                    </div>
                    <div>
                      <div class="thumb">
                        <span class="icon"><img src="{{('assets2/images/use.png')}}" alt=""></span>
                       <span style="font-size: 15px;">Arfan Yoga </span>
                      </div>
                    </div>
                    <div>
                      <div class="thumb">
                        <span class="icon"><img src="{{('assets2/images/use.png')}}" alt=""></span>
                       <span style="font-size: 15px;">Bima</span>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div id="contact" class="contact-us section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <div class="section-heading wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
            <h6>Hubungi Kami</h6>
            <div class="line-dec"></div>
          </div>
        </div>
        <div class="col-lg-12 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.25s">
          <form id="contact" action="" method="post">
            <div class="row">

              <div class="col-lg-7">
                <div class="fill-form">
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="info-post">
                        <div class="icon">
                          <img src="{{('assets2/images/phone-icon.png')}}" alt="">
                          <a href="#">+62895388458497</a>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="info-post">
                        <div class="icon">
                          <img src="{{('assets2/images/email-icon.png')}}" alt="">
                          <a href="#">Digimedia@email.com</a>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="info-post">
                        <div class="icon">
                          <img src="{{('assets2/images/location-icon.png')}}" alt="">
                          <a href="#">Yogyakarta</a>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <fieldset>
                        <input type="name" name="name" id="name" placeholder="Nama" autocomplete="on" required>
                      </fieldset>
                      <fieldset>
                        <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Email"
                          required="">
                      </fieldset>
                      <fieldset>
                        <input type="subject" name="subject" id="subject" placeholder="Subject" autocomplete="on">
                      </fieldset>
                    </div>
                    <div class="col-lg-6">
                      <fieldset>
                        <textarea style="border-radius: 1px;" name="message" type="text" class="form-control" id="message" placeholder="Message"
                          required=""></textarea>
                      </fieldset>
                    </div>
                    <div class="col-lg-12">
                   <a href="">
                    <button type="submit" id="form-submit" class="main-button "> Kirim</button>


                   </a>
                       </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-5">
                <div id="map">
                  <iframe
                  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63245.98363571293!2d110.33982527581509!3d-7.803163972653284!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a5787bd5b6bc5%3A0x21723fd4d3684f71!2sYogyakarta%2C%20Yogyakarta%20City%2C%20Special%20Region%20of%20Yogyakarta!5e0!3m2!1sen!2sid!4v1635952487609!5m2!1sen!2sid"
                    width="100%" height="636px" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
              </div>

            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

@endsection
