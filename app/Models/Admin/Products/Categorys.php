<?php

namespace App\Models\Admin\Products;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class Categorys extends Model
{
    use SoftDeletes, Sortable;

    protected $table = 'products_categorys';

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
