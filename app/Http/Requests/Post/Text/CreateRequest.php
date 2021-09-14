<?php

namespace App\Http\Requests\Post\Text;

use App\Http\Requests\Post\CreateRequest as PostRequest;

class CreateRequest extends PostRequest
{
  public $additionalRules = [//    'content' => ['required', 'string', 'min:8'], //TODO not working
  ];
}
