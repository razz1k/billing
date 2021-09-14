<?php

namespace App\Http\UseCases\Post\Text;

use App\Repositories\Post\TextPostRepository;
use App\Models\TextPost;
use App\Http\UseCases\Post\Create as PostCreate;
use App\Http\Requests\Post\Text\CreateRequest;

class Create extends PostCreate
{
  public function __construct(TextPostRepository $PostRepository, TextPost $model) {
    parent::__construct($PostRepository, $model);
  }

  public function create(CreateRequest $request) {
    $data = array();
    foreach ($this->model->fillable as $item) {
      $data[$item] = $request->$item;
    }

    $post = new $this->model($data);
    $this->PostRepository->store($post);
  }
}
