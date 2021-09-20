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
          </div>
          <iframe width="800"
                  height="510"
                  src="{{ 'https://www.youtube.com/embed/' . (explode('=', $post->videoYoutube)[1] ?? '') }}"
                  title="YouTube video player"
                  frameborder="0"
                  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                  allowfullscreen></iframe>
          <p>{{ $post->after }}</p>
        </article>
      </div>
    </div>
  </div>
@endsection
