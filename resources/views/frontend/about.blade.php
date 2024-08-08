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
                <li>About</li>
              </ul>
              <h2>Delivering success consistently</h2>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="about-inner-wrap">
      <div class="container">
        <div class="row">
          <div class="col-lg-offset-4 col-lg-8 col-md-offset-4 col-md-8">
            <div class="about-inner-text">
              <div class="heading aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
                <h6>High Quality Tactical Solutions</h6>
                <h2>Enhancing skylines for over<br> <span>5</span> decades</h2>
              </div>
              @foreach($aboutDetails_fetch as $fetch)
              <h5>
                {!! $fetch->description !!}
              </h5>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="history-wrap">
      <h6 class="history-word">History</h6>
      <div class="leadership-logolike-box"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12">
            <div class="history-text">
              <!-- <div class="heading aos-init aos-animate mB60" data-aos="fade-up" data-aos-duration="1000">
                <h2>Years of perfecting</h2>
              </div> -->
              <div class="owl-carousel owl-theme history">
                 @foreach($history_fetch as $fetch)
                <div class="item">
                  <div class="single-history">
                    <div class="col-lg-6 col-sm-6">
                      <img src="{{ asset('public/about/history/' . $fetch->image) }}" class="img-responsive">
                    </div>
                    <div class="col-lg-6 col-sm-6">
                      <h5>{{ $fetch->year}} </h5>
                      <h3>{{ $fetch->title}}</h3>
                      <p>{!! $fetch->description !!}</p>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="vision-wrap">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6">
            <div class="vision-text">
             @foreach($about_vision_fetch as $fetch)
             <img src="{{ asset('public/about/vision/image/' . $fetch->image) }}">
              <h4>{{ $fetch->title}}</h4>
              <p>{!! $fetch->description !!} </p>
               @endforeach
            </div>
            <div class="vision-text mission-box">
              @foreach($about_mission_fetch as $fetch)
              <img src="{{ asset('public/about/mission/image/' . $fetch->image) }}">
              <h4>{{ $fetch->title}}</h4>
              <p>{!! $fetch->description !!} </p>
               @endforeach
            </div>
          </div>
          <div class="col-lg-6 col-md-6">
            <div class="capabilites-text">
              <ul>
              @foreach($aboutData_fetch as $fetch)
                <li>
                  <b>{{ $fetch->title}}</b>
                  <p>{!! $fetch->description !!}</p> 
                </li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
        <div class="values-wrap">
          <div class="heading aos-init aos-animate text-center mB30" data-aos="fade-up" data-aos-duration="1000">
            @foreach($values_fetch as $fetch)
            <h6>Our Values</h6>
            <h2>{!! $fetch->description !!}</h2>
            @endforeach
          </div>
          <div class="row">
             @foreach($valuesDetails_fetch as $fetch)
            <div class="col-lg-3 col-md-3">
              <div class="service-box-items">
                <div class="icon hvr-float">
                  <img src="{{ asset('public/about/icon/image/' . $fetch->image) }}">
                </div>
                <div class="content">
                  <h5>{{ $fetch->title}}</h5>
                  <p>{{ $fetch->description }}</p>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </section>

    <section class="team-wrap">
      <div class="container">
        <div class="heading white-heading">
          <h6>Team</h6>
          <h2>We set trends. We inspire the market.</h2>
        </div>
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="owl-carousel owl-theme team">
              @foreach($team_fetch as $fetch)
              <div class="item">
                <div class="team-card">
                  <div class="image">
                    <img src="{{ asset('public/about/team/' . $fetch->image) }}" alt="">
                  </div>
                  <div class="content">
                    <h2><a href="team-single.html">{{ $fetch->name}}</a></h2>
                    <span>{{ $fetch->designation}}</span>
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

   