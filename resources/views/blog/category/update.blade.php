@extends('layouts.app')

@section('content')
  <div class="container">
    <form class="needs-validation row justify-content-center"
          method="POST"
          action="{{ route('admin.category.update', ['id' => $category->id]) }}">
      @method('PUT')
      @csrf
      <div class="col-md-8">
        <div class="input-group has-validation mb-2">
          <span class="input-group-text" id="input-group-text__name">Name Category</span>

          <input name="name"
                 type="text"
                 class="form-control @error('name')is-invalid @enderror"
                 value="{{ $category->name }}"
                 aria-describedby="input-group-text__name">

          <div class="invalid-feedback" role="alert">
            @error('name')
            <strong>{{ $message }}</strong>
            @enderror
          </div>
        </div>

        <div class="btn-group d-flex float-end" role="group" aria-label="events for category">
          <button type="submit" class="btn btn-primary ml-auto">
            Save
          </button>
          <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#removeModal">
            Delete
          </button>
        </div>
      </div>
    </form>
  </div>
  <div class="modal fade" id="removeModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteModalLabel">Are you shure about this?</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>You want delete <strong>{{ $category->name }}</strong> category</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <form method="POST" action="{{ route('admin.category.delete', ['id' => $category->id]) }}">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger">I'am shure, delete</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
