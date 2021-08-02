<?php

namespace App\Models;

class VideoPost extends Post
{
    public function __construct(array $attributes = []) {
        parent::__construct($attributes);

        $this->fillable = array_merge([
            'videoYoutube'
        ], $this->fillable);
    }
}
