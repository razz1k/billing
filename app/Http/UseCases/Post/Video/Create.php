<?php

namespace App\Http\UseCases\Post\Video;

use App\Repositories\Post\Video\Repository;
use App\Models\Post\Video\Model as VideoModel;
use App\Http\UseCases\Post\UseCase as PostUseCase;
use App\Http\Requests\Post\Video\CreateRequest;

class Create extends PostUseCase
{
  public function __construct(Repository $PostRepository, VideoModel $model) {
    parent::__construct($PostRepository, $model);
  }

  public function create(CreateRequest $request) {
    $data = array();
    foreach ($this->model->fillable as $item) {
      $data[$item] = $request->$item;
    }

    $post = new $this->model($data);
    $this->postRepository->store($post);
  }
}
