@for($row = 0; $row < 3 ; $row++)
    <div class="row justify-content-center">
        @for($col = 0; $col < 4 ; $col++)
            <div class="col-2 m-3 bg-secondary bg-gradient">
                <span class="post__place-holder">
                    place for post
                </span>
            </div>
        @endfor
    </div>
@endfor
