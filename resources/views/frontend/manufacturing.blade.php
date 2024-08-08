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
                <li>Fabrication Plant</li>
              </ul>
              <h2>Building partnerships that last.</h2>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="manufacturing-expertise-section">
      <div class="container">
        <div class="row">
        @if(!empty($manufacturingData))
          @foreach($manufacturingData as $details)
          <div class="col-lg-6 col-md-6">
            <div class="manufacturing-text">
              <div class="heading aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
                <h6>{{ $details->highlight }}</h6>
                <h2>{{ $details->title }}</h2>
              </div>
              <p>{!! $details->description !!}</p>
            </div>
          </div>
          <div class="col-lg-6 col-md-6">
            <div class="manufacturing-expertise-image">
              <img src="{{ asset('public/manufacturing/image/' . $details->image) }}" alt="" class="img-responsive">
            </div>
          </div>
          @endforeach
          @endif
        </div>
      </div>
    </section>

    <section class="our-innovations-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="heading" data-aos="fade-up" data-aos-duration="1000">
              <h6>Our Innovations</h6>
              <h2>Our Core Strength</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-2">
          </div>
          <div class="col-lg-10">
            <div class="innovations-box">
              <div class="owl-carousel owl-theme innovations">
              @if(!empty($strenthData))
               @foreach($strenthData as $fetch)
                <div class="item">
                  <div class="single-innovations">
                    <img src="{{ asset('public/strength/image/' . $fetch->image) }}" alt="">
                    <h4>{{ $fetch->title}}</h4>
                    <p>{{ $fetch->description }}</p>
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

    <section class="our-facility-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="facility-text">
              <div class="heading aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
                <h2>Our Facility</h2>
              </div>
              @foreach($facilityData as $fetch)
              <p>{!! $fetch->description !!}</p> 
              @endforeach               
            </div>
          </div>
        </div>
        <div class="row">
         @if(!empty($facilitydetailsData))
          @foreach($facilitydetailsData as $fetch)
          <div class="col-lg-3 col-md-3">
            <div class="facility-box-items">
              <div class="icon hvr-float">
                <img src="{{ asset('public/facilityDetails/icon/' . $fetch->image) }}">
              </div>
              <div class="facility-content">
                <h5>{{ $fetch->title }}</h5>
              </div>
            </div>
          </div>
          @endforeach
          @endif
        </div>
      </div>
    </section>

    <section class="factory-location-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12">
            <div class="heading text-center production-capacity-text mB60 aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
              <h2>Production Capacity</h2>
            </div>
          </div>
          @if(!empty($production_fetch))
          @foreach($production_fetch as $fetch)
          <div class="col-md-3 col-sm-6">
            <div class="factory-location-counter yellow">
              <span class="factory-location-counter-value">{{ $fetch->number}}</span>{{ $fetch->sub_title}}
              <h3>{{ $fetch->title}}</h3>
            </div>
          </div>
          @endforeach
          @endif

          <div class="col-md-12 col-sm-12 text-center">
          @if(!empty($productionTitle_fetch))
          @foreach($productionTitle_fetch as $fetch)
            <p class="note">{{ $fetch->title}}</p>
            @endforeach
          @endif
          </div>
        </div>
      </div>
    </section>

    <section class="plant-machinery">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="plant-machinery-header">
              <div class="heading aos-init aos-animate text-center" data-aos="fade-up" data-aos-duration="1000">
                <h2>A Glimpse At Our Plant Machinery</h2>
              </div>
              <p>Our state of the art machinery is imported to help us deliver cutting-edge solutions to our clients in
                India &amp; abroad.</p>
            </div>
          </div>
          <div class="col-md-12">
            <div class="country-tabs">
               <ul class="nav nav-tabs">
                <li class="active">
                  <a data-toggle="tab" href="#one">
                    <img class="tab-image-area" src="{{ asset('public/assets/frontend/images/icons/italy.png') }}" alt=""> Italy
                  </a>
                </li>
                <li>
                  <a data-toggle="tab" href="#two">
                    <img class="tab-image-area" src="{{ asset('public/assets/frontend/images/icons/india.png') }}" alt=""> India
                  </a>
                </li>
                <li>
                  <a data-toggle="tab" href="#three">
                    <img class="tab-image-area" src="{{ asset('public/assets/frontend/images/icons/china.png') }}" alt=""> China
                  </a>
                </li>
                <li>
                  <a data-toggle="tab" href="#four">
                    <img class="tab-image-area" src="{{ asset('public/assets/frontend/images/icons/usa.png') }}" alt=""> USA
                  </a>
                </li>
                <li>
                  <a data-toggle="tab" href="#five">
                    <img class="tab-image-area" src="{{ asset('public/assets/frontend/images/icons/canada.png') }}" alt=""> Canada
                  </a>
                </li>
              </ul>

              <div class="tab-content">
                <div id="one" class="tab-pane fade in active">
                  <div class="plant-machinery-tab">
                    <ul class="machinery-list">
                    @if(!empty($italyState))
                    @foreach($italyState as $details)
                      <li>{{ $details->title}}</li>
                      @endforeach
                      @endif
                    </ul>
                  </div>
                </div>
                <div id="two" class="tab-pane fade">
                  <div class="plant-machinery-tab">
                    <ul class="machinery-list">
                     @foreach($indiaState as $fetch)
                      <li>{{ $fetch->title }}</li>
                      @endforeach
                    </ul>
                  </div>
                </div>
                <div id="three" class="tab-pane fade">
                  <div class="plant-machinery-tab">
                    <ul class="machinery-list">
                    @if(!empty($chinaState))
                    @foreach($chinaState as $fetch)
                      <li>{{ $fetch->title}}</li>
                      @endforeach
                      @endif
                    </ul>
                  </div>
                </div>
                <div id="four" class="tab-pane fade">
                  <div class="plant-machinery-tab">
                    <ul class="machinery-list">
                    @if(!empty($usaState))
                    @foreach($usaState as $fetch)
                      <li>{{ $fetch->title}}</li>
                      @endforeach
                      @endif
                    </ul>
                  </div>
                </div>
                <div id="five" class="tab-pane fade">
                  <div class="plant-machinery-tab">
                    <ul class="machinery-list">
                    @foreach($canadaState as $fetch)
                      <li>{{ $fetch->title}}</li>
                      @endforeach
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="factory-map-location">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12">
            <div class="heading aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
              <h2>Factory Location</h2>
            </div>
            @if(!empty($locationDetails))
            @foreach($locationDetails as $fetch)
            <p>{!! $fetch->location_detail !!}</p>
            <div class="factory-map-area">
              <iframe src="{{ $fetch->location_url }}" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            @endforeach
            @endif
          </div>
        </div>
      </div>
    </section>

    <section class="in-house-section">
      <div class="container">
      @if(!empty($inhouseDetails_fetch))
        @foreach($inhouseDetails_fetch as $fetch)
        <div class="row">
          <div class="col-lg-offset-4 col-lg-8 col-md-offset-4 col-md-8">
            <div class="in-house-text">
              <div class="heading aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
                <h2><span>In</span>-House Testing Rig</h2>
              </div>
              <p>{!! $fetch->description !!}</p>
            </div>
          </div>
        </div>
        <div class="row mT60">
          <div class="col-lg-8 col-md-8">
            <div class="in-house-img">
              <img src="{{ asset('public/inHouse/image/' . $fetch->image) }}" alt="" class="img-responsive">
            </div>
          </div>
          <div class="col-lg-4 col-md-4">
            <div class="in-house-img">
              <img src="{{ asset('public/inHouse2/image/' . $fetch->image_2) }}" alt="" class="img-responsive">
            </div>
          </div>
        </div>
        @endforeach
        @endif
      </div>
    </section>

    <section class="design-system-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="text-center">
            <div class="heading aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
              <h2>Our Design Systems</h2>
            </div>
             @if(!empty($designData))
             @foreach($designData as $fetch)
            <p>{!! $fetch->description !!}</p>
              @endforeach
              @endif
          </div>
        </div>

        @if(!empty($designDetailsData))
        @foreach($designDetailsData as $fetch)
        <div class="col-md-6">
          <div class="design-system-main">
            <div class="design-system-timeline">
              <div class="design-system-content">
                <div class="timeline-step">{{ $loop->iteration }}</div>
                <h4 class="title">{{ $fetch->title}}</h4>
                <p class="description">{!! $fetch->description !!}</p>
              </div>
            </div>
          </div>
        </div>
        @endforeach
        @endif

        

       

       

      </div>
    </div>
  </section>

  <section class="bespoke-section">
    <div class="container">
      <div class="row">
      @if(!empty($expertDesign))
      @foreach($expertDesign as $fetch)
        <div class="col-lg-5 col-md-5 col-sm-12">
          <div class="bespoke-text text-center">
            <div class="heading aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
              <h2>{{ $fetch->title}}</h2>
            </div>
            <p>{!! $fetch->description !!}</p>
          </div>
        </div>
        @endforeach
        @endif
      </div>
    </div>
  </section>

  <section class="working-process-section">
    <div class="container">
      <div class="row">
      @if(!empty($workingProcess))
        @foreach($workingProcess as $fetch)
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="working-process-text text-center">
            <div class="heading aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
              <h2>Our Working Process</h2>
            </div>
            <p>{!! $fetch->description !!}</p>
          </div>
          <div class="working-process-images">
            <img src="{{ asset('public/working/image/' . $fetch->image) }}" alt="" class="img-responsive">
          </div>
        </div>
        @endforeach
        @endif
      </div>
    </div>
  </section>

  <section class="logistics-section">
    <div class="container">
      <div class="row">
      @if(!empty($logisticalData))
       @foreach($logisticalData as $fetch)
        <div class="col-lg-6 col-md-6">
          <div class="logistics-images">
            <img src="{{ asset('public/logistical/image/' . $fetch->image) }}" class="img-responsive">
          </div>
        </div>
        <div class="col-lg-6 col-md-6">
          <div class="logistics-text">
            <div class="horizontal-line"></div>
            <div class="heading aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
              <h2>{{ $fetch->title_1}} <span>{{ $fetch->title_2}}</span> </h2>
            </div>
            <p>{!! $fetch->description !!}</p>
          </div>
        </div>
        @endforeach
        @endif
      </div>
    </div>
  </section>


@endsection