<?php

namespace App\Models\Admin\Products;

use App\Traits\SeoTrait;
use App\Traits\ImageTrait;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contents extends Model
{
    use SoftDeletes, Sortable, SeoTrait, ImageTrait;

    protected $table = 'products_contents';

    protected $fillable = [
        'title',
        'description',
    ];

    protected $sortable = [
        'id',
        'title',
        'status',
        'created_at',
    ];

    protected $traits = [
        'image' => [
            'path' => 'products/',
        ],
        'seo' => [
            'title' => 'title',
            'description' => 'description',
        ],
    ];

    // -------------------------------------------------------------------------------

    public function category()
    {
        return $this->belongsTo('App\Models\Admin\Products\Categorys');
    }

    // -------------------------------------------------------------------------------
}
