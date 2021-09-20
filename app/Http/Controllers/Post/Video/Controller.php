<?php

namespace App\Http\Controllers\Post\Video;

use App\Http\Controllers\Post\PostController;
use App\Repositories\Post\Video\Repository;
use App\Http\UseCases\Post\Video\Create as CreateProvider;
use App\Http\UseCases\Post\Video\Update as UpdateProvider;
use App\Http\Requests\Post\Video\CreateRequest;
use App\Http\Requests\Post\Video\UpdateRequest;

class Controller extends PostController
{
  public $blogType = 'video';

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
