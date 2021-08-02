@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 d-grid gy-3">
                <a href="{{route('editor', ['type' => 'category'])}}" class="btn btn-primary w-50 mx-auto">Edit
                    Categories</a>
            </div>

            <div class="col-6 d-grid gy-3">
                <a href="{{route('editor', ['type' => 'text'])}}" class="btn btn-primary">Edit
                    <span class="text-dark">Text</span>Posts</a>
            </div>

            <div class="col-6 d-grid gy-3">
                <a href="{{route('editor', ['type' => 'video'])}}" class="btn btn-primary">Edit
                    <span class="text-dark">Video</span>Posts</a>
            </div>
        </div>
    </div>
@endsection