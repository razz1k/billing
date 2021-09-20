<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

abstract class Request extends FormRequest
{
  public $rules = [
    'metaTitle' => ['required', 'string', 'max:250'],
    'metaDescription' => ['required', 'string'],
    'metaKeywords' => ['required', 'string'],
    'preview' => ['required', 'string'],
    'title' => ['required', 'string'],
    'description' => ['required', 'string'],
    'after' => ['required', 'string'],
  ];

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
