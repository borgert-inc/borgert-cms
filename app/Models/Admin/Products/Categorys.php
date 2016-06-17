<?php

namespace App\Models\Admin\Products;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categorys extends Model
{
    use SoftDeletes;

    protected $table = 'products_categorys';

    protected $fillable = [
		'title',
    ];
}
