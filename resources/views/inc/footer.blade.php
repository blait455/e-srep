<!-- ========================= FOOTER ========================= -->
<footer class="section-footer bg-dark white">
    <div class="container">
        <section class="footer-top padding-top">
            <div class="row">
                <aside class="col-sm-4  col-md-4 white">
                    <h5 class="title">My Account</h5>
                    <ul class="list-unstyled">
                        <li> <a href="{{ route('login') }}"> User Login </a></li>
                        <li> <a href="{{ route('register') }}"> User register </a></li>
                        <li> <a href="{{ route('account') }}"> Account Setting </a></li>
                        <li> <a href="{{ route('account.order') }}"> My Orders </a></li>
                    </ul>
                </aside>
                <aside class="col-sm-4  col-md-4 white">
                    <h5 class="title">About</h5>
                    <ul class="list-unstyled">
                        <li> <a href="#"> Our history </a></li>
                        <li> <a href="#"> How to buy </a></li>
                        <li> <a href="#"> Delivery and payment </a></li>
                        <li> <a href="#"> Advertise </a></li>
                    </ul>
                </aside>
                <aside class="col-sm-4">
                    <article class="white">
                        <h5 class="title">Contacts</h5>
                        <p>
                            @if( Helper::setting()->has('app_email') && !empty(setting('app_email')) )<strong>Email: </strong> <a href="mailto:{{setting('app_email')}}">{{setting('app_email')}}</a>@endif
                            <br>
                            @if( Helper::setting()->has('app_phone') && !empty(setting('app_phone')) )<strong>Phone:</strong> <a href="tel:{{setting('app_phone')}}">{{setting('app_phone')}}</a>@endif
                        </p>

                        <div class="btn-group white">
                            @if(Helper::setting()->has('social_facebook') && !empty(setting('social_facebook')) )<a class="btn btn-facebook" title="Facebook" target="_blank" href="{{ setting('social_facebook') }}"><i class="fab fa-facebook-f  fa-fw"></i></a>@endif
                            @if(Helper::setting()->has('social_twitter') && !empty(setting('social_instagram')) )<a class="btn btn-instagram" title="Instagram" target="_blank" href="{{ setting('social_instagram') }}"><i class="fab fa-instagram  fa-fw"></i></a>@endif
                            @if(Helper::setting()->has('social_twitter') && !empty(setting('social_youtube')) )<a class="btn btn-youtube" title="Youtube" target="_blank" href="{{ setting('social_youtube') }}"><i class="fab fa-youtube  fa-fw"></i></a>@endif
                            @if(Helper::setting()->has('social_twitter') && !empty(setting('social_twitter')) )<a class="btn btn-twitter" title="Twitter" target="_blank" href="{{ setting('social_twitter') }}"><i class="fab fa-twitter  fa-fw"></i></a>@endif
                        </div>
                    </article>
                </aside>
            </div>
            <!-- row.// -->
            <br>
        </section>
        <section class="footer-bottom row border-top-white">
            <div class="col-sm-6">
                <p class="text-md-right text-white-50">
                    Copyright &copy @if( Helper::setting()->has('copyright_text') && !empty(setting('copyright_text')) ) {{setting('copyright_text')}}@endif
                    
                </p>
            </div>
        </section>
        <!-- //footer-top -->
    </div>
    <!-- //container -->
</footer>