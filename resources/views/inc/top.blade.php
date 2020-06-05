<div id="app">
    <header class="header_area">
        <div class="top_menu">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="float-left">
                            <p>@if( Helper::setting()->has('app_email') && !empty(setting('app_email')) ) PHONE: <a href="mailto:{{setting('app_email')}}">{{setting('app_email')}}</a>@endif</p>
                            <p>@if( Helper::setting()->has('app_phone') && !empty(setting('app_phone')) )<a href="tel:{{setting('app_phone')}}">{{setting('app_phone')}}</a>@endif</p>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="float-right">
                            <ul class="right_side">
                                <li>
                                    <a href="{{route('shop.track')}}">track order</a>
                                </li>
                                <li>
                                    <a href="{{route('contact')}}">Contact Us</a>
                                </li>
                                @if( Helper::setting()->has('shop_currency'))
                                    <li class="curreny-wrap">Currency <i class="fa fa-angle-down"></i>
                                        <ul class="curreny-list">
                                            <li @if(Helper::base_currency() == Helper::currency()) class="active" @endif ><a href="{{route('shop.currency', 0)}}">{{Helper::base_currency_data()['symbol']}} {{Helper::base_currency_data()['code']}}</a></li>
                                            @foreach(Helper::currencies() as $currency)
                                                <li @if($currency->symbol == Helper::currency()) class="active" @endif ><a href="{{route('shop.currency', $currency->id)}}">{{$currency->symbol}} {{$currency->code}}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</div>