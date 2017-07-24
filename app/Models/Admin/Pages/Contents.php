<?php

namespace App\Models\Admin\Pages;

use App\Traits\SeoTrait;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contents extends Model
{
    use SoftDeletes, Sortable, SeoTrait;

    protected $table = 'pages_contents';

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
        'seo' => [
            'title' => 'title',
            'description' => 'description',
        ],
    ];

    // -------------------------------------------------------------------------------

    public function category()
    {
        return $this->belongsTo('App\Models\Admin\Pages\Categorys');
    }

    // -------------------------------------------------------------------------------
}
