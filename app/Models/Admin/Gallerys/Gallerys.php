<?php

namespace App\Models\Admin\Gallerys;

use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallerys extends Model
{
    use SoftDeletes, Sortable;

    protected $table = 'gallerys';

    protected $fillable = [
        'title',
        'content',
    ];

    protected $sortable = [
        'id',
        'title',
        'order',
        'status',
        'created_at',
    ];
}
