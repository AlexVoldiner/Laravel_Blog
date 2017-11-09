@extends('layouts.app')

@section('content')
   <div class="container">
   @foreach ($posts as $post)
           <div class="col-xs-6">
               <div class="jumbotron">
                   <div class="blog-post">
                        <a href="blog/{{ $post->title }}"><img src="/storage/{{ $post->image }}" alt="" class="img-responsive pull-left"></a>
                        <h2 class="blog-post-title">{{ $post->title }}</h2>
                        <p class="blog-post-meta">{{ $post->public_date }}</p>
                        <strong>{{ $post->preview }}</strong>
                   </div>
               </div>
           </div>
   @endforeach
   </div>
@endsection
