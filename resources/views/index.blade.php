@extends('layouts.app')
@section('title')
  Shop || home
@endsection

@section('content')

  @push('styles')
    <link rel="stylesheet" href="{{ asset('vendors/OwlCarousel/assets/owl.carousel.min.css') }}" />
  @endpush

  @include('inc.slider')

  @include('inc.category')
          
  @include('inc.product')

  @include('inc.recent')

  @include('inc.blog')

@endsection

@push('scripts')
<script src="{{ asset('vendors/OwlCarousel/owl.carousel.min.js') }}"></script>
<script type="text/javascript">
  $(document).ready(function() { 

$('.owl-carousel').owlCarousel({
    loop:true,
    margin:0,
    responsiveClass:false,
    items:1,
    autoplay:true,
    lazyLoad:true,
    autoplayHoverPause:true,
});

  });
</script>
@endpush 