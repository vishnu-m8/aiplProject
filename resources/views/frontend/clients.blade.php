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
                <li>Clients</li>
              </ul>
              <h2>Our global footprint</h2>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="clients-inner-wrap">
      <div class="container">
        <div class="row clients-row">
            @foreach($clientsImage_fetch as $fetch)
                <div class="col-lg-1" onclick="window.open('{{ $fetch->link }}', '_blank')">
                    <div class="single-client">
                        <img src="{{ asset('public/clients/image/' . $fetch->image) }}" class="img-responsive">
                    </div>
                </div>
            @endforeach
        </div>
      </div>
    </section>

    <section class="map-section">
      <div class="container">
        <div class="row">
          @foreach($clientsDetails_fetch as $fetch)
          <div class="col-lg-12 col-md-12">
            <div class="map-text">
              <div class="heading aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
                <h6>About Our Presence</h6>
                <h2>{{ $fetch->title}}</h2>
              </div>
              <p>{!! $fetch->description !!}</p>
              
            </div>
          </div>
          @endforeach
        </div>
      </div>
      <div class="container-fluid">
        <div class="row">
          @foreach($clientsMap_fetch as $fetch)
          <div class="col-lg-12 col-md-12">
            <div class="map-image">
              <img src="{{ asset('public/clientmap/image/' . $fetch->image) }}" alt="" class="img-responsive">
            </div>
          </div>
          @endforeach
        </div>
      </div>
      <div class="container">
        <div class="row">
          @foreach($clientsRegion_fetch as $fetch)
          <div class="col-md-6">
            <div class="region-box">
              <h3>Region</h3>
              <h6>{{ $fetch->title }}</h6>
              <p>{!!  $fetch->description !!}</p>
            </div>
            <div class="region-list">
              <div class="single-region">
                <h3>{{ $fetch->project_number_2 }}</h3>
                <p>{{ $fetch->project_details_1 }}</p>
              </div>
              <div class="single-region">
                <h3>{{ $fetch->project_number_1 }}</h3>
                <p>{{ $fetch->project_details_1 }}</p>
              </div>
              <div class="single-region">
                <h3>{{ $fetch->team_member }}</h3>
                <p>{{ $fetch->team_details }}</p>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="region-img pull-right">
              <img src="{{ asset('public/clientsRegion/image/' . $fetch->image) }}" alt="" class="img-responsive">
            </div>
          </div>
          @endforeach
        </div>
        <div class="row mB80">
          @foreach($clientsRegionSecond as $fetch)
          <div class="col-md-6">
            <div class="region-img">
              <img src="{{ asset('public/clientsRegionSecond/image/' . $fetch->image) }}" alt="" class="img-responsive">
            </div>
          </div>
          <div class="col-md-6">
            <div class="region-box">
              <h3>Region</h3>
              <h6>{{ $fetch->title }}</h6>
              <p>{!!  $fetch->description !!}</p>
            </div>
            <div class="region-list">
              <div class="single-region">
              <h3>{{ $fetch->project_number_2 }}</h3>
                <p>{{ $fetch->project_details_1 }}</p>
              </div>
              <div class="single-region">
              <h3>{{ $fetch->project_number_1 }}</h3>
                <p>{{ $fetch->project_details_1 }}</p>
              </div>
              <div class="single-region">
              <h3>{{ $fetch->team_member }}</h3>
                <p>{{ $fetch->team_details }}</p>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section>

    @endsection

   