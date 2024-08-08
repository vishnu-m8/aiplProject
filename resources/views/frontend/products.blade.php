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
                            <li>Products</li>
                        </ul>
                        <h2>Our Product Range</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="product-range-section">
        <div class="container">
            <div class="row">
                @foreach($product_fetch as $fetch)
                    <div class="col-md-4 col-sm-6">
                        <a href="{{ route('product_details', ['slug' => $fetch->slug]) }}">
                            <div class="product-range-box">
                                <div class="product-img">
                                    <img src="{{ asset('public/product/image/'.$fetch->image) }}" alt="" class="img-responsive">
                                </div>
                                <div class="product-range-content">
                                    <h4>{{ $fetch->title }}</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="values-chain-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="about-text text-center mB60">
                        <div class="heading aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
                            <h6>Our Value Chain</h6>
                            <h2>Facade &amp; Fenestration Projects</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="values-chain-main">
                        @foreach($product_details_fetch as $fetch)
                            <div class="timeline">
                                <div class="timeline-content">
                                    <div class="timeline-year">{{ $loop->iteration }}</div>
                                    <h3 class="title">{{ $fetch->title}}</h3>
                                    <ul class="values-chain-listing">
                                        <li>{!! $fetch->description !!}</li>
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
