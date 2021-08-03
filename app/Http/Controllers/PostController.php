<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

abstract class PostController extends Controller
{
    /**
     * @var string
     */
    public $viewDir = 'blog.post.';
    public $blogType;
    public $model;
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
        $this->viewSingle = $this->viewDir . $this->blogType . '.single';
        $this->viewList = $this->viewDir . $this->blogType . '.list';
        $this->viewEditor = 'blog.editor';
        $this->model = 'App\Models\\' . ucfirst($this->blogType) . 'Post';
    }

    public function fillFromData($data): array {
        $arr = array();
        foreach ((new $this->model)->getFillable() as $var) {
            $arr[$var] = $data[$var];
        }
        return $arr;
    }

    /**
     * Create a new TextPost instance.
     *
     * @param array|null $data
     * @return RedirectResponse
     */
    public function create(array $data = null): RedirectResponse {
        $data = $data ?? Request::capture()->all();
        $this->model::create($this->fillFromData($data));

        return redirect()->route('editor', [
            'type' => $this->blogType,
            'id' => $this->model::all()->last()->id,
            'edit' => 'edit'
        ]);
    }

    /**
     * Update TextPost instance.
     *
     * @param int $id
     * @param array|null $data
     * @return RedirectResponse
     */
    public function update(int $id, array $data = null): RedirectResponse {
        $data = $data ?? Request::capture()->all();

        /** @var Category $category */
        $category = $this->model::findOrFail($id);
        $category->fill($data);
        $category->save();

        return redirect()->route('editor', ['type' => $this->blogType, 'id' => $category->id, 'edit' => 'edit']);
    }

    public function edit($id = null) {
        if (isset($id)) {
            $data = $this->model::findOrFail($id);
        } else {
            $data = $this->model::all();
        }

        return view($this->viewEditor, ['data' => $data, 'type' => $this->blogType, 'id' => $id]);
    }

    public function delete(int $id): RedirectResponse {
        $this->model::destroy($id);
        return redirect()->route('editor', ['type' => $this->blogType]);
    }

    public function show($id = null) {

        if (isset($id)) {
            $layout = $this->viewSingle;
            $data = $this->model::findOrFail($id);
        } else {
            $layout = $this->viewList;
            $data = $this->model::all();
        }

        return view($layout, ['data' => $data, 'type' => $this->blogType]);
    }
}
