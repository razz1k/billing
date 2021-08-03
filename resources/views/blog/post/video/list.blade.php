@extends('layouts.app')

@section('content')
    <div class="container">
        @if(!isset($data[0]))
            <div class="row mb-4 justify-content-center">
                <div class="col-12">
                    <h1 class="d-flex justify-content-center">
                        {{ ($type == 'category')? $type : $type . ' post' }} list
                    </h1>
                </div>
            </div>
            @include('components.blogStub')
        @else
            @foreach($data as $key => $item)
                @php $isNewRow = (($key % 4) == 0) @endphp
                @if($isNewRow)
                    <div class="row justify-content-center">
                        @endif
                        <div class="col-md-3">
                            <a class="text-decoration-none text-light" href="{{ route('category.single', [$item->id]) }}">
                                <div class="card">
                                    <div class="card-header text-center">
                                        {{ ($type == 'category')? $type : $type . ' post' . ' id ' . $item->id }}
                                    </div>
                                    <div class="card-body text-center">
                                        {{ $type . ' name ' . $item->metaTitle }}
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
