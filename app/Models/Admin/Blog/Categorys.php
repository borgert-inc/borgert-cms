<?php

namespace App\Models\Admin\Blog;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

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
        'status',
        'created_at',
    ];
}
