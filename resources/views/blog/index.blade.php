@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-4 gy-3">
        <a class="btn btn-primary mx-auto w-50 d-block" href="{{ route('category.list') }}">Categories</a>
      </div>

      <div class="col-4 gy-3">
        <a class="btn btn-primary mx-auto w-50 d-block" href="{{ route('post.text.list') }}"><span class="text-dark">Text</span>Posts</a>
        @foreach($randomPosts ?? [] as $post)
          <div class="row">
            <div class="col my-2">
              {{ $post->id }}
            </div>
          </div>
        @endforeach
      </div>

      <div class="col-4 gy-3">
        <a class="btn btn-primary mx-auto w-50 d-block" href="#"><span class="text-dark">Video</span>Posts</a>
        @foreach($randomPosts ?? [] as $post)
          <div class="row">
            <div class="col my-2">
              {{ $post->id }}
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
@endsection
