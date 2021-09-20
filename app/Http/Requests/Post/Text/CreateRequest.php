<?php

namespace App\Http\Requests\Post\Text;

use App\Http\Requests\Post\Request as PostRequest;

class CreateRequest extends PostRequest
{
  public $additionalRules = [
    'content' => ['required', 'string', 'min:8'],
  ];

  public function __construct(array $query = [], array $request = [], array $attributes = [], array $cookies = [], array $files = [], array $server = [], $content = null) {
    parent::__construct($query, $request, $attributes, $cookies, $files, $server, $content);

    $this->rules = array_merge($this->rules, $this->additionalRules);
  }
}
