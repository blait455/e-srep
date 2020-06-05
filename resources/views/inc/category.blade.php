<!-- ========================= fEATURED CATEGORY ========================= -->
<section class="section-content padding-y-sm bg">
    <div class="container">
        <header class="section-heading heading-line">
            <h4 class="title-section bg">Featured Categories</h4>
        </header>
        <div class="row">
            @foreach ($categories as $category)
                <div class="col-md-4">
                    <div class="card-banner" style="height:250px; background-image: url({{asset('storage/category_images/'.$category->image)}});">
                        <article class="overlay overlay-cover d-flex align-items-center justify-content-center">
                            <div class="text-center">
                                <h5 class="card-title">{{ $category->name }}</h5>
                                <a href="{{ route('shop') }}" class="btn btn-warning btn-sm"> View All </a>
                            </div>
                        </article>
                    </div>
                    <!-- card.// -->
                </div>
            @endforeach
        </div>
    </div>
</section>