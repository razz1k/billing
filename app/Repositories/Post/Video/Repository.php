<?php

namespace App\Repositories\Post\Video;

use App\Models\Post\Video\Model as VideoModel;
use App\Repositories\Post\PostRepository as AbstractPostRepository;

class Repository extends AbstractPostRepository
{
  public function __construct(VideoModel $model) {
    parent::__construct($model);
  }
}
