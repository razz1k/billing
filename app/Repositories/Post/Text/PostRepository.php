<?php

namespace App\Repositories\Post\Text;

use App\Models\TextPost;
use App\Repositories\Post\PostRepository as AbstractPostRepository;

class PostRepository extends AbstractPostRepository
{
  public function __construct(TextPost $model) {
    parent::__construct($model);
  }
}
