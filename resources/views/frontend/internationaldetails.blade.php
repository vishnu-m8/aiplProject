@extends('layouts.app')

@section('content')

<section class="breadcrumb-wrap">
      <div class="down-arrow-icon">
        <img src="{{ asset('public/assets/frontend/images/icons/down-arrow.svg') }}">
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12">
            <div class="breadcrumb-text">
              <ul>
              <li><a href="{{ route('home_show') }}">Home</a></li>
                <li><a href="{{ route('projects_show') }}">Projects</a></li>
                <li>{{ $int_slug->title }}</li>
              </ul>
              <h2>{{ $int_slug->title }}</h2>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="projects-detail-wrap">
      <div class="container">
        <div class="row">
          <div class="col-md-5">
            <div class="projects-detail-img">
              <img src="{{ asset('public/projects/image/' . $int_slug->image) }}" class="img-responsive">
            </div>
          </div>
          <div class="col-md-7">
            <div class="projects-detail-text">
              <div class="horizontal-line"></div>
              <p>{!! $int_slug->description !!}.</p>
            </div>
            <div class="project-list-list">
              <div class="project-list">
                <h5>Client</h5>
                <p>{{ $int_slug->client }}</p>
              </div>
              <div class="project-list">
                <h5>Architect/ Consultant</h5>
                <p>{{ $int_slug->consultant }}</p>
              </div>
              <div class="project-list">
                <h5>Facade Area</h5>
                <p>{{ $int_slug->area }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="gallery-detail-wrap">
      <div class="container">
        <div class="heading gallery-heading" data-aos="fade-up" data-aos-duration="1000">
          <h2>Gallery</h2>
        </div>
        <div class="row">
          <div class="col-md-4 col-sm-6 col-xs-12">
            <a href="{{ asset('public/assets/frontend/images/projects/small-1.jpg') }}" data-fancybox="gallery">
              <img src="{{ asset('public/assets/frontend/images/projects/small-1.jpg') }}" class="img-responsive" />
            </a>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12">
            <a href="{{ asset('public/assets/frontend/images/projects/small-2.jpg') }}" data-fancybox="gallery">
              <img src="{{ asset('public/assets/frontend/images/projects/small-2.jpg') }}" class="img-responsive" />
            </a>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12">
            <a href="{{ asset('public/assets/frontend/images/projects/small-3.jpg') }}" data-fancybox="gallery">
              <img src="{{ asset('public/assets/frontend/images/projects/small-3.jpg') }}" class="img-responsive" />
            </a>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12">
            <a href="{{ asset('public/assets/frontend/images/projects/small-4.jpg') }}" data-fancybox="gallery">
              <img src="{{ asset('public/assets/frontend/images/projects/small-4.jpg') }}" class="img-responsive" />
            </a>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12">
            <a href="{{ asset('public/assets/frontend/images/projects/07.jpg') }}" data-fancybox="gallery">
              <img src="{{ asset('public/assets/frontend/images/projects/08.jpg') }}" class="img-responsive" />
            </a>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12">
            <a href="{{ asset('public/assets/frontend/images/projects/08.jpg') }}" data-fancybox="gallery">
              <img src="{{ asset('public/assets/frontend/images/projects/08.jpg') }}" class="img-responsive" />
            </a>
          </div>
        </div>
      </div>
    </section>

    <section class="featured-projects-wrap">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="heading" data-aos="fade-up" data-aos-duration="1000">
              <h6>Projects</h6>
              <h2>Featured Projects</h2>
            </div>
            <div class="owl-carousel owl-theme featured">
              @foreach($intDetails_fetch as $details)
              <div class="item">
                <div class="single-portfolio">
                  <div class="mi-media">
                    <a href="#">
                      <img src="{{ asset('public/projects/image/' . $details->image) }}" alt="" class="img-responsive">
                    </a>
                    <h4>{{ $details->title }}</h4>
                    <div class="project-social">
                      <a href="{{ route('projects_slug_details', ['slug' => $details->slug]) }}" class="link-btn"><i class="fa fa-long-arrow-right"></i></a>
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

@endsection
