<?php

namespace App\Models;

class TextPost extends Post
{
    public $additionalParams = [
        'content'
    ];

    public function __construct(array $attributes = []) {
        parent::__construct($attributes);

        $this->fillable = array_merge($this->additionalParams, $this->fillable);
    }

    public static function all($columns = ['*']) {
        return static::query()->get(is_array($columns) ? $columns : func_get_args())->whereNotNull('content');
    }
}
