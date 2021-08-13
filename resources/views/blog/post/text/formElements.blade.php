<div class="input-group my-3">
    <span class="input-group-text" for="input-group-text__author">
        author
    </span>
    <input name="author_id" type="text" class="form-control" readonly value="{{ Auth::user()->id }}" placeholder="{{ Auth::user()->first_name . Auth::user()->last_name ?? '' }}" aria-describedby="input-group-text__author">
</div>

<div class="input-group my-3">
    <span class="input-group-text" for="input-group-text__category">
        category
    </span>
    <select name="category_id" class="form-select" id="input-group-text__category" aria-label="select author">
        @foreach(\App\Models\Category::all() as $key => $category)
            <option value="{{ $category->id }}" @if($key == 0) selected @endif> {{ $category->name }} </option>
        @endforeach
    </select>
</div>

<div class="input-group my-3">
    <span class="input-group-text" id="input-group-text__metaTitle">
        metaTitle
    </span>
    <input name="metaTitle" type="text" class="form-control @error('metaTitle') is-invalid @enderror" placeholder="{{ (isset($item->metaTitle)) ? $item->metaTitle : 'metaTitle' }}" value="{{ $item->metaTitle ?? '' }}" aria-describedby="input-group-text__metaTitle">
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
    <input name="metaDescription" type="text" class="form-control @error('metaDescription') is-invalid @enderror" placeholder="{{ (isset($item->metaDescription)) ? $item->metaDescription : 'metaDescription' }}" value="{{ $item->metaDescription ?? '' }}" aria-describedby="input-group-text__metaDescription">
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
    <input name="metaKeywords" type="text" class="form-control @error('metaKeywords') is-invalid @enderror" placeholder="{{ (isset($item->metaKeywords)) ? $item->metaKeywords : 'metaKeywords' }}" value="{{ $item->metaKeywords ?? '' }}" aria-describedby="input-group-text__metaKeywords">
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
    <input name="preview" type="text" class="form-control @error('preview') is-invalid @enderror" placeholder="{{ (isset($item->preview)) ? $item->preview : 'preview' }}" value="{{ $item->preview ?? '' }}" aria-describedby="input-group-text__preview">
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
    <input name="title" type="text" class="form-control @error('title') is-invalid @enderror" placeholder="{{ (isset($item->title)) ? $item->title : 'title' }}" value="{{ $item->title ?? '' }}" aria-describedby="input-group-text__title">
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
    <input name="description" type="text" class="form-control @error('description') is-invalid @enderror" placeholder="{{ (isset($item->description)) ? $item->description : 'description' }}" value="{{ $item->description ?? '' }}" aria-describedby="input-group-text__description">
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
    <textarea name="content" id="input-group-text__content" class="form-control @error('content') is-invalid @enderror" form="editorMainForm" cols="30" rows="10" placeholder="{{ $item->content ?? 'content' }}" value="{{ $item->content ?? '' }}"></textarea>
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
    <input name="after" type="text" class="form-control @error('after') is-invalid @enderror" placeholder="{{ (isset($item->after)) ? $item->after : 'after' }}" value="{{ $item->after ?? '' }}" aria-describedby="input-group-text__after">
    @error('after')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
