@extends('layouts.app')

@section('content')
  <div class="container">
    <form class="needs-validation row justify-content-center"
          method="POST"
          action="{{ route('admin.post.video.store') }}">
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
                 value="{{ $user->id }}"
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
                 placeholder="metaTitle"
                 value="{{ old('metaTitle') ?? '' }}"
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
                 placeholder="metaDescription"
                 value="{{ old('metaDescription') ?? '' }}"
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
                 placeholder="metaKeywords"
                 value="{{ old('metaKeywords') ?? '' }}"
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
                 placeholder="preview"
                 value="{{ old('preview') ?? '' }}"
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
                 placeholder="title"
                 value="{{ old('title') ?? '' }}"
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
                 placeholder="description"
                 value="{{ old('description') ?? '' }}"
                 aria-describedby="input-group-text__description">
          @error('description')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        <div class="input-group my-3">
          <span class="input-group-text" for="input-group-text__videoYoutube">
            URL to video on Youtube
          </span>
          <input name="videoYoutube"
                 type="text"
                 class="form-control @error('videoYoutube') is-invalid @enderror"
                 id="input-group-text__videoYoutube"
                 placeholder="URL"
                 value="{{ old('videoYoutube') ?? '' }}">
          @error('videoYoutube')
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
                 placeholder="after"
                 value="{{ old('after') ?? '' }}"
                 aria-describedby="input-group-text__after">
          @error('after')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>


        <button type="submit" class="btn btn-primary float-end">Create new</button>
      </div>
    </form>
  </div>
@endsection
