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
    <input name="metaTitle" type="text" class="form-control" placeholder="{{ $item->metaTitle ?? 'metaTitle' }}" value="{{ $item->metaTitle ?? '' }}" aria-describedby="input-group-text__metaTitle">
</div>

<div class="input-group my-3">
    <span class="input-group-text" id="input-group-text__metaDescription">
        metaDescription
    </span>
    <input name="metaDescription" type="text" class="form-control" placeholder="{{ $item->metaDescription ?? 'metaDescription' }}" value="{{ $item->metaDescription ?? '' }}" aria-describedby="input-group-text__metaDescription">
</div>

<div class="input-group my-3">
    <span class="input-group-text" id="input-group-text__metaKeywords">
        metaKeywords
    </span>
    <input name="metaKeywords" type="text" class="form-control" placeholder="{{ $item->metaKeywords ?? 'metaKeywords' }}" value="{{ $item->metaKeywords ?? '' }}" aria-describedby="input-group-text__metaKeywords">
</div>

<div class="input-group my-3">
    <span class="input-group-text" id="input-group-text__preview">
        preview
    </span>
    <input name="preview" type="text" class="form-control" placeholder="{{ $item->preview ?? 'preview' }}" value="{{ $item->preview ?? '' }}" aria-describedby="input-group-text__preview">
</div>

<div class="input-group my-3">
    <span class="input-group-text" id="input-group-text__title">
        title
    </span>
    <input name="title" type="text" class="form-control" placeholder="{{ $item->title ?? 'title' }}" value="{{ $item->title ?? '' }}" aria-describedby="input-group-text__title">
</div>

<div class="input-group my-3">
    <span class="input-group-text" id="input-group-text__description">
        description
    </span>
    <input name="description" type="text" class="form-control" placeholder="{{ $item->description ?? 'description' }}" value="{{ $item->description ?? '' }}" aria-describedby="input-group-text__description">
</div>

<div class="input-group my-3">
    <span class="input-group-text" id="input-group-text__after">
        after
    </span>
    <input name="after" type="text" class="form-control" placeholder="{{ $item->after ?? 'after' }}" value="{{ $item->after ?? '' }}" aria-describedby="input-group-text__after">
</div>

<div class="my-3">
    <span class="form-label text-light" for="input-group-text__content">
        URL to video on Youtube
    </span>
    <input name="videoYoutube" type="text" class="form-control" id="input-group-text__content" placeholder="{{ $item->videoYoutube ?? 'URL' }}" value="{{ $item->videoYoutube ?? '' }}">
</div>
