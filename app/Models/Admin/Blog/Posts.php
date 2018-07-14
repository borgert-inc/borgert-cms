<?php

namespace App\Models\Admin\Blog;

use App\Traits\SeoTrait;
use App\Traits\ImageTrait;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Nicolaslopezj\Searchable\SearchableTrait;

class Posts extends Model
{
    use SoftDeletes, Sortable, SeoTrait, ImageTrait, SearchableTrait;

    protected $table = 'blog_posts';

    protected $dates = ['publish_at'];

    protected $fillable = [
        'category_id',
        'title',
        'summary',
        'description',
        'publish_at',
        'status',
        'seo_title',
        'seo_description',
        'seo_keywords',
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

    protected $searchable = [
        'columns' => [
            'title' => 10,
            'summary' => 8,
            'description' => 6,
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

    // ----------------------------------------------------------------------------

    public function image($thumb = false)
    {
        $img = collect(\Storage::disk('uploads')->files('blog/posts/'.$this->id.'/'.($thumb ? 'thumbnail/' : '')))->first();

        return $img ? 'uploads/'.$img : null;
    }

    // ----------------------------------------------------------------------------

    public function scopeCategoryId($query, $category_id)
    {
        return $query->where('category_id', $category_id);
    }

    // ----------------------------------------------------------------------------

    public function seo($type = null)
    {
        if ($type === null) {
            return;
        }

        if ($type === 'title') {
            if (! empty($this->seo_title)) {
                return str_limit($this->seo_title, 70);
            }

            return str_limit($this->title, 70);
        }

        if ($type === 'description') {
            if (! empty($this->seo_description)) {
                return str_limit($this->seo_description, 170);
            }

            return str_limit($this->summary, 170);
        }

        if ($type === 'keywords') {
            return $this->seo_keywords;
        }
    }

    // -------------------------------------------------------------------------------
}
