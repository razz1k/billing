<?php

namespace App\Repositories\Post;

abstract class PostRepository
{
  protected $model;

  public function __construct($model) {
    $this->model = $model;
  }

  public function getAll() {
    return $this->model::all();
  }

  public function getSingle($id) {
    return $this->model::findOrFail($id);
  }

  public function store($postObject) {
    $postObject->save();
  }

  public function delete($id) {
    $this->model::findOrFail($id)->delete();
  }
}
