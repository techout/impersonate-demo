@extends('main')

@section('title', ' | Blog')

@section('content')
    <h1>Blog</h1>

    @foreach($posts as $post)
        <h2>{{$post->title}}</h2>
        <h5>Published: {{Carbon::parse($post->created_at)->format('M j, Y')}}</h5>
        
        <p>{{substr(strip_tags($post->body), 0, 250)}}{{strlen(strip_tags($post->body)) > 250 ? "..." : ""}}</p>

        <a href="{{route('blog.single', $post->slug)}}" class="btn btn-primary">Read More</a>
        <hr>
    @endforeach

    <div class="row">
        <div class="col-md-12">
            <div class="text-center">
                {!! $posts->links()!!}
            </div>
        </div>
    </div>
@endsection