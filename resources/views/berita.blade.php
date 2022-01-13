
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
                                <h3>{{ \Carbon\Carbon::parse($d->date)->format('j') }}
</h3>
                                <p>{{ \Carbon\Carbon::parse($d->date)->format('M') }}</p>
                            </a>
                        </div>

                        <div class="blog_details">
                            <a class="d-inline-block" href="{{URL::to('/latest/'.$d->id)}}">
                                <h2>{{$d->title}}</h2>
                            </a>
                            <p></p>
                            <ul class="blog-info-link">
                                <li><a href="#"><i class="fa fa-user"></i>{{$d->author}}</a></li>
                                
                                <li><a style="font-weight: bold;" href="#"><i class="fas fa-category"></i> <span style="font-weight: bold;">kategori:</span>{{$d->category}}</a></li>
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
                        @foreach($latest as $l)
                        <div class="media post_item">
                            <img id="oke" src="{{$l->image}}" style="height: 100px; width: 100px;"  alt="post">
                            <div class="media-body">
                                <a href="detail.html">
                                    <h3>{{$l->title}}</h3>
                                </a>
                                <p>{{ \Carbon\Carbon::parse($l->updated_at)->format('j F, Y') }}</p>
                                <p style="padding-top: 20px; font-weight: 500;">kategori: {{$d->category}}</p>
                            </div>
                        </div>
                        @endforeach
                       
                    </aside>

                    <aside class="single_sidebar_widget post_category_widget">
                        <h4 class="widget_title">Kategori</h4>
                        <ul class="list cat-list" id="kat" style="margin-top: -20px;">
                            @foreach($category as $c)
                            <li >
                                <a href="{{URL::to('/category/'.$c->category)}}" class="d-flex">
                                    <p >{{$c->category}}</p>
                                </a>
                            </li>
                            @endforeach
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