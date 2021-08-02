<?php

namespace App\Http\Controllers;

use App\Models\TextPost;
use Illuminate\Http\Request;

class TextPostController extends PostController
{
    public $blogType = 'text';

    public function show($id = null) {

        if (isset($id)) {
            $layout = $this->viewSingle;
            $data = TextPost::findOrFail($id);
        } else {
            $layout = $this->viewList;
            $data = TextPost::all();
        }

        return view($layout, ['data' => $data, 'type' => $this->blogType]);
    }
}
