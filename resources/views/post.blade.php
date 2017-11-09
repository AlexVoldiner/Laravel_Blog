@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="jumbotron">

            @foreach ($post as $post_id)
                <div class="blog-post">

                    <a  href="{{ route('blog') }}">All posts</a>
                    <h2 class="blog-post-title">{{ $post_id->title }}</h2>
                    <p class="blog-post-meta">{{ $post_id->public_date }}</p>
                    <strong>{{ $post_id->text }}</strong>
                </div>

            @endforeach
        </div>
    </div>

@endsection
