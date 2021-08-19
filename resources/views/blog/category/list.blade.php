@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-3 mb-2">
        <a class="btn btn-primary btn-lg d-flex justify-content-center w-75 mx-auto" href="{{ route('admin.category.create') }}">
          create
          new
          category
        </a>
      </div>
    </div>
    @foreach($categories as $key => $category)
      @if($key % 4 == 0)
        <div class="row justify-content-center">
          @endif
          <div class="col-md-3 mb-2">
            <a class="text-decoration-none text-light" href="{{ route('admin.category.edit', ['id' => $category->id]) }}">
              <div class="card">
                <div class="card-header text-center">
                  {{ $category->id }}
                </div>
                <div class="card-body text-center">
                  {{ $category->name }}
                </div>
              </div>
            </a>
          </div>
          @if((($key + 1) % 4 == 0) or $key == (count($categories) - 1))
        </div>
      @endif
    @endforeach
  </div>
@endsection
