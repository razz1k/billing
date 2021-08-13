<?php

namespace App\Models;

class TextPost extends Post
{
    public $additionalParams = [
        'content',
    ];

    public static function all($columns = ['*']) {
        return static::query()->get(is_array($columns) ? $columns : func_get_args())->whereNotNull('content');
    }
}
