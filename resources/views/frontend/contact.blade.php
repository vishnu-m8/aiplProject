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
                <li>Contact</li>
              </ul>
              <h2>Let's get in touch</h2>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="contact-wrap">
      <div class="container">
        <div class="row">
          <div class="col-md-offset-1 col-md-10 col-sm-12">
            <div class="contact-form-wrap aos-init aos-animate" data-aos="fade-up" data-aos-duration="1400">
              <div class="bottom-box"></div>
              <div class="heading">
                <h6>Connect Now</h6>
                <h2>Fill out the contact form</h2>
              </div>
              <form action="{{ route('sendContactForm') }}" method="POST">
                @csrf
                <div class="form-group col-md-4">
                  <label>First Name</label>
                  <input type="text" class="form-control" name="first_name" required="">
                </div>
                <div class="form-group col-md-4">
                  <label>Last Name</label>
                  <input type="text" class="form-control" name="last_name" required="">
                </div>
                <div class="form-group col-md-4">
                  <label>Email</label>
                  <input type="email" class="form-control" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                </div>
                <div class="form-group col-md-4">
                  <label>Phone</label>
                  <input type="text" class="form-control" name="phone_no" oninput="this.value = this.value.replace(/[^0-9]/g, '');" minlength="10" maxlength="12" required="">
                </div>
                <div class="form-group col-md-4">
                  <label>Location</label>
                  <input type="text" class="form-control" name="location" required="">
                </div>
                <div class="form-group col-md-4">
                  <label>Subject</label>
                  <input type="text" class="form-control" name="subject" required="">
                </div>
                <div class="form-group col-md-12">
                  <label>Comment</label>
                  <textarea type="text" class="form-control" name="comment" required=""></textarea>
                </div>
                <div class="form-group text-center col-md-12">
                <button type="submit" class="btn btn-default">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="row mT90">
          <div class="col-md-7">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3769.9353870606933!2d73.01347747502838!3d19.110490282101267!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c0e3fffffff9%3A0xf6fe3b306f4ab2ea!2sAlumayer!5e0!3m2!1sen!2sin!4v1709869623736!5m2!1sen!2sin" width="100%" height="550" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
          <div class="col-md-5">
            @foreach($contactUs_fetch as $fetch)   
            <div class="office-info">
              <div class="office-info-item">
                <div class="office-info-icon">
                  <div class="icon">
                    <img src="{{ asset('public/assets/frontend/images/icons/phone-call.png') }}">
                  </div>
                </div>
                <div class="office-info-text">
                  <h2>Call Us:</h2>
                  <a href="tel:+91-9833460472">{{ $fetch->call_us}}</a>
                </div>
              </div>
              <div class="office-info-item">
                <div class="office-info-icon">
                  <div class="icon">
                    <img src="{{ asset('public/assets/frontend/images/icons/envelope.png') }}">
                  </div>
                </div>
                <div class="office-info-text">
                  <h2>Mail Us:</h2>
                  <a href="mailto:sales@alumayerindia.com">{{ $fetch->mail_us}}</a>
                </div>
              </div>
              <div class="office-info-item">
                <div class="office-info-icon">
                  <div class="icon">
                    <img src="{{ asset('public/assets/frontend/images/icons/push-pin.png') }}">
                  </div>
                </div>
                <div class="office-info-text">
                  <h2>Our Hours:</h2>
                  <p>{!! $fetch->our_hours !!}</p>
                </div>
              </div>
              <div class="office-info-item social-info-item">
                <div class="office-info-icon">
                  <div class="icon">
                    <img src="{{ asset('public/assets/frontend/images/icons/social.png') }}">
                  </div>
                </div>
                <div class="office-info-text">
                  <h2>Connect with us:</h2>
                  <a href="#"><i class="fa fa-linkedin"></i>{{ $fetch->contact_with}}</a>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </section>
    @endsection

   