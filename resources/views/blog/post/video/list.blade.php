@extends('layouts.app')

@section('content')
    <div class="container">
        @if(count($data) == 0)
            <div class="row mb-4 justify-content-center">
                <div class="col-12">
                    <h1 class="d-flex justify-content-center">
                        {{ ($type == 'category')? $type : $type . ' post' }} list
                    </h1>
                </div>
            </div>
            @include('components.blogStub')
        @else
            @php $index = 0 @endphp
            @foreach($data as $item)
                @if(($index % 4) == 0)
                    <div class="row justify-content-center">
                        @endif
                        @php $index++ @endphp
                        <div class="col-3 pb-3">
                            @include('components.postCard')
                        </div>
                        @if(($index % 4) == 0)
                    </div>
                @endif
            @endforeach
        @endif
    </div>
@endsection
