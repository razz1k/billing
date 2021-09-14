<?php

namespace App\Repositories\Post;

use App\Models\TextPost;

class TextPostRepository extends PostRepository
{
  public function __construct(TextPost $model) {
    parent::__construct($model);
  }
}
