<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

abstract class Post extends Model
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

    public function __construct(array $attributes = []) {
        $this->fillable = array_merge($this->fillable, $this->additionalParams);

        parent::__construct($attributes);
    }
}
