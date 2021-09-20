<?php

namespace App\Http\Controllers\Post\Text;

use App\Http\Controllers\Post\PostController;
use App\Repositories\Post\Text\Repository;
use App\Http\UseCases\Post\Text\Create as CreateProvider;
use App\Http\UseCases\Post\Text\Update as UpdateProvider;
use App\Http\Requests\Post\Text\CreateRequest;
use App\Http\Requests\Post\Text\UpdateRequest;

class Controller extends PostController
{
  public $blogType = 'text';

  public function __construct(Repository $postRepository, CreateProvider $createProvider, UpdateProvider $updateProvider) {
    parent::__construct($postRepository, $createProvider, $updateProvider);
  }

  public function storeAction(CreateRequest $request) {
    $this->createProvider->create($request);

    return redirect(route('admin.' . $this->routeList));
  }

  public function updateAction(UpdateRequest $request) {
    $this->updateProvider->update($request);

    return $this->editAction($request->id);
  }
}
