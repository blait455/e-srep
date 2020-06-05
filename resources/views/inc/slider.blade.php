<div class="row">
    <div class="col-md-12">
        @if (count($sliders) > 0)
            <div class="owl-init slider-main owl-carousel" data-items="1" data-dots="false" data-nav="true">
                @foreach ($sliders as $slider)
                    <div class="item-slide rounded">
                        <a href="{{$slider->url}}"><img src="/storage/slider_images/{{$slider->image}}"></a>
                        <div class="banner_inner d-flex align-items-center">
                            <div class="container">
                              <div class="banner_content row">
                                <div class="col-lg-12">
                                  {!!$slider->body!!}
                                  @if($slider->button && $slider->url)
                                  <a class="main_btn mt-40" href="{{$slider->url}}">{{$slider->button}}</a>
                                  @endif
                                </div>
                              </div>
                            </div>
                          </div>
                    </div>
                @endforeach
            </div>
        @else
            <h3>No sliders yet</h3>
        @endif
    </div>
</div>