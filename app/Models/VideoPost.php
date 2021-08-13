<?php

namespace App\Models;

class VideoPost extends Post
{
    public $additionalParams = [
        'videoYoutube'
    ];

    public static function all($columns = ['*']) {
        return static::query()->get(is_array($columns) ? $columns : func_get_args())->whereNotNull('videoYoutube');
    }
}
