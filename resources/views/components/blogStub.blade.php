<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <h1 class="d-flex justify-content-center">
                {{ $type }} @if($type == 'text' or $type == 'video') post @endif list
            </h1>
        </div>
    </div>
    @for($row = 0; $row < 3 ; $row++)
        <div class="row justify-content-center">
            @for($col = 0; $col < 4 ; $col++)
                <div class="col-2 m-3 bg-secondary bg-gradient">
                    <span class="post__place-holder">
                        place for @if($type == 'text' or $type == 'video') post @endif
                    </span>
                </div>
            @endfor
        </div>
    @endfor
</div>
