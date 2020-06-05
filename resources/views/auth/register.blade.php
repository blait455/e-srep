@extends('layouts.app')

@section('name')
    <section class="section-pagetop bg-dark">
        <div class="container clearfix">
            <h2 class="title-page">Register</h2>
        </div>
    </section>
@endsection

@section('content')
<section class="section-content bg padding-y border-top">
<div class="container ">
    <div class="col-md-6 mx-auto">
        <div class="card">
            <header class="card-header">
                <h4 class="card-title mt-2">{{ __('Register') }}</h4>
            </header>
            <article class="card-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-row">
                        <div class="col form-group">
                            <label for="name" >{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col form-group">
                            <label for="email">{{ __('E-Mail') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
    
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>City</label>
                            <input type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city">
                            @error('city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label>State</label>
                            <select id="state" class="form-control @error('state') is-invalid @enderror" name="state" required>
                                <option> Choose...</option>
                                <option>Abia</option>
                                <option>Adamawa</option>
                                <option>Akwa-ibom</option>
                                <option>Anabra</option>
                                <option>Bauchi</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address">
                    </div>

                    <div class="form-group col-md-12">
                        <label>Type</label>
                        <select id="type" class="form-control @error('type') is-invalid @enderror" name="type" required>
                            <option> Choose...</option>
                            <option>Hospital</option>
                            <option>Pharmacist</option>
                        </select>
                        @error('type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-row">
                        <div class="col form-group">
                            <label for="password" >{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col form-group">
                            <label for="password-confirm">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>


                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">
                            {{ __('Register') }}
                        </button>
                    </div>
                </form>
            </article>
            <div class="border-top card-body text-center">Have an account? <a href="{{ route('login') }}">Log In</a></div>
        </div>
    </div>
</div>
</section>
@endsection
