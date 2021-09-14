@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-3 mb-2">
        <a class="btn btn-primary btn-lg d-flex justify-content-center w-75 mx-auto"
           href="{{ route('admin.post.text.create') }}">
          create new TextPost
        </a>
      </div>
    </div>
    @php
      $counter = 0;
    @endphp
    @foreach($posts as $post)
      @if($counter % 4 == 0)
        <div class="row justify-content-center">
          @endif
          <div class="col-md-3 mb-2">
            <a class="text-decoration-none text-light"
               href="{{ route('admin.post.text.edit', ['id' => $post->id]) }}">
              <div class="card">
                <div class="card-header text-center">
                  {{ $post->id }}
                </div>
                <div class="card-body text-center">
                  {{ $post->title }}
                </div>
              </div>
            </a>
          </div>
          @if((($counter + 1) % 4 == 0) or $counter == (count($posts) - 1))
        </div>
      @endif
      @php
        $counter += 1;
      @endphp
    @endforeach
  </div>
@endsection
