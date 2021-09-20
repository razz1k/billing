<?php

namespace App\Http\Requests\Post\Video;

use App\Http\Requests\Post\Request as PostRequest;

class CreateRequest extends PostRequest
{
  protected $additionalRules = [
    'videoYoutube' => ['required', 'url'],
  ];
}
