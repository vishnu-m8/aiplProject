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
                <li>Projects</li>
              </ul>
              <h2>Look at what we are doing.</h2>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="projects-inner-wrap">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-center mB60">
              <div class="heading aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
                <h6>Our Best Work</h6>
                <h2>Key Projects</h2>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="case-study-single-items">
              <div class="row">
                @if(!empty($project_fetch))
                @foreach($project_fetch as $details)
                <div class="col-md-4">
                  <div class="case-study-items-2 active">
                    <a href="#">
                      <div class="case-study-image">
                        <img src="{{ asset('public/projects/image/' . $details->image) }}" alt="case-study-img">
                        <div class="icon">
                          <a href="{{ route('projects_slug_details', ['slug' => $details->slug]) }}"><i class="fa fa-long-arrow-right"></i></a>
                        </div>
                      </div>
                    </a>
                    <div class="case-study-content">
                      <ul>
                         <li>{{ $details->client }}</li>
                         <li>{{ $details->consultant }}</li>
                         <li>{{ $details->area }}</li>
                      </ul>
                      <h4>
                         <a href="{{ route('projects_slug_details', ['slug' => $details->slug]) }}">{{ $details->title }}</a>
                      </h4>
                    </div>
                  </div>
                </div>
                @endforeach
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="featured-projects-wrap bg-grey">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="heading" data-aos="fade-up" data-aos-duration="1000">
              <h6>Other Projects</h6>
              <h2>Featured Projects</h2>
            </div>

            <ul class="nav nav-tabs">
              <li class="active"><a data-toggle="tab" href="#indian">Indian Projects</a></li>
              <li><a data-toggle="tab" href="#international">International Projects</a></li>
            </ul>
            <div class="tab-content">
              <div id="indian" class="tab-pane fade in active">
                <div class="row">
                  @foreach($IndiaProject_fetch as $details)
                  <div class="col-md-4">
                      <div class="single-portfolio">
                        <div class="mi-media">
                          <a href="#">
                            <img src="{{ asset('public/projects/image/' . $details->image) }}" alt="" class="img-responsive">
                          </a>
                          <h4>{{ $details->title }}</h4>
                          <div class="project-social">
                            <a href="{{ route('IndiaProjects_slug_details', ['slug' => $details->slug]) }}" class="link-btn"><i class="fa fa-long-arrow-right"></i></a>
                          </div>
                        </div>
                      </div>
                  </div>
                  @endforeach
                </div>
              </div>
              <div id="international" class="tab-pane fade">
                <div class="row">
                  @foreach($InternationalProject_fetch as $details)
                  <div class="col-md-4">
                    <div class="single-portfolio">
                      <div class="mi-media">
                        <a href="#">
                          <img src="{{ asset('public/projects/image/' . $details->image) }}" alt="" class="img-responsive">
                        </a>
                        <h4>{{ $details->title }}</h4>
                        <div class="project-social">
                          <a href="{{ route('IntProjects_slug_details', ['slug' => $details->slug]) }}" class="link-btn"><i class="fa fa-long-arrow-right"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    @endsection

   