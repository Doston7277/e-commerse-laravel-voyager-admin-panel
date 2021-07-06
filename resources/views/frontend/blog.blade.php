@extends('frontend.main')
@section('section')

<div class="contactus">
    <div class="container-fluid">
        <div class="row">
           <div class="col-md-8 offset-md-2">
              <div class="title">
                <h2>Blog</h2>
              </div>
           </div>
        </div>
    </div>
</div>
<div class="blog">
  <div class="container">
    <div class="row">
    @foreach($posts as $post)
       <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 margin">
            <div class="news-box">
                <figure><img src="{{ asset('storage/' . $post['image'] ) }}" alt="img" /></figure>
                <h3>{{ $post->title }}</h3>
                <span>{{ $post->created_at->format('m-d-Y') }}</span><span>Comment</span>
                <p>{{ $post->body }}</p>
            </div>
        </div>
    @endforeach
    </div>
  </div>
</div>

@endsection
