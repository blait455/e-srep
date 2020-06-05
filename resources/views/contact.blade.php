@extends('layouts.app')

@section('name')
  <section class="section-pagetop bg-dark">
    <div class="container clearfix">
      <h2 class="title-page">Contact us</h2>
    </div>
  </section>
@endsection

@section('content')
  <section class="section_gap section-content bg padding-y border-top">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h3 class="contact-title">Get in Touch</h3>
        </div>
        <div class="col-lg-8 mb-4 mb-lg-0">
          <form class="form-contact contact_form" action="{{route('contact.store')}}" method="post" id="contactForm" novalidate="novalidate">
            @csrf
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                    <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" placeholder="Enter Message"></textarea>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input class="form-control" name="name" id="name" type="text" placeholder="Enter your name">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input class="form-control" name="email" id="email" type="email" placeholder="Enter email address">
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <input class="form-control" name="subject" id="subject" type="text" placeholder="Enter Subject">
                </div>
              </div>
            </div>
            <div class="form-group mt-lg-3">
              <button type="submit" class="btn btn-success" id="submit_btn">Send Message</button>
            </div>
          </form>


        </div>

        <div class="col-lg-4">
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-home"></i></span>
            <div class="media-body">
              <p>{{setting('shop_address')}}</p>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-tablet"></i></span>
            <div class="media-body">
              <h3><a href="tel:{{setting('app_phone')}}">{{setting('app_phone')}}</a></h3>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-email"></i></span>
            <div class="media-body">
              <h3><a href="mailto:{{setting('app_email')}}">{{setting('app_email')}}</a></h3>
              <p>Send us your query anytime!</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
	<!-- ================ contact section end ================= -->

	<!--================Contact Success and Error message Area =================-->
  <div id="success" class="modal modal-message fade" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="text-success">Thank you!</h2>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p class="text-success">Your message is successfully sent...</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Modals error -->
  <div id="error" class="modal modal-message fade" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="text-warning">Sorry!</h2>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p class="text-warning">Something went wrong.</p>
        </div>
      </div>
    </div>
  </div>

<!--================End Contact Success and Error message Area =================-->

@endsection

@push('scripts')
<script src="{{ asset('js/jquery.form.js') }}"></script>
<script src="{{ asset('js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/contact.js') }}"></script>
@endpush