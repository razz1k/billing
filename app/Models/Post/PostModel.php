<?php

namespace App\Models\Post;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

abstract class PostModel extends Model
{
  use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  public $fillable = [
    'author_id',
    'category_id',
    'metaTitle',
    'metaDescription',
    'metaKeywords',
    'preview',
    'title',
    'description',
    'after',
  ];

  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'posts';
}
