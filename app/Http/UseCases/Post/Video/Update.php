<?php

namespace App\Http\UseCases\Post\Video;

use App\Repositories\Post\Video\Repository;
use App\Models\Post\Video\Model as VideoModel;
use App\Http\UseCases\Post\UseCase as PostUseCase;
use App\Http\Requests\Post\Video\UpdateRequest;

class Update extends PostUseCase
{
  public function __construct(Repository $PostRepository, VideoModel $model) {
    parent::__construct($PostRepository, $model);
  }

  public function update(UpdateRequest $request) {
    $post = $this->postRepository->getSingle($request->id);
    $post->fill($request->capture()->all());
    $this->postRepository->store($post);
  }
}
