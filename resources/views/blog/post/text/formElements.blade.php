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
    <input name="metaTitle" type="text" class="form-control" placeholder="{{ (isset($item->metaTitle)) ? $item->metaTitle : 'metaTitle' }}" aria-describedby="input-group-text__metaTitle">
</div>

<div class="input-group my-3">
    <span class="input-group-text" id="input-group-text__metaDescription">
        metaDescription
    </span>
    <input name="metaDescription" type="text" class="form-control" placeholder="{{ (isset($item->metaDescription)) ? $item->metaDescription : 'metaDescription' }}" aria-describedby="input-group-text__metaDescription">
</div>

<div class="input-group my-3">
    <span class="input-group-text" id="input-group-text__metaKeywords">
        metaKeywords
    </span>
    <input name="metaKeywords" type="text" class="form-control" placeholder="{{ (isset($item->metaKeywords)) ? $item->metaKeywords : 'metaKeywords' }}" aria-describedby="input-group-text__metaKeywords">
</div>

<div class="input-group my-3">
    <span class="input-group-text" id="input-group-text__preview">
        preview
    </span>
    <input name="preview" type="text" class="form-control" placeholder="{{ (isset($item->preview)) ? $item->preview : 'preview' }}" aria-describedby="input-group-text__preview">
</div>

<div class="input-group my-3">
    <span class="input-group-text" id="input-group-text__title">
        title
    </span>
    <input name="title" type="text" class="form-control" placeholder="{{ (isset($item->title)) ? $item->title : 'title' }}" aria-describedby="input-group-text__title">
</div>

<div class="input-group my-3">
    <span class="input-group-text" id="input-group-text__description">
        description
    </span>
    <input name="description" type="text" class="form-control" placeholder="{{ (isset($item->description)) ? $item->description : 'description' }}" aria-describedby="input-group-text__description">
</div>

<div class="input-group my-3">
    <span class="input-group-text" id="input-group-text__after">
        after
    </span>
    <input name="after" type="text" class="form-control" placeholder="{{ (isset($item->after)) ? $item->after : 'after' }}" aria-describedby="input-group-text__after">
</div>

<div class="my-3">
    <span class="form-label text-light" for="input-group-text__content">
        content
    </span>
    <input name="content" type="text" class="form-control" id="input-group-text__content" placeholder="{{ (isset($item->content)) ? $item->content : 'content' }}">
</div>
