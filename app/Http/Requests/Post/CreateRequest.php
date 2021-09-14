<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

abstract class CreateRequest extends FormRequest
{
  public $rules = [
    'metaTitle' => ['required', 'string', 'max:250'],
    'metaDescription' => ['required', 'string'],
    'metaKeywords' => ['required', 'string'],
    'preview' => ['required', 'string'],
    'title' => ['required', 'string'],
    'description' => ['required', 'string'],
    'after' => ['required', 'string'],
    'content' => ['required', 'string', 'min:8'], //TODO take to text request
  ];
  public $additionalRules;

  public function __construct(array $query = [], array $request = [], array $attributes = [], array $cookies = [], array $files = [], array $server = [], $content = null, $additionalRules = []) {
    parent::__construct($query, $request, $attributes, $cookies, $files, $server, $content);

    $this->rules = array_merge($this->rules, $additionalRules);
  }

  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize() {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules() {
    return $this->rules;
  }
}
