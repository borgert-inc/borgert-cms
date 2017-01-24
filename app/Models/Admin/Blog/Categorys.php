<?php

namespace App\Models\Admin\Blog;

use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categorys extends Model
{
    use SoftDeletes, Sortable;

    protected $table = 'blog_category';

    protected $fillable = [
        'title',
    ];

    protected $sortable = [
        'id',
        'title',
        'order',
        'status',
        'created_at',
    ];
}
