<!-- ========================= FEATURED PRODUCTS ========================= -->

<header class="section-heading heading-line">
    <h4 class="title-section bg">FEATURED PRODUCTS</h4>
</header>

<div class="row">
    @foreach ($products as $product)
        <div class="col-md-4">
            <figure class="card card-product">
                <div class="img-wrap">
                    <a href="{{route('shop.single', $product->slug)}}"><img src="{{asset('images/product/'.'medium'.'/'.$product->images[0]->image)}}"></a>
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
                    <!-- price-wrap.// -->
                </div>
                <!-- bottom-wrap.// -->
            </figure>
        </div>
    @endforeach
</div>