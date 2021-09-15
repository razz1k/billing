@extends('layouts.app')

@section('content')
  <div class="container">
    @if($isAdminPanel)
      <div class="row justify-content-center">
        <div class="col-3 mb-2">
          <a class="btn btn-primary btn-lg d-flex justify-content-center w-75 mx-auto"
             href="{{ route('admin.category.create') }}">
            create new category
          </a>
        </div>
      </div>
    @endif
    @php
      $counter = 0;
    @endphp
    @foreach($categories as $category)
      @if($counter % 4 == 0)
        <div class="row justify-content-center">
          @endif
          <div class="col-md-3 mb-2">
            <a class="text-decoration-none"
               href="{{ $isAdminPanel
                        ? route('admin.category.edit', ['id' => $category->id])
                        : route('category.single', ['id' => $category->id])}}">
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
          @if((($counter + 1) % 4 == 0) or $counter == (count($categories) - 1))
        </div>
      @endif
      @php
        $counter += 1;
      @endphp
    @endforeach
  </div>
@endsection
