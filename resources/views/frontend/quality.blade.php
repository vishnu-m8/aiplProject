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
                <li>Quality </li>
              </ul>
              <h2>More important than quantity</h2>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="quality-checks-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
             @foreach($qualityChecks_fetch as $fetch)  
            <div class="quality-checks-text text-center mB60">
              <div class="heading aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
                <h2>{{ $fetch->title}}</h2>
              </div>
              <p>{!! $fetch->description !!}</p>
            </div>
            @endforeach
          </div>

          @foreach($qualityImage_fetch as $fetch) 
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="quality-checks-box">
              <a class="fancybox" href="{{ asset('public/quality/image/' . $fetch->image) }}" data-fancybox="gallery">
                <img src="{{ asset('public/quality/image/' . $fetch->image) }}" alt="Placeholder Image" class="img-responsive">
                <div class="quality-checks-box-content">
                  <h3 class="title">+</h3>
                </div>
              </a>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section>

    <section class="quality-process-section">
      <div class="container">
        <div class="row">
         @foreach($qualityDetails_fetch as $fetch)
          <div class="col-lg-6 col-md-6">
            <div class="quality-process-text">
              <div class="heading aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
                <h6>Our Process</h6>
                <h2>{{ $fetch->title}}</h2>
              </div>
              <p>{!! $fetch->description !!}</p>
            </div>
          </div>
          <div class="col-lg-6 col-md-6">
            <div class="quality-img">
              <img src="{{ asset('public/qualityDetails/image/' . $fetch->image) }}" class="img-responsive">
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section>
    @endsection