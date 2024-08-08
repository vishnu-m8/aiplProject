<!DOCTYPE html>
<html lang="en">
  <head>
    <title>AIPL</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('public/assets/frontend/images/home/favicon.png') }}" sizes="32x32" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('public/assets/frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/frontend/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/frontend/css/hover.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/frontend/css/header.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/frontend/css/lightslider.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <link rel="stylesheet" href="{{ asset('public/assets/frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/frontend/css/media.css') }}">
    


  </head>
  <body>

    <header class="main-header">
      <div class="container-fluid">
        <div class="main-menu sticky-header">
          <div class="row">
            <div class="col-md-12">
              <header class="header_area">
                <div class="main_header_area animated">
                  <div class="container-fluid">
                    <nav id="navigation1" class="navigation">
                      <div class="nav-header">
                        <a class="nav-brand" href="{{ route('home_show') }}">
                          <img src="{{ asset('public/assets/frontend/images/home/logo.png') }}" alt="logo" class="img-responsive">
                        </a>
                        <div class="nav-toggle"></div>
                      </div>
                      <div class="nav-menus-wrapper">
                        <ul class="nav-menu align-to-right">
                          <li><a href="{{ route('home_show') }}">Home</a></li>
                          <li><a href="{{ route('about_show') }}">About Us</a></li>
                          <li>
                            <a href="#">Expertise</a>
                            <ul class="nav-dropdown">
                            
                                <li><a href="{{ route('quality_show') }}">Quality</a></li>
                                <li><a href="{{ route('products_show') }}">Products</a></li>
                            </ul>
                          </li>
                          <li><a href="{{ route('projects_show') }}">Projects</a></li>
                          <li><a href="{{ route('manufacturing_list') }}">Fabrication Plant</a></li>
                          <li><a href="{{ route('client_show') }}">Clients</a></li>
                          <li><a href="{{ route('contact_show') }}">Contact</a></li>
                        </ul>
                      </div>
                    </nav>
                  </div>
                </div>
              </header>
            </div>
          </div>
        </div>
      </div>
    </header>

    @yield('content')

    <section class="footer-style-eleven theme-basic-footer">
      <img src="{{ asset('public/assets/frontend/images/bg/square-img.png') }}" class="footer-icon">
      <div class="bg-wrapper">
        <div class="container-fluid">
          <div class="row justify-content-between">
            <div class="col-xl-offset-2 col-xl-3 col-lg-offset-2 col-lg-3 col-sm-12 footer-intro">
              <div class="footer-logo">
                <img src="{{ asset('public/assets/frontend/images/home/footer-logo.png') }}" class="img-responsive">
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-6 footer-middle-box">
              <div class="col-xl-6 col-lg-6 col-sm-6">
                <h5 class="footer-title">Links</h5>
                <ul class="footer-nav-link style-none">
                  <li><a href="{{ route('about_show') }}" class="line-hover">About Us</a></li>
                  <li><a href="{{ route('projects_show') }}" class="line-hover">Projects</a></li>
                  <li><a href="#" class="line-hover">Careers</a></li>
                  <li><a href="{{ route('contact_show') }}" class="line-hover">Contact Us</a></li>
                </ul>
              </div>
              <div class="col-xl-6 col-lg-6 col-sm-6">
                <h5 class="footer-title">Links</h5>
                <ul class="footer-nav-link style-none">
                  <li>
                    <!-- <a href="#" class="line-hover">Expertise</a> -->
                  </li>
                  <li><a href="{{ route('quality_show') }}" class="line-hover">Quality</a></li>
                  <li>
                    <a href="{{ route('manufacturing_list') }}" class="line-hover">Manufacturing Expertise</a>
                  </li>
                  <li>
                    <a href="{{ route('products_show') }}" class="line-hover">Products</a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-12 form-widget">
              <div class="footer-intro" id="social-bottom">
                <h6>Call us</h6>
                <a href="tel:+91-9028464755">+91-9028464755</a>
                <br>
                <br>
                <h6>Mail us</h6>     
                <a href="mailto:sales@alumayerindia.com">sales@alumayerindia.com </a>
                <a href="mailto:contracts@alumayerindia.com">contracts@alumayerindia.com </a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="footer-social-wrap">
        <div class="shapes shape-five"></div>
        <div class="shapes shape-six"></div>
        <div class="shapes shape-seven"></div>
        <!-- <div class="container">
          <div class="footer-social">
            <a href="#"><i class="fa fa-facebook"></i> Facebook</a>
            <a href="#"><i class="fa fa-twitter"></i> Twitter</a>
            <a href="#"><i class="fa fa-linkedin"></i> Linkedin</a>
          </div>
        </div> -->
      </div>
      <div class="bottom-footer">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div id="copyright" class="text-center">
                Copyright © 2024 Alumayer. All rights reserved. Designed By <a href="http://www.matrixbricks.com" target="_blank">Matrix Bricks</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="back-to-top">
        <div class="button js-scroll-to">
          <svg id="scroll" class="back-to-top-arrow" width="135" height="93" viewBox="0 0 135 93" fill="none" xmlns="http://www.w3.org/2000/svg"style="" >
            <path d="M13.0361 45.766L3.37322 51.4289L5.38762 54.8662C6.48785 56.7435 8.22794 57.2444 10.0225 56.1927C11.2234 55.4889 11.6933 54.3604 11.524 53.2171C12.2113 53.6304 13.1984 53.7009 14.0543 53.1993C15.6418 52.269 15.9242 50.694 14.9453 49.0237L13.0361 45.766ZM8.65429 49.9659L9.8516 52.0089C10.604 53.2927 10.4596 54.2489 9.28629 54.9366C8.09914 55.6323 7.19435 55.2909 6.44199 54.0072L5.24468 51.9641L8.65429 49.9659ZM13.7453 49.6343C14.2712 50.5315 14.1878 51.4335 13.2491 51.9836C12.3104 52.5337 11.4965 52.1576 10.9707 51.2604L9.81383 49.2864L12.5885 47.6603L13.7453 49.6343Z" fill="#f7aa11"></path>
            <path d="M11.1203 63.3664L12.0768 64.3996L14.9463 63.0948L17.8595 66.2413L16.3379 69.0019L17.2945 70.0351L22.8824 59.5848L21.9693 58.5986L11.1203 63.3664ZM16.2369 62.5104L21.0874 60.3309L18.5413 64.9995L16.2369 62.5104Z" fill="#f7aa11"></path>
            <path d="M31.4874 76.2985C30.1869 77.3131 28.8327 77.4622 27.6117 76.64C25.8997 75.4872 25.4567 73.395 27.0742 70.9929C28.6917 68.5907 30.7969 68.2143 32.509 69.3671C33.73 70.1893 34.1011 71.5001 33.65 73.0867L35.0015 73.5145C35.6893 71.6051 35.1973 69.5571 33.2596 68.2523C31.0964 66.7957 28.0023 67.0077 25.8665 70.1796C23.7307 73.3516 24.6978 76.2982 26.8611 77.7549C28.7987 79.0596 30.8815 78.7453 32.3921 77.3899L31.4874 76.2985Z" fill="#f7aa11"></path>
            <path d="M45.7552 86.8243L43.3289 79.3049L49.3556 76.2118L47.6793 75.5783L42.1835 78.3076L43.773 74.1019L42.456 73.6041L38.4963 84.0808L39.8134 84.5786L41.8102 79.2954L44.0789 86.1908L45.7552 86.8243Z" fill="#f7aa11"></path>
            <path d="M62.4261 80.0538L65.658 80.0771L65.5867 89.9329L66.9947 89.9431L67.0659 80.0873L70.2979 80.1107L70.3076 78.7667L62.4358 78.7098L62.4261 80.0538Z" fill="#f7aa11"></path>
            <path d="M80.0677 77.2169C77.4582 77.7917 75.5915 80.2508 76.3935 83.8915C77.1954 87.5323 79.9226 88.9795 82.5321 88.4047C85.1415 87.8299 87.0082 85.3708 86.2062 81.73C85.4043 78.0893 82.6771 76.6421 80.0677 77.2169ZM80.3568 78.5294C82.2943 78.1026 84.1545 79.1838 84.7843 82.0433C85.4142 84.9027 84.1805 86.6654 82.2429 87.0922C80.3054 87.5189 78.4453 86.4378 77.8154 83.5783C77.1855 80.7189 78.4192 78.9562 80.3568 78.5294Z" fill="#f7aa11"></path>
            <path d="M97.8565 72.1114L100.55 70.3257L105.996 78.5406L107.17 77.7627L101.724 69.5477L104.418 67.762L103.675 66.6417L97.1139 70.9912L97.8565 72.1114Z" fill="#f7aa11"></path>
            <path d="M110.904 59.9055C109.061 61.8397 108.886 64.9221 111.585 67.4941C114.284 70.0661 117.354 69.7433 119.197 67.8091C121.041 65.8749 121.216 62.7924 118.517 60.2204C115.818 57.6484 112.748 57.9712 110.904 59.9055ZM111.877 60.8327C113.246 59.3965 115.393 59.2544 117.513 61.2744C119.632 63.2945 119.593 65.4456 118.224 66.8819C116.856 68.3181 114.709 68.4602 112.589 66.4401C110.47 64.4201 110.509 62.2689 111.877 60.8327Z" fill="#f7aa11"></path>
            <path d="M125.244 51.5837C126.304 49.7754 125.85 48.0814 124.166 47.0945C122.482 46.1075 120.782 46.5394 119.722 48.3477L117.748 51.7159L127.411 57.3789L128.123 56.1641L123.982 53.7371L125.244 51.5837ZM124.125 50.8351L122.822 53.0576L119.62 51.1807L120.922 48.9583C121.505 47.9644 122.408 47.752 123.43 48.3506C124.451 48.9493 124.707 49.8412 124.125 50.8351Z" fill="#f7aa11"></path>
            <path class="path-arrow" d="M67.3536 0.646446C67.1583 0.451183 66.8417 0.451183 66.6464 0.646446L63.4645 3.82843C63.2692 4.02369 63.2692 4.34027 63.4645 4.53553C63.6597 4.7308 63.9763 4.7308 64.1716 4.53553L67 1.70711L69.8284 4.53553C70.0237 4.7308 70.3403 4.7308 70.5355 4.53553C70.7308 4.34027 70.7308 4.02369 70.5355 3.82843L67.3536 0.646446ZM67.5 42L67.5 1L66.5 1L66.5 42L67.5 42Z" fill="#f7aa11"></path>
          </svg>
        </div>
      </div>
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="{{ asset('public/assets/frontend/js/lightslider.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    <script src="{{ asset('public/assets/frontend/js/owl.carousel.js') }}"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="{{ asset('public/assets/frontend/js/custom.js') }}"></script>
    <script>
        AOS.init({
            once: true
        });
        
        // lightslider start
        $(document).ready(function() {
            $("#content-slider").lightSlider({
                loop:true,
                keyPress:true
            });
            
            $('#image-gallery').lightSlider({
                gallery:true,
                item:1,
                verticalHeight: 100,
                thumbItem:5,
                galleryMargin: 30,
                adaptiveHeight :true,
                thumbMargin: 10,
                speed:500,
                auto:true,
                loop:true,
                onSliderLoad: function() {
                    $('#image-gallery').removeClass('cS-hidden');
                }  
            });
        });
        // lightslider end
     </script>
  </body>
</html>