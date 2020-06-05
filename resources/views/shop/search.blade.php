@extends('layouts.app')

@section('name')
  <section class="section-pagetop bg-dark">
    <div class="container clearfix">
      <h2 class="title-page">Search</h2>
      <span class="text">Results</span>
    </div>
  </section>
@endsection

@section('content')

@if($products)
<!--================Category Product Area =================-->
<section class="cat_product_area section_gap section-content bg padding-y border-top">
  <div class="container">
    <div class="row flex-row-reverse">
      <div class="col-lg-12">
        <div class="product_top_bar">
          <div class="left_dorp">
            <select class="sorting">
              <option value="1">Default sorting</option>
              <option value="2">Default sorting 01</option>
              <option value="4">Default sorting 02</option>
            </select>
            <select class="show">
              <option value="1">Show 12</option>
              <option value="2">Show 14</option>
              <option value="4">Show 16</option>
            </select>
          </div>
        </div>

        <div class="latest_product_inner">
          <div class="row">
    
          @foreach($products as $product)
            <div class="col-lg-3 col-md-4">
              <figure class="card card-product">
                <div class="img-wrap">
                  @php $i = 1; @endphp
                  @foreach($product->images as $image)
                    @if($i>0)
                      <img class="card-img" src="{{asset('images/product/thumb/'.$image->image)}}" alt="{{$product->title}}" />
                    @endif
                   @php --$i; @endphp
                  @endforeach                  
                </div>
                <figcaption class="info-wrap">
                  <a href="{{route('shop.single', $product->slug)}}"><h4 class="title">{{ $product->title }}</h4></a>
                  <p class="desc">{{ $product->description }}</p>
                </figcaption>
                <div class="bottom-wrap">
                  <a href="{{route('cart.add', $product->slug)}}" class="btn btn-sm btn-primary float-right">Add To Cart</a>
                  <div class="price-wrap h5">
                    @if ($product->offer_price)
                      <span class="price-new"><span>&#8358;</span>{{$product->offer_price}}</span> <del class="price-old"><span>&#8358;</span>{{ $product->price }}</del>
                    @else
                      <span class="price-new"><span>&#8358;</span>{{$product->offer_price}}</span>
                    @endif
                  </div>
                </div>
              </figure>
            </div>
          @endforeach
          </div>

          <div class="row">
            <nav class="blog-pagination justify-content-center d-flex">
              {{$products->links()}}
            </nav>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>
<!--================End Category Product Area =================-->
@else
<section class="banner_area">
  <div class="banner_inner d-flex align-items-center">
    <div class="container">
      <div class="banner_content d-md-flex justify-content-between align-items-center">
        <div class="mb-3 mb-md-0">
          <h2>Search result not found!</h2>
        </div>
      </div>
    </div>
  </div>
</section>
@endif


@endsection