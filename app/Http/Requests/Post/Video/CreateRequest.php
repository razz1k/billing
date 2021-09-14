<?php

namespace App\Http\Requests\Post\Video;

use App\Http\Requests\Post\CreateRequest as PostRequest;

class CreateRequest extends PostRequest
{
  protected $additionalRules = [
    'videoYoutube' => ['required', 'url'],
  ];
}
