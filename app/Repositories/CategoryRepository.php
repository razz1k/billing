<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository
{
  public function getAll() {
    return Category::all();
  }

  public function getSingle($id) {
    return Category::findOrFail($id);
  }

  public function store(Category $category) {
    $category->save();
  }

  public function delete($id) {
    Category::findOrFail($id)->delete();
  }
}
