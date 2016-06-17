<?php

namespace App\Models\Admin\Pages;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class Categorys extends Model
{
    use SoftDeletes, Sortable;

    protected $table = 'pages_categorys';

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
