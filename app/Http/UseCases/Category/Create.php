<?php

namespace App\Http\UseCases\Category;

use App\Http\Requests\Category\CreateRequest;
use App\Models\Category;
use App\Repositories\CategoryRepository;
use Exception;

class Create
{
  /**
   * @var CategoryRepository
   */
  private $categoryRepository;

  public function __construct(CategoryRepository $categoryRepository) {
    $this->categoryRepository = $categoryRepository;
  }

  /**
   * @throws Exception
   */
  public function create(CreateRequest $request) {
    try {
      $category = new Category(['name' => $request->name]);
      $this->categoryRepository->store($category);
    } catch (Exception $exception) {
      throw new Exception($exception);
    }
  }
}
