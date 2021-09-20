<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
  public $viewUpdate;

  public function __construct($postRepository, $createProvider, $updateProvider) {
    $view = $this->viewDir . $this->viewType . $this->blogType;
    $this->viewSingle = $view . '.single';
    $this->viewUpdate = $view . '.update';
    $this->routeList = $this->viewType . $this->blogType . '.list';
    $this->viewList = $view . '.list';
    $this->viewCreate = $view . '.create';
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

  //storeAction implement in child class

  public function editAction($id) {
    return view($this->viewUpdate, [
      'post' => $this->postRepository->getSingle($id),
      'categories' => Category::all(),
    ]);
  }

  public function singleAction($id) {
    $post = $this->postRepository->getSingle($id);

    return view($this->viewSingle, [
      'post' => $post,
      'author' => User::get()->where('id', $post->author_id)->first(),
    ]);
  }

  public function listAction() {
    return view($this->viewList, [
      'posts' => $this->postRepository->getAll(),
      'isAdminPanel' => str_contains(Route::currentRouteName(), 'admin')
    ]);
  }

  //updateAction implement in child class

  public function deleteAction($id) {
    $this->postRepository->delete($id);

    return redirect(route($this->routeList));
  }
}
