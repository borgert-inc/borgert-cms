<?php

namespace App\Models\Admin\Pages;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categorys extends Model
{
    
    use SoftDeletes;
    
    protected $table = 'pages_categorys';

    protected $fillable = [
    	'title'
    ];

}
