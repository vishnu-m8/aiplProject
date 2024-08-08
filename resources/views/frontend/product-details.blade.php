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
							<li>{{ $fetch_product_details->title }}</li>
						</ul>
						<h2>{{ $fetch_product_details->title }}</h2>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="product-detail-wrap">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="product-detail-img">
						<ul id="image-gallery" class="thumbnail_slider_img  list-unstyled cS-hidden">
						    @php
						        $list_product_images    = DB::table('product_images')
                                                        ->where('product_id', $fetch_product_details->id)
                                                        ->where('status', '1')
                                                        ->get();
						    @endphp
						    
						    @if(COUNT($list_product_images) > 0)
    						    @foreach($list_product_images AS $list_product_images_ind)
        							<li data-thumb="{{ asset('public/product/image/'.$list_product_images_ind->img_src) }}"> 
        								<a data-fancybox="gallery" href="{{ asset('public/product/image/'.$list_product_images_ind->img_src) }}">
        								    <img class="img-responsive" src="{{ asset('public/product/image/'.$list_product_images_ind->img_src) }}" />
        								</a>
        							</li>
        						@endforeach
        					@else
        					    <li data-thumb="{{ asset('public/product/image/'.$fetch_product_details->image) }}"> 
    								<a data-fancybox="gallery" href="{{ asset('public/product/image/'.$fetch_product_details->image) }}">
    								    <img class="img-responsive" src="{{ asset('public/product/image/'.$fetch_product_details->image) }}" />
    								</a>
    							</li>
        					@endif
						</ul>
					</div>
				</div>
				<div class="col-md-6">
					<div class="product-detail-box">
						<h2>{{ $fetch_product_details->title }}</h2>
						
						{!! $fetch_product_details->description !!}
					</div>
				</div>
			</div>
		</div>
	</section>
	
	@php
        $list_product_projects  = DB::table('product_projects')
                                ->join('projects', 'projects.id', '=', 'product_projects.project_id')
                                ->where('product_projects.product_id', $fetch_product_details->id)
                                ->where('product_projects.status', '1')
                                ->select('product_projects.*', 'projects.title', 'projects.image', 'projects.slug', 'projects.description', 'projects.client', 'projects.area', 'projects.consultant', 'projects.project_type')
                                ->get();
    @endphp
    
    @if(COUNT($list_product_projects) > 0)
    	<section class="similar-product-wrap">
    		<div class="container">
    			<div class="heading text-center">
    				<h2>Product used in projects</h2>
    			</div>
    			<div class="row">
    				<div class="col-md-12">
    					<div class="owl-carousel owl-theme" id="similar">
    					    @foreach($list_product_projects AS $list_product_projects_ind)
        						<div class="item">
        							<div class="single-portfolio">
        								<div class="mi-media">
        									<a href="{{ route('projects_slug_details', ['slug' => $list_product_projects_ind->slug]) }}">
        									    <img src="{{ asset('public/projects/image/'.$list_product_projects_ind->image) }}" alt="" class="img-responsive">
        									</a>
        									<h4>{{ $list_product_projects_ind->title }}</h4>
        									
        									@if(isset($list_product_projects_ind->description) || isset($list_product_projects_ind->client) || isset($list_product_projects_ind->area) || isset($list_product_projects_ind->consultant) || isset($list_product_projects_ind->project_type))
            									<div class="project-social">
            										<a href="{{ route('projects_slug_details', ['slug' => $list_product_projects_ind->slug]) }}" class="link-btn"><i class="fa fa-long-arrow-right"></i></a>
            									</div>
            								@endif
        								</div>
        							</div>
        						</div>
        					@endforeach
    					</div>
    				</div>
    			</div>
    		</div>
    	</section>
    @endif
@endsection
