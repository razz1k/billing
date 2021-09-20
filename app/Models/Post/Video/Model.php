<?php

namespace App\Models\Post\Video;

use App\Models\Post\PostModel;

class Model extends PostModel
{
  public function __construct(array $attributes = []) {
    parent::__construct($attributes);

    $this->mergeFillable(['videoYoutube']);
  }

  public static function all($columns = ['*']) {
    return static::query()->get(is_array($columns) ? $columns : func_get_args())->whereNotNull('videoYoutube');
  }
}
