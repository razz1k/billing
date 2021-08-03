<?php

namespace App\Models;

class VideoPost extends Post
{
    public $additionalParams = [
        'videoYoutube'
    ];

    public function __construct(array $attributes = []) {
        parent::__construct($attributes);

        $this->fillable = array_merge($this->additionalParams, $this->fillable);
    }

    public static function all($columns = ['*']) {
        return static::query()->get(is_array($columns) ? $columns : func_get_args())->whereNotNull('videoYoutube');
    }
}
