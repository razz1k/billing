<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

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


    public function create(Request $request, int $id = null): RedirectResponse {
        $validated = $request->validate([
            'title' => ['required', 'string'],
        ]);
        $this->model::create($this->fillFromData($request->capture()->all()));

        return redirect()->route('editor', [
            'type' => $this->blogType,
            'id' => $this->model::all()->last()->id,
            'edit' => 'edit'
        ]);
    }

    /**
     * Update Post instance.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, int $id): RedirectResponse {
        $data = $request->capture()->all();

        /** @var Post $post */
        $post = $this->model::findOrFail($id);
        $post->fill($data);
        $post->save();

        return redirect()->route('editor', ['type' => $this->blogType, 'id' => $post->id, 'edit' => 'edit']);
    }

    public function edit(Request $request, int $id = null) {
        if (isset($id)) {
            $data = $this->model::findOrFail($id);
        } else {
            $data = $this->model::all();
        }

        return view($this->viewEditor, ['data' => $data, 'type' => $this->blogType, 'id' => $id]);
    }

    public function delete(Request $request, int $id): RedirectResponse {
        $this->model::destroy($id);
        return redirect()->route('editor', ['type' => $this->blogType]);
    }

    public function show(Request $request, int $id = null) {

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
