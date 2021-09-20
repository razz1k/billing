@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 d-grid gy-3">
        <a href="{{route('admin.category.list')}}" class="btn btn-primary w-50 mx-auto">Edit Categories</a>
      </div>

      <div class="col-6 d-grid gy-3">
        <a href="{{route('admin.post.text.list')}}" class="btn btn-primary">Edit <span class="text-dark">Text</span>
          Posts</a>
      </div>

      <div class="col-6 d-grid gy-3">
        <a href="{{ route('admin.post.video.list') }}" class="btn btn-primary">Edit <span class="text-dark">Video</span>
          Posts</a>
      </div>
    </div>
  </div>
@endsection
