<?php

namespace App\Models;

class TextPost extends Post
{
    public function __construct(array $attributes = []) {
        parent::__construct($attributes);

        $this->fillable = array_merge([
            'content'
        ], $this->fillable);
    }
}
