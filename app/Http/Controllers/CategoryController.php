<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\CreateRequest;
use App\Http\Requests\Category\UpdateRequest;
use App\Http\UseCases\Category\Create as CreateProvider;
use App\Http\UseCases\Category\Update as UpdateProvider;
use App\Repositories\CategoryRepository;

class CategoryController extends Controller
{
  /**
   * @var CategoryRepository
   */
  private $categoryRepository;

  /**
   * @var CreateProvider
   */
  private $createProvider;

  /**
   * @var UpdateProvider
   */
  private $updateProvider;

  public function __construct(CategoryRepository $categoryRepository, CreateProvider $createProvider, UpdateProvider $updateProvider) {
    $this->categoryRepository = $categoryRepository;
    $this->createProvider = $createProvider;
    $this->updateProvider = $updateProvider;
  }

  public function listAction() {
    $categories = $this->categoryRepository->getAll();

    return view('blog.category.list', [
      'categories' => $categories
    ]);
  }

  public function singleAction($id) {
    $category = $this->categoryRepository->getSingle($id);

    return view('blog.category.single', [
      'category' => $category
    ]);
  }

  public function createAction() {
    return view('blog.category.create');
  }

  public function storeAction(CreateRequest $request) {
    $this->createProvider->create($request);

    return redirect(route('admin.category.list'));
  }

  public function editAction($id) {
    return view('blog.category.update', [
      'category' => $this->categoryRepository->getSingle($id)
    ]);
  }

  public function updateAction(UpdateRequest $request) {
    $this->updateProvider->update($request);

    return view('blog.category.update', [
      'category' => $this->categoryRepository->getSingle($request->id)
    ]);
  }

  public function deleteAction($id) {
    $this->categoryRepository->delete($id);

    return redirect(route('admin.category.list'));
  }
}
