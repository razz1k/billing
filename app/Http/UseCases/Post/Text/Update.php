<?php

namespace App\Http\UseCases\Post\Text;

use App\Repositories\Post\Text\Repository;
use App\Models\Post\Text\Model as TextModel;
use App\Http\UseCases\Post\UseCase as PostUseCase;
use App\Http\Requests\Post\Text\UpdateRequest;

class Update extends PostUseCase
{
  public function __construct(Repository $PostRepository, TextModel $model) {
    parent::__construct($PostRepository, $model);
  }

  public function update(UpdateRequest $request) {
    $post = $this->postRepository->getSingle($request->id);
    $post->fill($request->capture()->all());
    $this->postRepository->store($post);
  }
}
