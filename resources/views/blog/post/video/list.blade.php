@extends('layouts.app')

@section('content')
    @if(!isset($post))
        @include('components.blogStub')
    @else

    @endif
@endsection
