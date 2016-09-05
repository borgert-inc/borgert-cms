<?php

namespace App\Models\Admin\Pages;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class Contents extends Model
{
    use SoftDeletes, Sortable;

    protected $table = 'pages_contents';

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

    public function category()
    {
        return $this->belongsTo('App\Models\Admin\Pages\Categorys');
    }
}
