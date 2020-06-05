<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title','Laravel') - {{setting('app_name')}}</title>
    @if( Helper::setting()->has('icon') && !empty(setting('icon')) )
      <link rel="icon" type="image/png" href="{{Storage::disk('public')->url(setting('icon'))}}" sizes="45x45">
    @endif
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Bootstrap CSS -->
    {{-- <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" /> --}}
    <link rel="stylesheet" href="{{ asset('vendors/linericon/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/flaticon.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/nice-select/css/nice-select.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/animate-css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/jquery-ui/jquery-ui.css') }}" />
    @stack('styles')
    <!-- main css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}" />

    <link href="{{ asset('css/bt/bootstrap.css?v=1.0') }}" rel="stylesheet" type="text/css" />
    <!-- custom style -->
    <link href="{{ asset('css/ui.css?v=1.0') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" media="only screen and (max-width: 1200px)" />
    <!-- plugin: owl carousel  -->
    <link href="{{ asset('plugins/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/owlcarousel/assets/owl.theme.default.css') }}" rel="stylesheet">
    <!-- plugin: fancybox  -->
    <link href="{{ asset('plugins/fancybox/fancybox.min.css') }}" type="text/css" rel="stylesheet">
    <!-- Font awesome 5 -->
    <link href="{{ asset('fonts/fontawesome/css/fontawesome-all.min.css') }}" type="text/css" rel="stylesheet">

    <script>
        window.baseURL = '{{url('/')}}';
    </script>
  </head>

  <body>
    @include('inc.top')
        
    @include('inc.header')  

    @yield('name')

    <section class="section-content padding-y-sm bg">
      <div class="container">

        @include('admin.partials.alert')

        @yield('content')

      </div>
    </section>

    @include('inc.email')

    @include('inc.footer')

    {{-- <footer class="footer-area section_gap">
      <div class="container">
        <div class="row">
        @foreach(Helper::get_widget('footer') as $footer)
          {!!$footer->content!!}
        @endforeach
        </div>
        <div class="footer-bottom row align-items-center">
          <p class="footer-text m-0 col-lg-8 col-md-12">@if( Helper::setting()->has('copyright_text') && !empty(setting('copyright_text')) ) {{setting('copyright_text')}} | @endif Developed by <a href="https://github.com/rakibhoossain" target="_blank">Rakib Hossain</a></p>
          <div class="col-lg-4 col-md-12 footer-social">
            @if( Helper::setting()->has('social_facebook') && !empty(setting('social_facebook')) )<a href="{{setting('social_facebook')}}" target="_blank"><i class="fa fa-facebook"></i></a>@endif
            @if(Helper::setting()->has('social_twitter') && !empty(setting('social_twitter')) )<a href="{{setting('social_twitter')}}" target="_blank"><i class="fa fa-twitter"></i></a>@endif
            @if(Helper::setting()->has('social_dribbble') && !empty(setting('social_dribbble')) )<a href="{{setting('social_dribbble')}}" target="_blank"><i class="fa fa-dribbble"></i></a>@endif
            @if(Helper::setting()->has('social_behance') && !empty(setting('social_behance')) )<a href="{{setting('social_behance')}}" target="_blank"><i class="fa fa-behance"></i></a>@endif
            @if(Helper::setting()->has('social_linkedin') && !empty(setting('social_linkedin')) )<a href="{{setting('social_linkedin')}}" target="_blank"><i class="fa fa-linkedin"></i></a>@endif
          </div>
        </div>
      </div>
    </footer> --}}

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script> -->

    <script src="{{ asset('js/theme.js') }}"></script>
    <!-- Page level custom scripts -->
    @stack('scripts')

    <script src="{{ asset('js/jquery-2.0.0.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/fancybox/fancybox.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/owlcarousel/owl.carousel.min.js') }}"></script>
    <!-- custom javascript -->
    <script src="{{ asset('js/script.js') }}" type="text/javascript"></script>

    <script type="text/javascript">
        /// some script

        // jquery ready start
        $(document).ready(function() {
            // jQuery code

        });
        // jquery end
    </script>

  </body>
</html>