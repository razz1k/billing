<?php

namespace App\Http\Controllers;

use App\Models\VideoPost;
use Illuminate\Http\Request;

class VideoPostController extends PostController
{
    public $blogType = 'video';

    public function show($id = null) {

        if (isset($id)) {
            $layout = $this->viewSingle;
            $data = VideoPost::findOrFail($id);
        } else {
            $layout = $this->viewList;
            $data = VideoPost::all();
        }

        return view($layout, ['data' => $data, 'type' => $this->blogType]);
    }
}
