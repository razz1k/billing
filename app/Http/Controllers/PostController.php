<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

abstract class PostController extends Controller
{
    /**
     * @var string
     */
    public $viewDir = 'blog.post.';
    public $blogType;
    /**
     * @var string
     */
    public $viewSingle;
    /**
     * @var string
     */
    public $viewList;

    public function __construct() {
        $this->viewSingle = $this->viewDir . $this->blogType . '.single';
        $this->viewList = $this->viewDir . $this->blogType . '.list';
    }

    public function show($id = null) {

        if (isset($id)) {
            $layout = $this->viewSingle;
            $data = Post::findOrFail($id);
        } else {
            $layout = $this->viewList;
            $data = Post::all();
        }

        return view($layout, ['data' => $data, 'type' => $this->blogType]);
    }

    public function store(Request $request) {
        $data = $request->all();
        unset($data['_method']);
        unset($data['_token']);

        /** @var Post $post */
        $post = Post::get();
        $post->fill($request->all());
        $post->save();

        return redirect()->route('profile.show');
    }
}
