<?php

namespace App\Models\Admin\Blog;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comments extends Model
{
    use SoftDeletes;

    protected $table = 'blog_comments';

    protected $fillable = [
        'post_id',
        'name',
        'email',
        'description',
        'status',
    ];

    public function post()
    {
        return $this->belongsTo('App\Models\Admin\Blog\Posts');
    }
}
