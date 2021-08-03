<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * @var string
     */
    public $viewDir = 'blog.category';
    /**
     * @var string
     */
    public $viewSingle;
    /**
     * @var string
     */
    public $viewList;
    /**
     * @var string
     */
    public $viewEditor;

    public function __construct() {
        $this->viewSingle = $this->viewDir . '.single';
        $this->viewList = $this->viewDir . '.list';
        $this->viewEditor = 'blog.editor';
    }

    /**
     * Create a new category instance.
     *
     * @param array|null $data
     * @return RedirectResponse
     */
    public function create(array $data = null): RedirectResponse {
        $data = $data ?? Request::capture()->all();
        Category::create([
            'name' => $data['name'],
        ]);
        return redirect()->route('editor', [
            'type' => 'category',
            'id' => Category::all()->last()->id,
            'edit' => 'edit'
        ]);
    }

    /**
     * Update category instance.
     *
     * @param int $id
     * @param array|null $data
     * @return RedirectResponse
     */
    public function update(int $id, array $data = null): RedirectResponse {
        $data = $data ?? Request::capture()->all();

        /** @var Category $category */
        $category = Category::findOrFail($id);
        $category->fill($data);
        $category->save();

        return redirect()->route('editor', ['type' => 'category', 'id' => $category->id, 'edit' => 'edit']);
    }

    public function edit($id = null) {
        if (isset($id)) {
            $data = Category::findOrFail($id);
        } else {
            $data = Category::all();
        }

        return view($this->viewEditor, ['data' => $data, 'type' => 'category', 'id' => $id]);
    }

    public function delete(int $id): RedirectResponse {
        Category::destroy($id);
        return redirect()->route('editor', ['type' => 'category']);
    }

    public function show($id = null) {
        if (isset($id)) {
            $layout = $this->viewSingle;
            $data = Category::findOrFail($id);
        } else {
            $layout = $this->viewList;
            $data = Category::all();
        }

        return view($layout, ['data' => $data, 'type' => 'category']);
    }
}
