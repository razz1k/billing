<?php

namespace App\Http\Requests\Post\Video;

use App\Http\Requests\Post\Request as PostRequest;

class Request extends PostRequest
{
  protected $additionalRules = [
    'videoYoutube' => ['required', 'url'],
  ];
}
