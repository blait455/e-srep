<!--================ Start Blog Area =================-->
<header class="section-heading heading-line">
    <h4 class="title-section bg">LATEST POSTS</h4>
</header>

<div class="row">
    @foreach($posts as $post)
        <div class="col-lg-4 col-md-6">
            <div class="single-blog">
                <div class="thumb">
                    @if($post->image)
                        <img class="img-fluid" src="{{asset('images/post/thumb/'.$post->image)}}" alt="{{$post->title}}">
                    @endif
                </div>
                <div class="short_details">
                    <div class="meta-top d-flex">
                        <a href="{{route('post.user', $post->user->id)}}">By {{$post->user->name}}</a>
                        <a href="{{route('post.single', $post->slug)}}#comments-area"><i class="ti-comments-smiley"></i>{{count($post->allComments)}} Comments</a>
                    </div>
                    <a class="d-block" href="{{route('post.single', $post->slug)}}">
                        <h4>{{$post->title}}</h4>
                    </a>
                    <div class="text-wrap">
                        {{Str::words(strip_tags($post->body),16)}}
                    </div>
                    <a href="{{route('post.single', $post->slug)}}" class="blog_btn">Learn More <span class="ml-2 ti-arrow-right"></span></a>
                </div>
            </div>
        </div>
    @endforeach
</div>
<!--================ End Blog Area =================-->