<?php

namespace App\Repositories\Post\Text;

use App\Models\Post\Text\Model as TextModel;
use App\Repositories\Post\PostRepository as AbstractPostRepository;

class Repository extends AbstractPostRepository
{
  public function __construct(TextModel $model) {
    parent::__construct($model);
  }
}
