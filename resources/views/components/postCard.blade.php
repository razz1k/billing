<div class="card position-relative">
    <a class="text-decoration-none w-100 h-100 position-absolute" href="{{ route("$type.post.single", [$item->id]) }}">
    </a>
    <div class="card-header text-center">
        {{ ($type == 'category')? $type : $type . ' post' . ' id ' . $item->id }}
    </div>
    <div class="card-body text-center">
        {{  $item->metaTitle }}
    </div>
</div>
