@extends('layouts.app')

@section('content')

<section class="hero-banner-wrap">
      <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner ">
        @if($bannerImage_fetch->isNotEmpty())
         @foreach($bannerImage_fetch as $details)
          <div class="item @if($loop->first) active @endif">
          <img src="{{ asset('public/banner/image/' . $details->image) }}" alt="slider image" class="slider-img img-responsive">
            <div class="carousel-caption">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="hero-text"  data-aos="fade-up" data-aos-duration="1000">
                  <p><span>{{ $details->title }}</span></p>
                        <h2><span>{!! $details->description !!}</span></h2>
                </div>
              </div>
            </div>
          </div>
          @endforeach
      @endif
        </div>
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
        </a>
      </div>
    </section>


    <!-- <div class="video-banner-wrap">
      <div class="dot-bg"></div>
      
      <iframe defer class="background-video" id="myfirstframe" width="100%" height="600" 
      data-src="https://www.youtube.com/embed/Si7DovGBDuQ?autoplay=1&amp;mute=1&amp;controls=0&amp;loop=1&amp;rel=0&amp;" 
      src="https://www.youtube.com/embed/Si7DovGBDuQ?autoplay=1&amp;mute=1&amp;controls=0&amp;loop=1&amp;rel=0&amp;" allowfullscreen loading="lazy">
            </iframe>
            
      <div class="hero-content">
        <div class="container">
          <div class="row">
            <div class="col-lg-offset-6 col-lg-6 col-md-offset-6 col-md-6 col-xs-12">
              <div class="hero-text"  data-aos="fade-up" data-aos-duration="1000">
                <p>Since <span>1996</span></p>
                <h2>we serve 
                  <span class="text">quality</span> 
                  <br>
                  <span class="text-2"> &amp; equality</span>
                </h2>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> -->

    <section class="about-wrap">
      <div class="container">
        <div class="row">
          <div class="col-lg-7 col-md-7">
            <div class="about-text">
              @foreach($alumaye_fetch as $details)
              <div class="heading" >
              <h6>At Alumayer</h6>
              <h2>{{ $details->title }}</h2>
              </div>
              <h5>{!! $details->description !!}</h5>
              <a href="{{ route('about_show') }}" class="btn btn-default mT30">Know More</a>
              @endforeach
            </div>
          </div>
          <div class="col-lg-5 col-md-5">
              <div class="logo-boxex">
            <div class="four-box-wrap one-four-box-wrap">
              <div class="single-box-four-wrap">
                <img src="{{ asset('public/homeIcon/image/' . $homeIcon_fetch_1->image) }}">
                <h4>{{ $homeIcon_fetch_1->title}}</h4>
              </div>
              <div class="single-box-four-wrap">
                <img src="{{ asset('public/homeIcon/image/' . $homeIcon_fetch_2->image) }}">
                <h4>{{ $homeIcon_fetch_2->title}}</h4>
              </div>
            </div>
            <div class="four-box-wrap two-four-box-wrap">
              <div class="single-box-four-wrap">
                <img src="{{ asset('public/homeIcon/image/' . $homeIcon_fetch_3->image) }}">
                <h4>{{ $homeIcon_fetch_3->title}}</h4>
              </div>
              <div class="single-box-four-wrap fourth-door-box" data-aos="fade-up" data-aos-duration="2000">
                <img src="{{ asset('public/homeIcon/image/' . $homeIcon_fetch_4->image) }}">
                <h4>{{ $homeIcon_fetch_4->title}}</h4>
              </div>
            </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section slide2 all-products" id="all-products">
        <div class="container expand-container position-relative">
          <div class="row">
            <div class="col-lg-8">
              <div class="portfolio-text-box mB60">
                <div class="heading" data-aos="fade-up" data-aos-duration="1000">
                  <h6>Our Projects</h6>
                      @foreach($ourProject_fetch as $fetch)  
                      <h2>{{ $fetch->description }} </h2>
                       @endforeach
                </div>
              </div>
            </div>
            <div class="col-lg-4">
            <a href="{{ route('projects_show') }}" class="btn btn-default mT30 pull-right">Explore More Projects</a>
            </div>
          </div>
          
          <div class="row products-fade wow" data-wow-delay=".8s">
              <div class="owl-products owl-carousel owl-theme wow fadeInUp">
                @foreach($homeProject_fetch as $details)
                  <div class="team-box item">
                      <div class="team-image">
                      <img src="{{ asset('public/projects/image/' . $details->image) }}" alt="image">
                      </div>
                      <div class="team-text">
                          <h5 class="main-font">{{ $details->title }}</h5>
                          <a href="{{ route('projects_slug_details', ['slug' => $details->slug]) }}"
                                        class="btn btn-link">View</a>
                      </div>
                  </div>
                  @endforeach
              </div>
          </div>
         
          <!-- <a class='circle' id="team-circle-left"><i class="fa fa-chevron-left"></i></a>
          <a class='circle' id="team-circle-right"><i class="fa fa-chevron-right"></i></a> -->

          <!-- <div class="text-center">
          </div> -->
        </div>
    </section>

    <!-- <section class="portfolio-wrap">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-7 col-md-12 col-sm-12">
            <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="single-portfolio">
                  <div class="mi-media">
                    <a href="#">
                      <img src="images/portfolio/1.jpg" alt="" class="img-responsive">
                    </a>
                    <h4>Trump Tower</h4>
                    <div class="project-social">
                      <a href="#" class="link-btn"><i class="fa fa-long-arrow-right"></i></a>
                    </div>
                  </div>
                </div>
                <div class="single-portfolio">
                  <div class="mi-media">
                    <a href="#">
                      <img src="images/portfolio/2.jpeg" alt="" class="img-responsive">
                    </a>
                    <h4>Air Traffic Control Tower</h4>
                    <div class="project-social">
                      <a href="#" class="link-btn"><i class="fa fa-long-arrow-right"></i></a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="single-portfolio second-col">
                  <div class="mi-media">
                    <a href="#">
                      <img src="images/portfolio/3.jpg" alt="" class="img-responsive">
                    </a>
                    <h4>Lodha Supremus</h4>
                    <div class="project-social">
                      <a href="#" class="link-btn"><i class="fa fa-long-arrow-right"></i></a>
                    </div>
                  </div>
                </div>
                <div class="single-portfolio">
                  <div class="mi-media">
                    <a href="#">
                      <img src="images/portfolio/4.jpg" alt="" class="img-responsive">
                    </a>
                    <h4>World Crest Tower</h4>
                    <div class="project-social">
                      <a href="#" class="link-btn"><i class="fa fa-long-arrow-right"></i></a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="single-portfolio third-col">
                  <div class="mi-media">
                    <a href="#">
                      <img src="images/portfolio/5.jpeg" alt="" class="img-responsive">
                    </a>
                    <h4>ICC Tower</h4>
                    <div class="project-social">
                      <a href="#" class="link-btn"><i class="fa fa-long-arrow-right"></i></a>
                    </div>
                  </div>
                </div>
                <div class="single-portfolio">
                  <div class="mi-media">
                    <a href="#">
                      <img src="images/portfolio/6.jpg" alt="" class="img-responsive">
                    </a>
                    <h4>World One</h4>
                    <div class="project-social">
                      <a href="#" class="link-btn"><i class="fa fa-long-arrow-right"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-5 col-md-12 col-sm-12 portfolio-heading">
            <div class="portfolio-text-box">
              <div class="heading" data-aos="fade-up" data-aos-duration="1000">
                <h6>Our Projects</h6>
                <h2>Modern designs<br> for your facade<br> solutions</h2>
              </div>
              <a href="#" class="btn btn-default">View More</a>
            </div>
          </div>
        </div>
      </div>
    </section> -->

    <section class="leadership-wrap">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3">
          </div>
          <div class="col-lg-9">
            <div class="leadership-box">
              @foreach($leadership_fetch as $fetch)
              <div class="heading" data-aos="fade-up" data-aos-duration="1000">
                <h6>Leadership</h6>
                <h2>{{ $fetch->title}}</h2>
              </div>
              <div class="leadership-text">
                <p>{!!  $fetch->description !!}</p>
              </div>
              <div class="leadership-person">
                <p>- {{ $fetch->name}}</p>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="numbers-wrap">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="heading" data-aos="fade-up" data-aos-duration="1000">
              <h6>Our Journey in Numbers</h6>
              <h2>The Alumayer difference</h2>
            </div>
          </div>
          <div class="col-lg-4">
          @foreach($numberDetails_fetch as $fetch)
            <div class="front-difference__item mT40">
              <div class="front-difference__stat">{{ $fetch->number}}+</div>
              <h3 class="front-difference__text">{{ $fetch->title}}</h3>
              <a href="{{ $fetch->url}}" class="ia-link" target="_self">
                <i class="fa fa-caret-right"></i>
                <span>Industry-Recognized Credentials</span>
              </a>
            </div>
            @endforeach
          </div>
          <div class="col-lg-1">
          </div>
          <div class="col-lg-7">
            <div class="row">
              <div class="col-12 col-md-4 col-xs-4">
                  <div class="stats-box">
                      <div class="stats-icon">
                      @foreach($experienceIcon2_fetch as $fetch)  
                         <img src="{{ asset('public/exp_logo/icon/' . $fetch->icon) }}">
                      </div>
                      <div class="stats-box-text">
                          <h3 class="numbering"><span class="odometer" data-count="{{ $fetch->number}}" data-status="yes">0</span>+</h3>
                          <p class="stat-sub-heading">{{ $fetch->title}}</p>
                          @endforeach
                      </div>
                  </div>
              </div>

              <div class="col-12 col-md-4 col-xs-4">
                  <div class="stats-box">
                      <div class="stats-icon">
                      @foreach($experienceIcon3_fetch as $fetch)  
                         <img src="{{ asset('public/exp_logo/icon/' . $fetch->icon) }}"> 
                      </div>
                      <div class="stats-box-text">
                          <h3 class="numbering"><span class="odometer" data-count="{{ $fetch->number}}" data-status="yes">0</span>+</h3>
                          <p class="stat-sub-heading">{{ $fetch->title}}</p>
                          @endforeach
                      </div>
                  </div>
              </div>

              <div class="col-12 col-md-4 col-xs-4">
                  <div class="stats-box">
                      <div class="stats-icon">
                      @foreach($experienceIcon1_fetch as $fetch)  
                         <img src="{{ asset('public/exp_logo/icon/' . $fetch->icon) }}">
                      </div>
                      <div class="stats-box-text">
                          <h3 class="numbering"><span class="odometer" data-count="{{ $fetch->number}}" data-status="yes">0</span>+</h3>
                          <p class="stat-sub-heading">{{ $fetch->title}}</p>
                          @endforeach
                      </div>
                  </div>
              </div>
          </div>
          </div>
        </div>
      </div>
      <!-- <img src="images/bg/square-img.png" class="design-icon"> -->
    </section>

    <section class="fabrication-wrap">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
            <div class="owl-carousel owl-theme fabrication-box">
              @foreach($fabricationimg_fetch as $fetch)
              <div class="fabrication-box-wrap">
                <img src="{{ asset('public/fabrication_img/image/' . $fetch->image) }}" class="img-responsive">
                <h2>{{ $fetch->title}}</h2>
              </div>
              @endforeach
            </div>
          </div>
          <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
            <div class="heading text-right" data-aos="fade-up" data-aos-duration="1000">
            @foreach($fabricationdata_fetch as $fetch)
              <h2>Fabrication Expertise</h2>
              <p>{!! $fetch->description !!}</p>
              @endforeach
            </div>
            <div class="row last-two-numbers">
              <div class="col-lg-4 col-md-6 col-sm-6 col-xs-4">
                <div class="front-difference__item">
                  <div class="number-box">
                  <div class="front-difference__stat">{{ $numberDetailsData_fetch_1->number }}</div>
                  <h3 class="front-difference__text">{{ $numberDetailsData_fetch_1->title }}</h3>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 col-sm-6 col-xs-4">
                <div class="front-difference__item">
                  <div class="number-box">
                  <div class="front-difference__stat">{{ $numberDetailsData_fetch_2->number }}</div>
                  <h3 class="front-difference__text">{{ $numberDetailsData_fetch_2->title }}</h3>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 col-sm-6 col-xs-4">
                <div class="front-difference__item">
                  <div class="number-box">
                  <div class="front-difference__stat">{{ $numberDetailsData_fetch_3->number }}</div>
                   <h3 class="front-difference__text">{{ $numberDetailsData_fetch_3->title }}</h3>
                  </div>
                </div>
              </div>
              <div class="text-right">
                <a href="{{ route('manufacturing_list') }}" class="btn btn-default mT30">Know More</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="product-home-wrap">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="heading text-center" data-aos="fade-up" data-aos-duration="1000">
              <h2>Our Products</h2>
            </div>
            <div class="owl-carousel owl-theme productshome">
              @foreach($product_fetch as $fetch)
              <div class="item">
                <div class="product-carousel-item">
                  <div class="product-item">
                    <div class="product-item-image">
                    <img src="{{ asset('public/product/image/'.$fetch->image) }}" alt="Image Description">
                    </div>
                    <div class="product-item-name">
                    {{ $fetch->title }}
                    </div>
                    <div class="product-item-detail">
                     <a href="{{ route('product_details', ['slug' => $fetch->slug]) }}"> <i class="fa fa-external-link-square" aria-hidden="true"></i></a>
                    </div>
                  </div>                                        
                </div>
              </div>
             @endforeach
              
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <section class="clients-wrap">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="heading text-center" data-aos="fade-up" data-aos-duration="1000">
              <h6>Happy Clients</h6>
              <h2>Certified system suppliers & Partnerships</h2>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="owl-carousel owl-theme testimonial">
              @foreach($happyClient_fetch as $details)
              <div class="item">
                <div class="quote-text text-center">
                  <h2 class="font-weight-light">
                    <p><img src="{{ asset('public/assets/frontend/images/icons/quote-left.png') }}">
                    {!! $details->description !!}</p>
                  </h2>
                  <h3 class="color-pink">-{{ $details->name }}</h3>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
      <div class="container-fluid clients-container">
        <div class="row">
          <div class="col-lg-12">
            <div class="owl-carousel owl-theme clients">
              @foreach($clients_fetch as $details)
              <div class="item">
                <div class="single-client">
                  <img src="{{ asset('public/clients/image/' . $details->image) }}" class="img-responsive">
                </div>
              </div>
               @endforeach
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="cta-sticky-btn-wrap hidden-xs">
      <a data-toggle="modal" data-target="#myModal1" class="cta-sticky-btn">Submit Inquiry</a>
    </div>

    <!-- Modal -->
  <div id="myModal1" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-box"></div>
      <div class="modal-box2"></div>
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Fill the form for Inquiry</h4>
        </div>
        <div class="modal-body">
          <div class="instance-form">
            <form action="{{ route('sendinquiry') }}" method="POST">  
              @csrf         
              <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Your Name" required>
              </div>
              <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Your Email" required>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="phone_no" placeholder="Your Number" oninput="this.value = this.value.replace(/[^0-9]/g, '');" minlength="10" maxlength="12" required="">
              </div> 
              <div class="form-group">
                <textarea type="text" class="form-control" name="message" placeholder="Write your query" required></textarea>
              </div>
              <div class="load-more-btn">
                <button type="submit" class="btn btn-default">Submit <i class="fa fa-angle-right"></i></button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

    <!-- <section class="news-section">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-7 col-sm-9">
            <div class="heading" data-aos="fade-up" data-aos-duration="1000">
              <h6>Company Insights</h6>
              <h2>Daily updates &  blog feeds</h2>
            </div>
          </div>
          <div class="col-md-5 col-sm-3">
            <div class="text-right">
              <a href="#" class="btn btn-default">More News</a>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xl-7 col-lg-7 wow fadeInUp" data-wow-delay=".3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
            <div class="news-image">
              <img src="images/news/01.jpg" alt="news-img">
              <div class="post-cat-item">
                <h6 class="post-title"><a href="#">consult</a></h6>
                <h6 class="post-title-2"><a href="#">construction</a></h6>
              </div>
              <div class="news-content">
                <ul class="post-date">
                  <li>
                    <i class="fa fa-calendar"></i>
                    jan 28, 2024 <span> / ronald</span>
                  </li>
                </ul>
                <h4>
                  <a href="#">
                  Techniques for sustainable and
                  environmentally
                  </a>
                </h4>
              </div>
            </div>
          </div>
          <div class="col-xl-5 col-lg-5">
            <div class="news-right-content">
              <div class="single-news-items wow fadeInUp" data-wow-delay=".3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                <div class="news-content">
                  <ul class="post-date">
                    <li>
                      <i class="fa fa-calendar"></i>
                      jan 28, 2024 <span> / ronald</span>
                    </li>
                  </ul>
                  <h5>
                    <a href="#">
                    Increasing efficiency and safety on construction sites
                    </a>
                  </h5>
                </div>
              </div>
              <div class="single-news-items wow fadeInUp" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
                <div class="news-content">
                  <ul class="post-date">
                    <li>
                      <i class="fa fa-calendar"></i>
                      jan 28, 2024 <span> / ronald</span>
                    </li>
                  </ul>
                  <h5>
                    <a href="#">
                    A digital representation of the physical and functional
                    </a>
                  </h5>
                </div>
              </div>
              <div class="single-news-items wow fadeInUp" data-wow-delay=".7s" style="visibility: visible; animation-delay: 0.7s; animation-name: fadeInUp;">
                <div class="news-content border-none">
                  <ul class="post-date">
                    <li>
                      <i class="fa fa-calendar"></i>
                      jan 28, 2024 <span> / ronald</span>
                    </li>
                  </ul>
                  <h5>
                    <a href="#">
                    Skilled labor is often in high demand &amp; short supply
                    </a>
                  </h5>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> -->
@endsection