<!-- ========================= RECENT PRODUCTS ========================= -->
<section class="section-request bg padding-y-sm">
    <div class="container">
        <header class="section-heading heading-line">
            <h4 class="title-section bg text-uppercase">Recently Added</h4>
        </header>
        <div class="row">
            @foreach (Helper::recentProduct() as $product)
                <div class="col-md-3">
                    <figure class="card card-product">
                        <div class="img-wrap"><img src="{{asset('images/product/'.'medium'.'/'.$product->images[0]->image)}}"></div>
                        <figcaption class="info-wrap">
                            <h4 class="title">{{ $product->title }}</h4>
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
                            <!-- price-wrap.// -->
                        </div>
                        <!-- bottom-wrap.// -->
                    </figure>
                </div>
            @endforeach
        </div>
    </div>
    <!-- container // -->
</section>