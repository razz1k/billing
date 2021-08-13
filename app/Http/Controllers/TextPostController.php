<?php

namespace App\Http\Controllers;

class TextPostController extends PostController
{
    public $blogType = 'text';
    public $additionalValidationRules = [
        'content' => ['required', 'string', 'min:8'],
    ];
}
