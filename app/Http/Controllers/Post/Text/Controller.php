<?php

namespace App\Http\Controllers\Post\Text;

use App\Http\Controllers\Post\PostController;
use App\Repositories\Post\TextPostRepository;
use App\Http\UseCases\Post\Text\Create as CreateProvider;
use App\Http\UseCases\Post\Text\Update as UpdateProvider;
use App\Http\Requests\Post\Text\CreateRequest as CreateRequest;

class Controller extends PostController
{
  public $blogType = 'text';

  public function __construct(TextPostRepository $postRepository, CreateProvider $createProvider, UpdateProvider $updateProvider) {
    parent::__construct($postRepository, $createProvider, $updateProvider);
  }

  public function storeAction(CreateRequest $request) {
    $this->createProvider->create($request);

    return redirect(route('admin.' . $this->routeList));
  }
}
