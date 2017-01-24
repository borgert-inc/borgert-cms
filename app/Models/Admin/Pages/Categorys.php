<?php

namespace App\Models\Admin\Pages;

use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
        'order',
        'status',
        'created_at',
    ];
}
