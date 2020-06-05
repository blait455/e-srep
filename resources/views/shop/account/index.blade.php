@extends('shop.account.layout')
@section('name')
    <section class="section-pagetop bg-dark">
        <div class="container clearfix">
            <h2 class="title-page">Welcome {{ Auth::user()->name }}</h2>
        </div>
    </section>
@endsection
@section('account')
    <h3>Account page</h3>
@endsection