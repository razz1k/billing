<?php

namespace App\Http\UseCases\Post;

abstract class UseCase
{
  protected $postRepository;
  protected $model;
  protected $request;

  public function __construct($PostRepository, $model) {
    $this->postRepository = $PostRepository;
    $this->model = $model;
  }
}
