<?php

namespace App\Models\Admin\Gallerys;

use App\Traits\SeoTrait;
use App\Traits\ImageTrait;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallerys extends Model
{
    use SoftDeletes, Sortable, SeoTrait, ImageTrait;

    protected $table = 'gallerys';

    protected $fillable = [
        'title',
        'description',
    ];

    protected $sortable = [
        'id',
        'title',
        'order',
        'status',
        'created_at',
    ];

    protected $traits = [
        'image' => [
            'path' => 'gallerys/',
        ],
        'seo' => [
            'title' => 'title',
            'description' => 'description',
        ],
    ];

    // -------------------------------------------------------------------------------
}
