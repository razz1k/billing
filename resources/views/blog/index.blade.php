@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-4 gy-3">
                <a class="btn btn-primary mx-auto w-50 d-block" href="{{route('category.list')}}">Categories</a>
            </div>

            <div class="col-4 gy-3">
                <a class="btn btn-primary mx-auto w-50 d-block" href="{{route('text.post.list')}}"><span class="text-dark">Text</span>Posts</a>
                @php
                    $allPosts = \App\Models\TextPost::all();
                    $countPosts = count($allPosts);
                    if($countPosts > 5) {
                      $randomPosts = $allPosts->random(5);
                    } else {
                      $randomPosts = $allPosts;
                    }
                @endphp
                @foreach($randomPosts as $post)
                    <div class="row">
                        <div class="col my-2">
                            {{ \Illuminate\Support\Facades\View::make('components.postCard', ['type' => 'text', 'item' => $post]) }}
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="col-4 gy-3">
                <a class="btn btn-primary mx-auto w-50 d-block" href="{{route('video.post.list')}}"><span class="text-dark">Video</span>Posts</a>
                @foreach(\App\Models\VideoPost::all()->random(5) as $post)
                    <div class="row">
                        <div class="col my-2">
                            {{ \Illuminate\Support\Facades\View::make('components.postCard', ['type' => 'video', 'item' => $post]) }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
