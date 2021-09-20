@extends('layouts.app')

@section('content')
  <div class="container">
    <form class="needs-validation row justify-content-center"
          method="POST"
          action="{{ route('admin.post.text.update', ['id' => $post->id]) }}">
      @method('PUT')
      @csrf
      <div class="col-md-8">
        <div class="input-group my-3">
          <span class="input-group-text" for="input-group-text__author">
              author
          </span>
          <input name="author_id"
                 type="text"
                 class="form-control"
                 readonly
                 value="{{ $post->author_id }}"
                 aria-describedby="input-group-text__author">
        </div>

        <div class="input-group my-3">
        <span class="input-group-text" for="input-group-text__category">
            category
        </span>
          <select name="category_id" class="form-select" id="input-group-text__category" aria-label="select author">
            @foreach($categories as $key => $category)
              <option value="{{ $category->id }}" @if($key == 0) selected @endif> {{ $category->name }} </option>
            @endforeach
          </select>
        </div>

        <div class="input-group my-3">
          <span class="input-group-text" id="input-group-text__metaTitle">
              metaTitle
          </span>
          <input name="metaTitle"
                 type="text"
                 class="form-control @error('metaTitle') is-invalid @enderror"
                 placeholder="{{ (isset($post->metaTitle)) ? $post->metaTitle : 'metaTitle' }}"
                 value="{{ $post->metaTitle ?? '' }}"
                 aria-describedby="input-group-text__metaTitle">
          @error('metaTitle')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        <div class="input-group my-3">
          <span class="input-group-text" id="input-group-text__metaDescription">
              metaDescription
          </span>
          <input name="metaDescription"
                 type="text"
                 class="form-control @error('metaDescription') is-invalid @enderror"
                 placeholder="{{ (isset($post->metaDescription)) ? $post->metaDescription : 'metaDescription' }}"
                 value="{{ $post->metaDescription ?? '' }}"
                 aria-describedby="input-group-text__metaDescription">
          @error('metaDescription')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        <div class="input-group my-3">
          <span class="input-group-text" id="input-group-text__metaKeywords">
              metaKeywords
          </span>
          <input name="metaKeywords"
                 type="text"
                 class="form-control @error('metaKeywords') is-invalid @enderror"
                 placeholder="{{ (isset($post->metaKeywords)) ? $post->metaKeywords : 'metaKeywords' }}"
                 value="{{ $post->metaKeywords ?? '' }}"
                 aria-describedby="input-group-text__metaKeywords">
          @error('metaKeywords')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        <div class="input-group my-3">
          <span class="input-group-text" id="input-group-text__preview">
              preview
          </span>
          <input name="preview"
                 type="text"
                 class="form-control @error('preview') is-invalid @enderror"
                 placeholder="{{ (isset($post->preview)) ? $post->preview : 'preview' }}"
                 value="{{ $post->preview ?? '' }}"
                 aria-describedby="input-group-text__preview">
          @error('preview')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        <div class="input-group my-3">
          <span class="input-group-text" id="input-group-text__title">
              title
          </span>
          <input name="title"
                 type="text"
                 class="form-control @error('title') is-invalid @enderror"
                 placeholder="{{ (isset($post->title)) ? $post->title : 'title' }}"
                 value="{{ $post->title ?? '' }}"
                 aria-describedby="input-group-text__title">
          @error('title')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        <div class="input-group my-3">
          <span class="input-group-text" id="input-group-text__description">
              description
          </span>
          <input name="description"
                 type="text"
                 class="form-control @error('description') is-invalid @enderror"
                 placeholder="{{ (isset($post->description)) ? $post->description : 'description' }}"
                 value="{{ $post->description ?? '' }}"
                 aria-describedby="input-group-text__description">
          @error('description')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        <div class="my-3">
          <span class="mx-3 form-label" for="input-group-text__content">
              content
          </span>
          <textarea name="content"
                    id="input-group-text__content"
                    class="form-control @error('content') is-invalid @enderror"
                    cols="30"
                    rows="10"
                    placeholder="{{ $post->content ?? 'content' }}">{{ $post->content ?? '' }}</textarea>
          @error('content')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        <div class="input-group my-3">
          <span class="input-group-text" id="input-group-text__after">
              after
          </span>
          <input name="after"
                 type="text"
                 class="form-control @error('after') is-invalid @enderror"
                 placeholder="{{ (isset($post->after)) ? $post->after : 'after' }}"
                 value="{{ $post->after ?? '' }}"
                 aria-describedby="input-group-text__after">
          @error('after')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        <div class="btn-group d-flex float-end"
             role="group"
             aria-label="events for category">
          <button type="submit" class="btn btn-primary float-end">
            Save
          </button>
          <button type="button" class="btn btn-danger"
                  data-bs-toggle="modal"
                  data-bs-target="#removeModal">
            Delete
          </button>
        </div>
      </div>
    </form>
  </div>

  <div class="modal fade" id="removeModal"
       tabindex="-1"
       aria-labelledby="deleteModalLabel"
       aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteModalLabel">Are you shure about this?</h5>
          <button type="button"
                  class="btn-close"
                  data-bs-dismiss="modal"
                  aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>You want delete <strong>{{ $post->title }}</strong> post</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <form method="POST" action="{{ route('admin.post.text.delete', ['id' => $post->id]) }}">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger">I'am shure, delete</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
