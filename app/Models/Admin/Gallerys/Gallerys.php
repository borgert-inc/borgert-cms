<?php

namespace App\Models\Admin\Gallerys;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

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
        'status',
        'created_at',
    ];
}
