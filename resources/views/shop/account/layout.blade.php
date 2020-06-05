@extends('layouts.app')
@section('name')
    <section class="section-pagetop bg-dark">
        <div class="container clearfix">
            <h2 class="title-page">Welcome {{ Auth::user()->name }}</h2>
        </div>
    </section>
@endsection
@section('content')

<section class="account_area section_gap section-content bg padding-y border-top">
  <div class="container">

    <div class="row">
      <div class="col-md-2">
        <div class="list-group">
          <a href="{{route('account')}}" class="list-group-item list-group-item-action active">Profile</a>
          <a href="{{route('account.order')}}" class="list-group-item list-group-item-action">Order</a>
        </div>
      </div>
      <div class="col-md-10">
        @yield('account')
      </div>
    </div>

  </div>
</section>

@endsection