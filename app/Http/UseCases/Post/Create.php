<?php

namespace App\Http\UseCases\Post;

abstract class Create
{
  protected $PostRepository;
  protected $model;
  protected $request;

  public function __construct($PostRepository, $model) {
    $this->PostRepository = $PostRepository;
    $this->model = $model;
  }
}
