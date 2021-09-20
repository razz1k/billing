@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-8">
        <article>
          <h1>{{ $post->title }}</h1>
          <div class="description">
            <p class="mb-0 fs-3">{{ $post->description }}</p>
            <p class="fs-6 text-muted">
              Author: {{ $author->first_name }}
            </p>
            <p>{{ $post->content }}</p>
            <p>{{ $post->after }}</p>
          </div>
        </article>
      </div>
    </div>
  </div>
@endsection
