<?php

namespace App\Http\UseCases\Post\Text;

use App\Repositories\Post\Text\PostRepository;
use App\Models\TextPost;
use App\Http\UseCases\Post\UseCase as PostUseCase;
use App\Http\Requests\Post\Text\CreateRequest;

class Create extends PostUseCase
{
  public function __construct(PostRepository $PostRepository, TextPost $model) {
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
