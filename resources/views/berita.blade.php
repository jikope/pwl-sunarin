@extends('layouts.app')
@section('content')

<div class="main-banner wow fadeIn" id="top">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg align-self-center">
              <div class="left-content show-up header-text wow fadeInBottom" id="judul" >
                <h2 style="text-align: center; color: #4da6e7;"> 
                
                BERITA TERBARU
            
                </h2>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


 <!--================Blog Area =================-->
 <section class=" section-padding" style="margin-top: -150px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="blog_left_sidebar">
                   
                    @foreach($data as $d)
                    <article class="blog_item">
                        <div class="blog_item_img">
                            <img class="card-img rounded-0" src="{{$d->image}}" alt="">
                            <a href="#" class="blog_item_date">
                                <h3>15</h3>
                                <p>Jan</p>
                            </a>
                        </div>

                        <div class="blog_details">
                            <a class="d-inline-block" href="detail.html">
                                <h2>{{$d->title}}</h2>
                            </a>
                            <p>That dominion stars lights dominion divide years for fourth have don't stars is that
                                he earth it first without heaven in place seed it second morning saying.</p>
                            <ul class="blog-info-link">
                                <li><a href="#"><i class="fa fa-user"></i> admin</a></li>
                                <li><a href="#"><i class="fa fa-comments"></i> 03 Comments</a></li>
                                <li><a style="font-weight: bold;" href="#"><i class="fas fa-category"></i> <span style="font-weight: bold;">kategori:</span>Kesehatan</a></li>
                            </ul>
                        </div>
                    </article>
                    @endforeach
                   

                    <nav class="blog-pagination justify-content-center d-flex">
                    {{$data->links("pagination::bootstrap-4") }}
                    </nav>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    <aside class="single_sidebar_widget search_widget">
                        <form action="/search">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <input type="text" name="key" class="form-control" placeholder='Search Keyword'
                                        onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Search Keyword'">
                                    <div class="input-group-append">
                                        <button class="btns" type="submit" style="background-color: #4da6e7; height: 100%;"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </aside>

                    <aside class="single_sidebar_widget popular_post_widget">
                        <h3 class="widget_title">Berita Terbaru</h3>
                        <div class="media post_item">
                            <img id="oke" src="assets1/img/post/post_1.png" style="height: 100px; width: 100px;"  alt="post">
                            <div class="media-body">
                                <a href="detail.html">
                                    <h3>From life was you fish...</h3>
                                </a>
                                <p>January 12, 2019</p>
                                <p style="padding-top: 20px; font-weight: 500;">kategori: kesehatan</p>
                            </div>
                        </div>
                        
                       
                    </aside>

                    <aside class="single_sidebar_widget post_category_widget">
                        <h4 class="widget_title">Kategori</h4>
                        <ul class="list cat-list" id="kat" style="margin-top: -20px;">
                            <li >
                                <a href="#" class="d-flex">
                                    <p >Kesehatan</p>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="d-flex">
                                    <p>Olaharga</p>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="d-flex">
                                    <p>Kriminal</p>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="d-flex">
                                    <p>Politik</p>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="d-flex">
                                    <p>Bisnis</p>
                                </a>
                            </li>
                        </ul>
                    </aside>

                    <!-- <aside class="single_sidebar_widget tag_cloud_widget">
                        <h4 class="widget_title">Tag Clouds</h4>
                        <ul class="list">
                            <li>
                                <a href="#">project</a>
                            </li>
                            <li>
                                <a href="#">love</a>
                            </li>
                            <li>
                                <a href="#">technology</a>
                            </li>
                            <li>
                                <a href="#">travel</a>
                            </li>
                            <li>
                                <a href="#">restaurant</a>
                            </li>
                            <li>
                                <a href="#">life style</a>
                            </li>
                            <li>
                                <a href="#">design</a>
                            </li>
                            <li>
                                <a href="#">illustration</a>
                            </li>
                        </ul>
                    </aside> -->

                </div>
            </div>
        </div>
    </div>
</section>
<!--================Blog Area =================-->

@endsection
