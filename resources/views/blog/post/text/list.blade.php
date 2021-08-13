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
                @php $isNewRow = (($index % 4) == 0); $index++ @endphp
                @if($isNewRow)
                    <div class="row justify-content-center">
                        @endif
                        <div class="col-3">
                            <a class="text-decoration-none text-light" href="{{ route('text.post.single', [$item->id]) }}">
                                <div class="card bg-secondary">
                                    <div class="card-header text-center">
                                        {{ ($type == 'category')? $type : $type . ' post' . ' id ' . $item->id }}
                                    </div>
                                    <div class="card-body text-center">
                                        {{  $item->metaTitle }}
                                    </div>
                                </div>
                            </a>
                        </div>
                        @if($isNewRow)
                    </div>
                @endif
            @endforeach
        @endif
    </div>
@endsection
