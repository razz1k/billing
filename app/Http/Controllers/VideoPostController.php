<?php

namespace App\Http\Controllers;

class VideoPostController extends PostController
{
    public $blogType = 'video';
    public $additionalValidationRules = [
        'videoYoutube' => ['required', 'url'],
    ];
}
