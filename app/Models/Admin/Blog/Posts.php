<?php

namespace App\Models\Admin\Blog;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Posts extends Model
{
    use SoftDeletes;

    protected $table = 'blog_posts';

    protected $fillable = [
    	'category_id',
    	'title',
    	'content',
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Admin\Blog\Categorys');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Admin\Blog\Comments', 'post_id');
    }
}
