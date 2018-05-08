<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use SoftDeletes;

    protected $table = 'news';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_news_id', 'title', 'content', 'image', 'image_favorite', 'status'
    ];
}