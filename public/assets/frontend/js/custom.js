$(".owl-products").owlCarousel({
  items: 5,
  dots: false,
  nav: true,
  loop: true,
  center:true,
  autoplay: true,
  autoplayHoverPause:true,
  slideSpeed: 3000,
  paginationSpeed: 5000,
  smartSpeed:1000,
  navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
  responsive: {
      992: {
          items: 3
      },
      600: {
          items: 3
      },
      320: {
          items: 1
      },
      280: {
          items: 1
      }
  }
});


// COUNTER
$(document).scroll(function () {
  $('.odometer').each(function () {
    var parent_section_postion = $(this).closest('section').position();
    var parent_section_top = parent_section_postion.top;
    if ($(document).scrollTop() > parent_section_top - 300) {
      if ($(this).data('status') == 'yes') {
        $(this).html($(this).data('count'));
        $(this).data('status', 'no');
      }
    }
  });
});

$(".fabrication-box").owlCarousel({
  items: 5,
  dots: true,
  nav: false,
  loop: true,
  center:true,
  autoplay: false,
  autoplayHoverPause:true,
  slideSpeed: 3000,
  paginationSpeed: 5000,
  smartSpeed:1000,
  navText: ["<p>PREV</p>","<p>NEXT</p>"],
  responsive: {
      992: {
          items: 1
      },
      600: {
          items: 1
      },
      320: {
          items: 1
      },
      280: {
          items: 1
      }
  }
});

$('.testimonial').owlCarousel({
loop: true,
margin: 30,
dots: false,
navigation: true,
autoplay: true,
autoplayHoverPause:true,
    autoplaySpeed: 1000,
responsiveClass: true,
responsive: {
    0: {
    items: 1
  },
  400: {
    items: 2
  },
   640: {
    items: 2
  },
  1000: {
    items: 3
  }
}
});

$('.productshome').owlCarousel({
loop: true,
margin: 30,
dots: false,
navigation: true,
autoplay: true,
autoplayHoverPause:true,
    autoplaySpeed: 1000,
responsiveClass: true,
responsive: {
    0: {
    items: 1
  },
  400: {
    items: 2
  },
   640: {
    items: 2
  },
  1000: {
    items: 3
  }
}
});





// var owl = $('.owl-products');
// owl.owlCarousel();
// $('#team-circle-left').click(function () {
//     owl.trigger('prev.owl.carousel');
// });

// $('#team-circle-right').click(function () {
//     owl.trigger('next.owl.carousel');
// });
  


( function( $ ) {
'use strict';



$(function() {
'use strict';



/**
  Header Switcher Button
**/
var skin = $.cookie('skin');
if ( skin == 'light' ) {
  $('body').removeClass('dark-skin');
  $('body').addClass('light-skin');
}
if ( skin == 'dark' ) {
  $('body').removeClass('light-skin');
  $('body').addClass('dark-skin');
}

if ( $('body').hasClass('dark-skin') ) {
  $('.header .switcher-btn').addClass('active');
}
$('.header').on('click', '.switcher-btn', function(){
  if($(this).hasClass('active')) {
    $(this).removeClass('active');
    $('body').removeClass('dark-skin');
    $('body').addClass('light-skin');
    $.cookie('skin', 'light', { expires: 7, path: '/' });
  }
  else {
    $(this).addClass('active');
    $('body').removeClass('light-skin');
    $('body').addClass('dark-skin');
    $.cookie('skin', 'dark', { expires: 7, path: '/' });
  }
  return false;
});

/**
  Header Menu Button
**/
$('.header').on('click', '.menu-btn', function(){
  if($(this).hasClass('active')) {
    $(this).removeClass('active');
    $(this).addClass('no-touch');
    $('.menu-overlay').addClass('no-touch');
    $('body').removeClass('no-scroll');
    $('.menu-full-overlay').removeClass('is-open');
    $('.menu-full-overlay').removeClass('has-scroll');
    $('.menu-full-overlay').removeClass('animate-active');
    setTimeout(function(){
      $('.menu-full-overlay').removeClass('visible');
      $('.menu-btn').removeClass('no-touch');
      $('.menu-overlay').removeClass('no-touch');
    }, 1000);
  }
  else {
    $(this).addClass('active no-touch');
    $('.menu-overlay').addClass('no-touch');
    var height = $(window).height();
    $('.menu-full-overlay').css({'height': height});
    $('body').addClass('no-scroll');
    $('.menu-full-overlay').addClass('is-open visible');
    setTimeout(function(){
      $('.menu-full-overlay').addClass('has-scroll animate-active');
      $('.menu-btn').removeClass('no-touch');
      $('.menu-overlay').removeClass('no-touch');
    }, 1000);
  }
  return false;
});
$('.menu-full-overlay').on('click', '.menu-overlay', function(){
  $('.menu-btn').removeClass('active');
  $('.menu-btn').addClass('no-touch');
  $('.menu-overlay').addClass('no-touch');
  $('body').removeClass('no-scroll');
  $('.menu-full-overlay').removeClass('is-open');
  $('.menu-full-overlay').removeClass('has-scroll');
  $('.menu-full-overlay').removeClass('animate-active');
  setTimeout(function(){
    $('.menu-full-overlay').removeClass('visible');
    $('.menu-btn').removeClass('no-touch');
    $('.menu-overlay').removeClass('no-touch');
  }, 1000);
  return false;
});

/*
  Top Menu
*/
$('.menu-full').on('click', 'a', function(){
  if (!$(this).parent().hasClass('has-children')){
    $('.header .menu-btn.active').trigger('click');
  }
});

/*
  Header Menu Dropdown
*/
$('.menu-full .has-children > a').append('<i class="fas fa-chevron-down"></i>');
$('.menu-full').on('click', '.has-children > a', function(){
  if($(this).closest('li').hasClass('opened')) {
    $(this).closest('li').removeClass('opened');
    $(this).closest('li').addClass('closed');
    $(this).closest('li').find('> ul').slideUp();
  } else {
    $(this).closest('ul').find('> li').removeClass('closed').removeClass('opened');
    $(this).closest('ul').find('> li').find('> ul').slideUp();
    $(this).closest('li').addClass('opened');
    $(this).closest('li').find('> ul').slideDown();
  }
  return false;
});

/*
  Carousel Services
*/
var swiperServices = new Swiper('.js-services', {
  slidesPerView: 3,
  spaceBetween: 40,
  watchSlidesVisibility: true,
  noSwipingSelector: 'a',
  loop: false,
  speed: 1000,
  pagination: {
    el: '.swiper-pagination',
    type: 'bullets',
    clickable: true,
  },
  navigation: false,
  breakpoints: {
    // when window width is >= 320px
    0: {
      slidesPerView: 1,
      spaceBetween: 20
    },
    // when window width is >= 480px
    767: {
      slidesPerView: 2,
      spaceBetween: 30
    },
    // when window width is >= 640px
    1024: {
      slidesPerView: 3,
      spaceBetween: 40
    }
  }
});

/*
  Carousel Testimonials
*/
var swiperTestimonials = new Swiper('.js-testimonials', {
  slidesPerView: 3,
  spaceBetween: 40,
  watchSlidesVisibility: true,
  noSwipingSelector: 'a',
  loop: false,
  speed: 1000,
  pagination: {
    el: '.swiper-pagination',
    type: 'bullets',
    clickable: true,
  },
  navigation: false,
  breakpoints: {
    // when window width is >= 320px
    0: {
      slidesPerView: 1,
      spaceBetween: 20
    },
    // when window width is >= 480px
    767: {
      slidesPerView: 2,
      spaceBetween: 30
    },
    // when window width is >= 640px
    1024: {
      slidesPerView: 3,
      spaceBetween: 40
    }
  }
});

/*
  Initialize portfolio items
*/
var $container = $('.works-items');
$container.imagesLoaded(function() {
  $container.isotope({
    itemSelector: '.works-col',
    percentPosition: true,
  });
});

var $gal_container = $('.m-gallery');
$gal_container.imagesLoaded(function() {
  $gal_container.isotope({
    itemSelector: '.col-lg-6',
    percentPosition: true,
  });
});

/*
  Filter items on button click
*/
$('.filter-links').on( 'click', 'a', function() {
  var filterValue = $(this).attr('data-href');
  $container.isotope({ filter: filterValue });

  $('.filter-links a').removeClass('active');
  $(this).addClass('active');

  if (!$(filterValue).find('.scroll-animate').hasClass('animate__active')) {
    $(filterValue).find('.scroll-animate').addClass('animate__active');
  }

  return false;
});

$('.has-popup-image').magnificPopup({
  type: 'image',
  closeOnContentClick: true,
  mainClass: 'mfp-img-mobile',
  image: {
    verticalFit: true
  }
});

/*
  Video popup
*/
$('.has-popup-video').magnificPopup({
  disableOn: 700,
  type: 'iframe',
  iframe: {
          patterns: {
              youtube_short: {
                index: 'youtu.be/',
                id: 'youtu.be/',
                src: 'https://www.youtube.com/embed/%id%?autoplay=1'
              }
          }
      },
  removalDelay: 160,
  preloader: false,
  fixedContentPos: false,
  mainClass: 'mfp-fade',
  callbacks: {
    markupParse: function(template, values, item) {
      template.find('iframe').attr('allow', 'autoplay');
    }
  }
});

/*
  Music popup
*/
$('.has-popup-audio').magnificPopup({
  disableOn: 700,
  type: 'iframe',
  removalDelay: 160,
  preloader: false,
  fixedContentPos: false,
  mainClass: 'mfp-fade'
});

/**
  Tabs
**/
$('.tab-menu').on('click', '.tab-btn', function(){
  var tab_bl = $(this).attr('href');

  $(this).closest('.tab-menu').find('li').removeClass('active');
  $(this).closest('li').addClass('active');

  $(this).closest('.tabs').find('> .tab-item').hide();
  $(tab_bl).fadeIn();

  return false;
});

/**
  Collapse
**/
$('.lui-collapse-item').on('click', '.lui-collapse-btn', function(){
  if($(this).closest('.lui-collapse-item').hasClass('opened')) {
    $(this).closest('.lui-collapse-item').removeClass('opened');
    $(this).removeClass('active');
  }
  else {
    $(this).closest('.lui-collapse-item').addClass('opened');
    $(this).addClass('active');
  }
});

/**
  Video
**/
$('.m-video-large .video').on('click', '.play, .img', function(){
  $(this).closest('.video').addClass('active');
  var iframe = $(this).closest('.video').find('.js-video-iframe');
  largeVideoPlay(iframe);
  return false;
});
function largeVideoPlay( iframe ) {
  var src = iframe.data('src');
  iframe.attr('src', src);
}

/**
  Cart Popup
**/
$('.header .cart-btn .cart-icon').on('click', function(){
  if($(this).closest('.cart-btn').hasClass('opened')){
    $(this).closest('.cart-btn').removeClass('opened');
    $(this).closest('.cart-btn').find('.cart-widget').hide();
  } else {
    $(this).closest('.cart-btn').addClass('opened');
    $(this).closest('.cart-btn').find('.cart-widget').fadeIn();
  }
  return false;
});

});

function initCursor() {
var mouseX=window.innerWidth/2, mouseY=window.innerHeight/2;

var cursor = {
  el: $('.cursor'),
  x: window.innerWidth/2,
  y: window.innerHeight/2,
  w: 30,
  h: 30,
  update:function() {
    var l = this.x-this.w/2;
    var t = this.y-this.h/2;
    this.el.css({ 'transform':'translate3d('+l+'px,'+t+'px, 0)' });
  }
}

$(window).mousemove (function(e) {
  mouseX = e.clientX;
  mouseY = e.clientY;
});

$('a, .swiper-pagination, .swiper-button-prev, .swiper-button-next, button, .button, .btn, .lnk').hover(function() {
  $('.cursor').addClass("cursor-zoom");
}, function(){
  $('.cursor').removeClass("cursor-zoom");
});

setInterval(move,1000/60);

function move() {
  cursor.x = lerp (cursor.x, mouseX, 0.1);
  cursor.y = lerp (cursor.y, mouseY, 0.1);
  cursor.update()
}

function lerp (start, end, amt) {
  return (1-amt)*start+amt*end
}

/*
  Validate Contact Form
*/
if($('.contacts-form').length) {
$('#cform').validate({
  rules: {
    name: {
      required: true
    },
    message: {
      required: true
    },
    email: {
      required: true,
      email: true
    }
  },
  success: 'valid',
  submitHandler: function() {
    $.ajax({
      url: 'mailer/feedback.php',
      type: 'post',
      dataType: 'json',
      data: 'name='+ $("#cform").find('input[name="name"]').val() + '&email='+ $("#cform").find('input[name="email"]').val() + '&subject='+ $("#cform").find('input[name="subject"]').val() + '&message=' + $("#cform").find('textarea[name="message"]').val(),
      beforeSend: function() {

      },
      complete: function() {

      },
      success: function(data) {
        $('#cform').fadeOut();
        $('.alert-success').delay(1000).fadeIn();
      }
    });
  }
});
}
}

function setHeightFullSection() {
var width = $(window).width();
var height = $(window).height();

/* Set full height in started blocks */
$('.error-page, .menu-full-overlay, .preloader .centrize').css({'height': height});
}

} )( jQuery );
!(function (n, i, e, a) {
(n.navigation = function (t, s) {
  var o = {
      responsive: !0,
      mobileBreakpoint: 991,
      showDuration: 200,
      hideDuration: 200,
      showDelayDuration: 0,
      hideDelayDuration: 0,
      submenuTrigger: "hover",
      effect: "fadeIn",
      submenuIndicator: !0,
      submenuIndicatorTrigger: !1,
      hideSubWhenGoOut: !0,
      visibleSubmenusOnMobile: !1,
      fixed: !1,
      overlay: !0,
      overlayColor: "rgba(0, 0, 0, 0.5)",
      hidden: !1,
      hiddenOnMobile: !1,
      offCanvasSide: "left",
      offCanvasCloseButton: !0,
      animationOnShow: "",
      animationOnHide: "",
      onInit: function () {},
      onLandscape: function () {},
      onPortrait: function () {},
      onShowOffCanvas: function () {},
      onHideOffCanvas: function () {}
    },
    r = this,
    u = Number.MAX_VALUE,
    d = 1,
    l = "click.nav touchstart.nav",
    f = "mouseenter focusin",
    c = "mouseleave focusout";
  r.settings = {};
  var t = (n(t), t);
  n(t).find(".nav-search").length > 0 &&
    n(t)
      .find(".nav-search")
      .find("form")
      .prepend(
        "<span class='nav-search-close-button' tabindex='0'>&#10005;</span>"
      ),
    (r.init = function () {
      (r.settings = n.extend({}, o, s)),
        r.settings.offCanvasCloseButton &&
          n(t)
            .find(".nav-menus-wrapper")
            .prepend(
              "<span class='nav-menus-wrapper-close-button'>&#10005;</span>"
            ),
        "right" == r.settings.offCanvasSide &&
          n(t).find(".nav-menus-wrapper").addClass("nav-menus-wrapper-right"),
        r.settings.hidden &&
          (n(t).addClass("navigation-hidden"),
          (r.settings.mobileBreakpoint = 99999)),
        v(),
        r.settings.fixed && n(t).addClass("navigation-fixed"),
        n(t)
          .find(".nav-toggle")
          .on("click touchstart", function (n) {
            n.stopPropagation(),
              n.preventDefault(),
              r.showOffcanvas(),
              s !== a && r.callback("onShowOffCanvas");
          }),
        n(t)
          .find(".nav-menus-wrapper-close-button")
          .on("click touchstart", function () {
            r.hideOffcanvas(), s !== a && r.callback("onHideOffCanvas");
          }),
        n(t)
          .find(".nav-search-button, .nav-search-close-button")
          .on("click touchstart keydown", function (i) {
            i.stopPropagation(), i.preventDefault();
            var e = i.keyCode || i.which;
            "click" === i.type ||
            "touchstart" === i.type ||
            ("keydown" === i.type && 13 == e)
              ? r.toggleSearch()
              : 9 == e && n(i.target).blur();
          }),
        n(t).find(".megamenu-tabs").length > 0 && y(),
        n(i).resize(function () {
          r.initNavigationMode(C()), O(), r.settings.hiddenOnMobile && m();
        }),
        r.initNavigationMode(C()),
        r.settings.hiddenOnMobile && m(),
        s !== a && r.callback("onInit");
    });
  var h = function () {
      n(t).find(".nav-submenu").hide(0), n(t).find("li").removeClass("focus");
    },
    v = function () {
      n(t)
        .find("li")
        .each(function () {
          n(this).children(".nav-dropdown,.megamenu-panel").length > 0 &&
            (n(this)
              .children(".nav-dropdown,.megamenu-panel")
              .addClass("nav-submenu"),
            r.settings.submenuIndicator &&
              n(this)
                .children("a")
                .append(
                  "<span class='submenu-indicator'><span class='submenu-indicator-chevron'></span></span>"
                ));
        });
    },
    m = function () {
      n(t).hasClass("navigation-portrait")
        ? n(t).addClass("navigation-hidden")
        : n(t).removeClass("navigation-hidden");
    };
  (r.showSubmenu = function (i, e) {
    C() > r.settings.mobileBreakpoint &&
      n(t).find(".nav-search").find("form").fadeOut(),
      "fade" == e
        ? n(i)
            .children(".nav-submenu")
            .stop(!0, !0)
            .delay(r.settings.showDelayDuration)
            .fadeIn(r.settings.showDuration)
            .removeClass(r.settings.animationOnHide)
            .addClass(r.settings.animationOnShow)
        : n(i)
            .children(".nav-submenu")
            .stop(!0, !0)
            .delay(r.settings.showDelayDuration)
            .slideDown(r.settings.showDuration)
            .removeClass(r.settings.animationOnHide)
            .addClass(r.settings.animationOnShow),
      n(i).addClass("focus");
  }),
    (r.hideSubmenu = function (i, e) {
      "fade" == e
        ? n(i)
            .find(".nav-submenu")
            .stop(!0, !0)
            .delay(r.settings.hideDelayDuration)
            .fadeOut(r.settings.hideDuration)
            .removeClass(r.settings.animationOnShow)
            .addClass(r.settings.animationOnHide)
        : n(i)
            .find(".nav-submenu")
            .stop(!0, !0)
            .delay(r.settings.hideDelayDuration)
            .slideUp(r.settings.hideDuration)
            .removeClass(r.settings.animationOnShow)
            .addClass(r.settings.animationOnHide),
        n(i).removeClass("focus").find(".focus").removeClass("focus");
    });
  var p = function () {
      n("body").addClass("no-scroll"),
        r.settings.overlay &&
          (n(t).append("<div class='nav-overlay-panel'></div>"),
          n(t)
            .find(".nav-overlay-panel")
            .css("background-color", r.settings.overlayColor)
            .fadeIn(300)
            .on("click touchstart", function (n) {
              r.hideOffcanvas();
            }));
    },
    g = function () {
      n("body").removeClass("no-scroll"),
        r.settings.overlay &&
          n(t)
            .find(".nav-overlay-panel")
            .fadeOut(400, function () {
              n(this).remove();
            });
    };
  (r.showOffcanvas = function () {
    p(),
      "left" == r.settings.offCanvasSide
        ? n(t)
            .find(".nav-menus-wrapper")
            .css("transition-property", "left")
            .addClass("nav-menus-wrapper-open")
        : n(t)
            .find(".nav-menus-wrapper")
            .css("transition-property", "right")
            .addClass("nav-menus-wrapper-open");
  }),
    (r.hideOffcanvas = function () {
      n(t)
        .find(".nav-menus-wrapper")
        .removeClass("nav-menus-wrapper-open")
        .on(
          "webkitTransitionEnd moztransitionend transitionend oTransitionEnd",
          function () {
            n(t)
              .find(".nav-menus-wrapper")
              .css("transition-property", "none")
              .off();
          }
        ),
        g();
    }),
    (r.toggleOffcanvas = function () {
      C() <= r.settings.mobileBreakpoint &&
        (n(t).find(".nav-menus-wrapper").hasClass("nav-menus-wrapper-open")
          ? (r.hideOffcanvas(), s !== a && r.callback("onHideOffCanvas"))
          : (r.showOffcanvas(), s !== a && r.callback("onShowOffCanvas")));
    }),
    (r.toggleSearch = function () {
      "none" == n(t).find(".nav-search").find("form").css("display")
        ? (n(t).find(".nav-search").find("form").fadeIn(200),
          n(t).find(".nav-search").find("input").focus())
        : (n(t).find(".nav-search").find("form").fadeOut(200),
          n(t).find(".nav-search").find("input").blur());
    }),
    (r.initNavigationMode = function (i) {
      r.settings.responsive
        ? (i <= r.settings.mobileBreakpoint &&
            u > r.settings.mobileBreakpoint &&
            (n(t)
              .addClass("navigation-portrait")
              .removeClass("navigation-landscape"),
            S(),
            s !== a && r.callback("onPortrait")),
          i > r.settings.mobileBreakpoint &&
            d <= r.settings.mobileBreakpoint &&
            (n(t)
              .addClass("navigation-landscape")
              .removeClass("navigation-portrait"),
            k(),
            g(),
            r.hideOffcanvas(),
            s !== a && r.callback("onLandscape")),
          (u = i),
          (d = i))
        : (n(t).addClass("navigation-landscape"),
          k(),
          s !== a && r.callback("onLandscape"));
    });
  var b = function () {
      n("html").on("click.body touchstart.body", function (i) {
        0 === n(i.target).closest(".navigation").length &&
          (n(t).find(".nav-submenu").fadeOut(),
          n(t).find(".focus").removeClass("focus"),
          n(t).find(".nav-search").find("form").fadeOut());
      });
    },
    C = function () {
      return (
        i.innerWidth || e.documentElement.clientWidth || e.body.clientWidth
      );
    },
    w = function () {
      n(t).find(".nav-menu").find("li, a").off(l).off(f).off(c);
    },
    O = function () {
      if (C() > r.settings.mobileBreakpoint) {
        var i = n(t).outerWidth(!0);
        n(t)
          .find(".nav-menu")
          .children("li")
          .children(".nav-submenu")
          .each(function () {
            n(this).parent().position().left + n(this).outerWidth() > i
              ? n(this).css("right", 0)
              : n(this).css("right", "auto");
          });
      }
    },
    y = function () {
      function i(i) {
        var e = n(i).children(".megamenu-tabs-nav").children("li"),
          a = n(i).children(".megamenu-tabs-pane");
        n(e).on("click.tabs touchstart.tabs", function (i) {
          i.stopPropagation(),
            i.preventDefault(),
            n(e).removeClass("active"),
            n(this).addClass("active"),
            n(a).hide(0).removeClass("active"),
            n(a[n(this).index()]).show(0).addClass("active");
        });
      }
      if (n(t).find(".megamenu-tabs").length > 0)
        for (var e = n(t).find(".megamenu-tabs"), a = 0; a < e.length; a++)
          i(e[a]);
    },
    k = function () {
      w(),
        h(),
        navigator.userAgent.match(/Mobi/i) ||
        navigator.maxTouchPoints > 0 ||
        "click" == r.settings.submenuTrigger
          ? n(t)
              .find(".nav-menu, .nav-dropdown")
              .children("li")
              .children("a")
              .on(l, function (e) {
                if (
                  (r.hideSubmenu(
                    n(this).parent("li").siblings("li"),
                    r.settings.effect
                  ),
                  n(this)
                    .closest(".nav-menu")
                    .siblings(".nav-menu")
                    .find(".nav-submenu")
                    .fadeOut(r.settings.hideDuration),
                  n(this).siblings(".nav-submenu").length > 0)
                ) {
                  if (
                    (e.stopPropagation(),
                    e.preventDefault(),
                    "none" == n(this).siblings(".nav-submenu").css("display"))
                  )
                    return (
                      r.showSubmenu(n(this).parent("li"), r.settings.effect),
                      O(),
                      !1
                    );
                  if (
                    (r.hideSubmenu(n(this).parent("li"), r.settings.effect),
                    "_blank" === n(this).attr("target") ||
                      "blank" === n(this).attr("target"))
                  )
                    i.open(n(this).attr("href"));
                  else {
                    if (
                      "#" === n(this).attr("href") ||
                      "" === n(this).attr("href") ||
                      "javascript:void(0)" === n(this).attr("href")
                    )
                      return !1;
                    i.location.href = n(this).attr("href");
                  }
                }
              })
          : n(t)
              .find(".nav-menu")
              .find("li")
              .on(f, function () {
                r.showSubmenu(this, r.settings.effect), O();
              })
              .on(c, function () {
                r.hideSubmenu(this, r.settings.effect);
              }),
        r.settings.hideSubWhenGoOut && b();
    },
    S = function () {
      w(),
        h(),
        r.settings.visibleSubmenusOnMobile
          ? n(t).find(".nav-submenu").show(0)
          : (n(t)
              .find(".submenu-indicator")
              .removeClass("submenu-indicator-up"),
            r.settings.submenuIndicator && r.settings.submenuIndicatorTrigger
              ? n(t)
                  .find(".submenu-indicator")
                  .on(l, function (i) {
                    return (
                      i.stopPropagation(),
                      i.preventDefault(),
                      r.hideSubmenu(
                        n(this).parent("a").parent("li").siblings("li"),
                        "slide"
                      ),
                      r.hideSubmenu(
                        n(this)
                          .closest(".nav-menu")
                          .siblings(".nav-menu")
                          .children("li"),
                        "slide"
                      ),
                      "none" ==
                      n(this)
                        .parent("a")
                        .siblings(".nav-submenu")
                        .css("display")
                        ? (n(this).addClass("submenu-indicator-up"),
                          n(this)
                            .parent("a")
                            .parent("li")
                            .siblings("li")
                            .find(".submenu-indicator")
                            .removeClass("submenu-indicator-up"),
                          n(this)
                            .closest(".nav-menu")
                            .siblings(".nav-menu")
                            .find(".submenu-indicator")
                            .removeClass("submenu-indicator-up"),
                          r.showSubmenu(
                            n(this).parent("a").parent("li"),
                            "slide"
                          ),
                          !1)
                        : (n(this)
                            .parent("a")
                            .parent("li")
                            .find(".submenu-indicator")
                            .removeClass("submenu-indicator-up"),
                          void r.hideSubmenu(
                            n(this).parent("a").parent("li"),
                            "slide"
                          ))
                    );
                  })
              : n(t)
                  .find(".nav-menu, .nav-dropdown")
                  .children("li")
                  .children("a")
                  .on(l, function (e) {
                    if (
                      (e.stopPropagation(),
                      e.preventDefault(),
                      r.hideSubmenu(
                        n(this).parent("li").siblings("li"),
                        r.settings.effect
                      ),
                      r.hideSubmenu(
                        n(this)
                          .closest(".nav-menu")
                          .siblings(".nav-menu")
                          .children("li"),
                        "slide"
                      ),
                      "none" ==
                        n(this).siblings(".nav-submenu").css("display"))
                    )
                      return (
                        n(this)
                          .children(".submenu-indicator")
                          .addClass("submenu-indicator-up"),
                        n(this)
                          .parent("li")
                          .siblings("li")
                          .find(".submenu-indicator")
                          .removeClass("submenu-indicator-up"),
                        n(this)
                          .closest(".nav-menu")
                          .siblings(".nav-menu")
                          .find(".submenu-indicator")
                          .removeClass("submenu-indicator-up"),
                        r.showSubmenu(n(this).parent("li"), "slide"),
                        !1
                      );
                    if (
                      (n(this)
                        .parent("li")
                        .find(".submenu-indicator")
                        .removeClass("submenu-indicator-up"),
                      r.hideSubmenu(n(this).parent("li"), "slide"),
                      "_blank" === n(this).attr("target") ||
                        "blank" === n(this).attr("target"))
                    )
                      i.open(n(this).attr("href"));
                    else {
                      if (
                        "#" === n(this).attr("href") ||
                        "" === n(this).attr("href") ||
                        "javascript:void(0)" === n(this).attr("href")
                      )
                        return !1;
                      i.location.href = n(this).attr("href");
                    }
                  }));
    };
  (r.callback = function (n) {
    s[n] !== a && s[n].call(t);
  }),
    r.init();
}),
  (n.fn.navigation = function (i) {
    return this.each(function () {
      if (a === n(this).data("navigation")) {
        var e = new n.navigation(this, i);
        n(this).data("navigation", e);
      }
    });
  });
})(jQuery, window, document);
(function ($) {
"use strict";

var $window = $(window);

if ($.fn.navigation) {
  $("#navigation1").navigation();
  $("#always-hidden-nav").navigation({
    hidden: true
  });
}

$window.on("load", function () {
  $("#preloader").fadeOut("slow", function () {
    $(this).remove();
  });
});
})(jQuery);


$(document).ready(function() {
  var owl = $('.our_services_section .owl-carousel');
  owl.owlCarousel({
      margin: 30,
      nav: false,
      loop: true,
      dots: true,
      autoplay: true,
      autoplayTimeout: 4500,
      responsive: {
          0: {
              items: 1
          },
          576: {
              items: 1
          },
          768: {
              items: 2
          },
          992: {
              items: 1
          },
          1200: {
              items: 2
          },
          1440: {
              items: 2
          }
      }
  })
})

$(document).ready(function() {
  var owl = $('.about-slider');
  owl.owlCarousel({
      margin: 20,
      nav: false,
      loop: true,
      dots: true,
      autoplay: false,
      autoplayTimeout: 4500,
      responsive: {
          0: {
              items: 1
          },
          576: {
              items: 1
          },
          768: {
              items: 2
          },
          992: {
              items: 3
          },
          1200: {
              items: 3
          },
          1440: {
              items: 3
          }
      }
  })
})

$(document).ready(function() {
  var owl = $('.clients');
  owl.owlCarousel({
      margin: 15,
      nav: false,
      loop: true,
      dots: false,
      autoplay: true,
      navText: ["<img src='public/assets/frontend/images/icons/left.png'>","<img src='public/assets/frontend/images/icons/right.png'>"],
      autoplayTimeout: 4500,
      responsive: {
          0: {
              items: 2
          },
          576: {
              items: 3
          },
          768: {
              items: 4
          },
          992: {
              items: 6
          },
          1200: {
              items: 9
          },
          1440: {
              items: 10
          }
      }
  })
})

$(document).ready(function() {
  var owl = $('.innovations');
  owl.owlCarousel({
      margin: 15,
      nav: true,
      loop: true,
      dots: false,
      autoplay: false,
      navText: ["<img src='public/assets/frontend/images/icons/left.png'>","<img src='public/assets/frontend/images/icons/right.png'>"],
      autoplayTimeout: 4500,
      responsive: {
          0: {
              items: 1
          },
          576: {
              items: 1
          },
          768: {
              items: 1
          },
          992: {
              items: 2
          },
          1200: {
              items: 2
          },
          1440: {
              items: 2
          }
      }
  })
})


$(document).ready(function() {
  var owl = $('.featured');
  owl.owlCarousel({
      margin: 15,
      nav: true,
      loop: true,
      dots: false,
      autoplay: false,
      navText: ["<img src='http://localhost/aiplProject/public/assets/frontend/images/icons/left.png'>","<img src='http://localhost/aiplProject/public/assets/frontend/images/icons/right.png'>"],
      autoplayTimeout: 4500,
      responsive: {
          0: {
              items: 1
          },
          576: {
              items: 1
          },
          768: {
              items: 2
          },
          992: {
              items: 3
          },
          1200: {
              items: 3
          },
          1440: {
              items: 4
          }
      }
  })
})


$(document).ready(function() {
  var owl = $('.history');
  owl.owlCarousel({
      margin: 15,
      nav: true,
      loop: true,
      dots: false,
      autoplay: false,
      navText: ["<img src='public/assets/frontend/images/icons/left.png'>","<img src='public/assets/frontend/images/icons/right.png'>"],
      autoplayTimeout: 4500,
      responsive: {
          0: {
              items: 1
          },
          640: {
              items: 1
          },
          991: {
              items: 1
          },
          1200: {
              items: 1
          },
          1440: {
              items: 1
          }
      }
  })
})



$('#similar').owlCarousel({
loop: true,
margin: 30,
stagePadding: 20,
dots: false,
navigation: true,
autoplay: true,
autoplayHoverPause:true,
autoplaySpeed: 1000,
responsiveClass: true,
responsive: {
    0: {
    items: 1
  },
  400: {
    items: 2
  },
   640: {
    items: 3
  },
  1000: {
    items: 4
  }
}
});

$('.team').owlCarousel({
loop: true,
margin: 30,
dots: false,
navigation: true,
autoplay: true,
autoplayHoverPause:true,
    autoplaySpeed: 1000,
responsiveClass: true,
responsive: {
    0: {
    items: 1
  },
  400: {
    items: 2
  },
   640: {
    items: 3
  },
  1000: {
    items: 4
  }
}
});