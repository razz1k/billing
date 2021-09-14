<?php

namespace App\Models;

class TextPost extends Post
{
  public function __construct(array $attributes = []) {
    $this->mergeFillable(['content']);
    
    parent::__construct($attributes);
  }

  public static function all($columns = ['*']) {
    return static::query()->get(is_array($columns) ? $columns : func_get_args())->whereNotNull('content');
  }
}
