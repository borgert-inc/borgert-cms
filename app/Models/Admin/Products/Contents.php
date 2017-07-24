<?php

namespace App\Models\Admin\Products;

use App\Traits\ImageTrait;
use App\Traits\SeoTrait;
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

    protected $image_trait = [
        'path' => 'products/'
    ];

    // -------------------------------------------------------------------------------

    public function category()
    {
        return $this->belongsTo('App\Models\Admin\Products\Categorys');
    }

    // -------------------------------------------------------------------------------
}
