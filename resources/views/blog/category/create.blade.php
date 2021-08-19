@extends('layouts.app')

@section('content')
  <div class="container">
    <form class="needs-validation row justify-content-center"
          method="POST"
          action="{{ route('admin.category.store') }}">
      @csrf
      <div class="col-md-8">
        <div class="input-group mb-2 has-validation">
          <span class="input-group-text" id="input-group-text__name">Name Category</span>
          <input name="name"
                 id="name"
                 type="text"
                 class="form-control @error('name')is-invalid @enderror"
                 aria-describedby="input-group-text__name input-group-text__name-error">
          <div class="invalid-feedback" id="input-group-text__name-error" role="alert">
            @error('name')
            <strong>{{ $message }}</strong>
            @enderror
          </div>
        </div>

        <button type="submit" class="btn btn-primary float-end">Create new</button>
      </div>
    </form>
  </div>
@endsection
