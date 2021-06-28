
<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <!-- Site Title-->
    <title>BusTravel</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <link rel="icon" href="{{ asset('themes/travelagency/assets/images/favicon.ico')}}" type="image/x-icon">
    <!-- Stylesheets -->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Oswald:200,400%7CLato:300,400,300italic,700%7CMontserrat:900">
    <link rel="stylesheet" href="{{ asset('themes/travelagency/assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/travelagency/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/travelagency/assets/css/fonts.css') }}">

		<!--[if lt IE 10]>
    <div style="background: #212121; padding: 10px 0; box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3); clear: both; text-align:center; position: relative; z-index:1;"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
    <script src="js/html5shiv.min.js"> </script>
		<![endif]-->
  </head>
  <body>
    <!-- Page preloader-->
    @include('themes.travelagency.partials.page_preloader')
    <!-- Page-->
    {{-- <div class="page"><a class="section section-banner text-center d-none d-xl-block" href="https://www.templatemonster.com/intense-multipurpose-html-template.html" style="background-image: url({{ asset('themes/travelagency/assets/images/banner/background-04-1920x60.jpg') }}); background-image: -webkit-image-set( url({{ asset('themes/travelagency/assets/images/banner/background-04-1920x60.jpg') }}) 1x, url({{ asset('themes/travelagency/assets/images/banner/background-04-3840x120.jpg') }}) 2x )"><img src="{{ asset('themes/travelagency/assets/images/banner/foreground-04-1600x60.png') }}" srcset="{{ asset('themes/travelagency/assets/images/banner/foreground-04-1600x60.png') }} 1x, {{ asset('themes/travelagency/assets/images/banner/foreground-04-3200x120.png') }} 2x" alt="" width="1600" height="310"></a> --}}
    <div class="page">
      <!-- Page Header-->
      @include('themes.travelagency.partials.header')
      @include('themes.travelagency.partials.swiper_and_form')

      @include('themes.travelagency.partials.upselling')

      <!-- our advantages-->
      @include('themes.travelagency.partials.advantages')

      <!-- Tips & tricks-->
      @include('themes.travelagency.partials.news')

      @include('themes.travelagency.partials.testimonials')

      @include('themes.travelagency.partials.action')
      {{-- <a class="section section-banner" href="https://www.templatemonster.com/intense-multipurpose-html-template.html" style="background-image: url({{ asset('themes/travelagency/assets/images/banner/background-03-1920x310.jpg') }}); background-image: -webkit-image-set( url({{ asset('themes/travelagency/assets/images/banner/background-03-1920x310.jpg') }}) 1x, url({{ asset('themes/travelagency/assets/images/banner/background-03-3840x620.jpg') }}) 2x )"><img src="{{ asset('themes/travelagency/assets/images/banner/foreground-03-1600x310.png') }}" srcset="{{ asset('themes/travelagency/assets/images/banner/foreground-03-1600x310.png') }} 1x, {{ asset('themes/travelagency/assets/images/banner/foreground-03-3200x620.png') }} 2x" alt="" width="1600" height="310"></a> --}}

      <!-- Footer Minimal-->
      @include('themes.travelagency.partials.footer')
    </div>
    <!-- Global Mailform Output-->
    <div class="snackbars" id="form-output-global"> </div>
    <!-- Javascript-->
    <script src="{{ asset('themes/travelagency/assets/js/core.min.js') }}"></script>
    <script src="{{ asset('themes/travelagency/assets/js/script.js') }}"></script>
    <!-- coded by barber-->
  </body>
</html>
