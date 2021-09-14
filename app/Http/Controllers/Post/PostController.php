<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

abstract class PostController extends Controller
{
  public $viewDir = 'blog.';
  public $viewType = 'post.';
  public $blogType;
  public $model;
  public $viewSingle;
  public $routeList;
  public $viewList;
  public $viewCreate;
  public $postRepository;
  public $createProvider;
  public $updateProvider;
  public $createRequest;

  public function __construct($postRepository, $createProvider, $updateProvider) {
    $this->viewSingle = $this->viewDir . $this->viewType . $this->blogType . '.single';
    $this->routeList = $this->viewType . $this->blogType . '.list';
    $this->viewList = $this->viewDir . $this->routeList;
    $this->viewCreate = $this->viewDir . $this->viewType . $this->blogType . '.create';
    $this->model = 'App\Models\\' . ucfirst($this->blogType) . 'Post';

    $this->postRepository = $postRepository;
    $this->createProvider = $createProvider;
    $this->updateProvider = $updateProvider;
  }

  public function createAction() {
    return view($this->viewCreate, [
      'categories' => Category::all(),
      'user' => Auth::user(),
    ]);
  }

  public function editAction($id) {
    return view('blog.post.text.update', [
      'post' => $this->postRepository->getSingle($id)
    ]);
  }

  public function listAction() {
    $posts = $this->postRepository->getAll();

    return view($this->viewList, [
      'posts' => $posts,
    ]);
  }
}
