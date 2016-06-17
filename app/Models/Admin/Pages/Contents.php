<?php

namespace App\Models\Admin\Pages;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contents extends Model
{
    use SoftDeletes;

    protected $table = 'pages_contents';

    protected $fillable = [
    	'title',
    	'content',
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Admin\Pages\Categorys');
    }
}
