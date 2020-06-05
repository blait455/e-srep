@extends('layouts.app')
@section('name')
  <section class="section-pagetop bg-dark">
    <div class="container clearfix">
      <h2 class="title-page">Cart</h2>
    </div>
  </section>
@endsection
@section('content')

    @if($carts)
    <!--================Cart Area =================-->
    <section class="cart_area section-content bg padding-y border-top">
      <div class="container">
        <div class="cart_inner row">
          <main class="col-sm-9">
          <div class="table-responsive card">
            <table class="table table-hover shopping-cart-wrap">
              <thead class="text-muted">
                <tr>
                  <th scope="col">Product</th>
                  <th scope="col" width="120">Price</th>
                  <th scope="col" width="120">Quantity</th>
                  <th scope="col" width="120">Total</th>
                  <th scope="col" width="200">Action</th>
                </tr>
              </thead>
              <tbody id="cart_item_list">  
                <form method="post" action="{{ route('cart.update') }}">
                @csrf
                  @foreach($carts as $cart)
                  <tr class="single_cart_item">
                    <td>
                      <div class="media">
                        <div class="d-flex img-wrap">
                          @php $i = 1; @endphp
                          @foreach($cart->product->images as $image)
                          @if($i>0)
                          <a href="{{route('shop.single', $cart->product->slug)}}">
                            <img src="{{asset('images/product/small/'.$image->image)}}" alt="{{$cart->product->title}}"/>
                          </a>
                          @endif
                          @php --$i; @endphp
                          @endforeach
                        </div>
                        <div class="media-body"><p>{{$cart->product->title}}</p></div>
                      </div>
                    </td>
                    <td>
                      <h5 class="cart_single_price"><span>&#8358;</span><span class="money">{{Helper::currency_amount($cart->product->offer_price)}}</span></h5>
                    </td>
                    <td>
                      <div class="product_count">
                        <input type="text" name="qty[]" maxlength="12" value="{{$cart->quantity}}" class="input-text qty"/>
                        <input type="hidden" name="qty_id[]" value="{{$cart->id}}">
                        
                        <button class="cart_u increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
                        <button class="cart_u reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>
                      </div>
                    </td>
                    <td>
                      <h5 class="cart_single_total"><span>&#8358;</span><span class="money">{{Helper::currency_amount($cart->price)}}</span></h5>
                    </td>
                    <td>
                      <a href="{{route('cart.delete', $cart->id)}}" class="btn btn-sm btn-outline-danger"> × Remove</a>
                    </td>
                  </tr>
                  @endforeach

                  <tr class="bottom_button">
                    <td colspan="1">
                      <div class="cupon_text">
                        <input type="text" placeholder="Coupon Code" id="coupon_code" />
                        <a class="btn btn-sm btn-primary" id="coupon_apply" href="#">Apply</a>
                      </div>
                    </td>
                    <td colspan="4" class="text-right">
                      <button type="submit" name="update_cart" class="gray_btn">Update Cart</button>
                    </td> 
                  </tr>
                </form>
              </tbody>
            </table>
          </div> 
        </main>
        <aside class="col-sm-3">
          <p class="alert alert-success">Add <span>&#8358;</span> 50000.00 of eligible items to your order to qualify for FREE Shipping. </p>
          @if (session()->has('discount'))
              <dl class="dlist-align">
                  <dt>Total price: </dt>
                  <dd class="text-right" id="total_price"><span>&#8358;</span><span class="money">{{Helper::currency_amount(Session::get('discount')['value'])}}</span></dd>
              </dl>
              <dl class="dlist-align">
                  <dt>Discount({{Session::get('discount')['code']}}):</dt>
                  <dd class="text-right" id="discount_price">-<span>&#8358;</span><span class="money">{{Helper::currency_amount(Session::get('discount')['value'])}}</span></dd>
              </dl>
          @endif
          
          <dl class="dlist-align h4">
              <dt>Total:</dt>
              <dd class="text-right"><h5 id="subtotal_cart_price"><span>&#8358;</span><span class="money">0.00</span></h5></dd>
          </dl>
          <hr>
          <figure class="itemside mb-3">
              <aside class="aside"><img src="{{ asset('icons/pay-visa.png') }}"></aside>
              <div class="text-wrap small text-muted">
                  Pay 84.78 AED ( Save 14.97 AED ) By using ADCB Cards
              </div>
          </figure>
          <figure class="itemside mb-3">
              <aside class="aside"> <img src="{{ asset('icons/pay-mastercard.png') }}"> </aside>
              <div class="text-wrap small text-muted">
                  Pay by MasterCard and Save 40%.
                  <br> Lorem ipsum dolor
              </div>
          </figure>
          <div><a class="btn btn-secondary" href="{{route('shop')}}">Continue Shopping</a></div><br>
          <div><a href="{{route('cart.checkout')}}" class="btn btn-success">Proceed To Checkout</a></div>
      </aside>
        </div>
      </div>
    </section>
    <!--================End Cart Area =================-->
    @endif
    
@endsection

@push('scripts')
  <script type="text/javascript">
  const url = "{{route('shop.coupon')}}";
  const redirect_url = "{{route('cart')}}";

  $('#coupon_apply').click(function(e){
    e.preventDefault();

    axios.post(url, {
      code: $('#coupon_code').val()
    })
    .then(function (response) {
      if(response.data == '1') window.location.href = redirect_url;
      else {$('#basicform').html(`<div class="alert alert-danger"><ul><li>Invalid Coupon</li></ul></div>`);}
    })
    .catch(function (error) {
      $('#basicform').html(`<div class="alert alert-danger"><ul><li>Invalid Coupon</li></ul></div>`);
    });
  });
  </script>
@endpush