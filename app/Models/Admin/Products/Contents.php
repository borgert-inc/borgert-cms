<?php

namespace App\Models\Admin\Products;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contents extends Model
{
    use SoftDeletes;

    protected $table = 'products_contents';

    protected $fillable = [
        'title',
        'content',
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Admin\Products\Categorys');
    }
}
