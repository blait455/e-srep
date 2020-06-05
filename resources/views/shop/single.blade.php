@extends('layouts.app')
@section('name')
  <section class="section-pagetop bg-dark">
    <div class="container clearfix">
      <h2 class="title-page">{{ $product->title }}</h2>
    </div>
  </section>
@endsection
@section('content')
    
  @if ($product)
    <section class="section-content bg padding-y border-top">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="row no-gutters">
                <aside class="col-sm-5 border-right">
                  <div class="s_product_img">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    
                      <ol class="carousel-indicators">
                        @foreach($product->images as $image)
                          <li data-target="#carouselExampleIndicators" data-slide-to="{{$loop->index}}" @if($loop->index == 0) class="active" @endif>
                            <img src="{{asset('images/product/small/'.$image->image)}}" alt="{{$product->title}}" width="60" height="60" />
                          </li>
                        @endforeach
                      </ol>
    
                      <div class="carousel-inner">
                        @foreach($product->images as $image)
                          <div class="carousel-item @if($loop->index == 0) active @endif">
                            <img class="d-block w-100" src="{{asset('images/product/'.$image->image)}}" alt="{{$product->title}}"/>
                          </div>
                        @endforeach
                      </div>
                    </div>
                  </div>
                </aside>
                <aside class="col-sm-7">
                  <article class="p-5">
                    <h3 class="title mb-3">{{ $product->title }}</h3>

                    <div class="mb-3">
                      <var class="price h3 text-warning">
                        <span class="currency">&#8358;</span><span class="num">
                          @if ($product->offer_price)
                            {{Helper::currency_amount($product->offer_price)}}
                          @else
                            {{Helper::currency_amount($product->price)}}
                          @endif
                        </span>
                      </var>
                    </div>
                    <dl>
                      <dt>Description</dt>
                      <dd>
                        <p>
                          {{Str::words(strip_tags($product->description),16)}}
                        </p>
                      </dd>
                    </dl>
                    <dl class="row">
                      @if ($product->category)
                        <dt class="col-sm-3">Category</dt>
                        <dd class="col-sm-9"><a class="active" href="{{route('shop.category', $product->category->slug)}}">{{$product->category->name}}</a></dd>
                      @endif
                      
                      @if ($product->brand)
                        <dt class="col-sm-3">Brand</dt>
                        <dd class="col-sm-9"><a class="active" href="{{route('shop.brand', $product->brand->slug)}}">{{$product->brand->name}}</a></dd>
                      @endif

                      <dt class="col-sm-3">Availability</dt>
                      <dd class="col-sm-9"><a href="{{route('shop.single', $product->slug)}}">{{$product->quantity}}</a></dd>
                    </dl>
                      <hr>
                      <div class="row">
                        <div class="col-sm-5">
                          <dl class="dlist-inline">
                            <form method="post" action="{{ route('cart.singleToAdd') }}" class="mt-10">
                              {{csrf_field()}}
                              <div class="product_count">
                                <label for="qty">Quantity:</label>
                                <input type="text" name="qty" id="sst" maxlength="12" value="1" class="input-text qty"/>
                                <input type="hidden" name="slug" value="{{$product->slug}}" />
                
                                <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;" class="increase items-count" type="button">
                                  <i class="lnr lnr-chevron-up"></i>
                                </button>
                                <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;" class="reduced items-count" type="button" >
                                  <i class="lnr lnr-chevron-down"></i>
                                </button>
                              </div>
                              <hr>
                              <div class="card_area">
                                <button type="submit" name="add_to_cart" class="btn  btn-outline-primary"><i class="fas fa-shopping-cart"></i>Add to Cart</button>
                              </div>
                            </form>
                          </dl>
                        </div>
                        <div class="col-sm-7">
                          <dl class="dlist-inline">
                            <dt>Size: </dt>
                            <dd>
                              <label class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                <span class="form-check-label">SM</span>
                              </label>
                              <label class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                <span class="form-check-label">MD</span>
                              </label>
                              <label class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                <span class="form-check-label">XXL</span>
                              </label>
                            </dd>
                          </dl>
                        </div>
                      </div>
                    </div>
                  </article>
                </aside>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <article class="card mt-4">
              <div class="card-body">
                <h4>Detail overview</h4>
                <p>{!! html_entity_decode($product->description) !!}</p>
              </div>
            </article>
          </div>
        </div>
      </div>
    </section>
  @endif
    
@endsection