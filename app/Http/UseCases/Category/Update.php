<?php

namespace App\Http\UseCases\Category;

use App\Http\Requests\Category\UpdateRequest;
use App\Repositories\CategoryRepository;
use Exception;

class Update
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
  public function update(UpdateRequest $request) {
    try {
      $category = $this->categoryRepository->getSingle($request->id);
      $category->fill($request->capture()->all());
      $this->categoryRepository->store($category);
    } catch (Exception $exception) {
      throw new Exception('Error data base');
    }
  }
}
