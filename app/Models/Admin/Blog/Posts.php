<?php

namespace App\Models\Admin\Blog;

use App\Traits\SeoTrait;
use App\Traits\ImageTrait;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Posts extends Model
{
    use SoftDeletes, Sortable, SeoTrait, ImageTrait;

    protected $table = 'blog_posts';

    protected $dates = ['publish_at'];

    protected $fillable = [
        'category_id',
        'title',
        'description',
    ];

    protected $sortable = [
        'id',
        'category_id',
        'title',
        'status',
        'created_at',
        'publish_at',
    ];

    protected $traits = [
        'image' => [
            'path' => 'blog/posts/',
        ],
        'seo' => [
            'title' => 'title',
            'description' => 'description',
        ],
    ];

    // -------------------------------------------------------------------------------

    public function category()
    {
        return $this->belongsTo('App\Models\Admin\Blog\Categorys');
    }

    // -------------------------------------------------------------------------------

    public function comments()
    {
        return $this->hasMany('App\Models\Admin\Blog\Comments', 'post_id');
    }

    // -------------------------------------------------------------------------------
}
