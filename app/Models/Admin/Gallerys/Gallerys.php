<?php

namespace App\Models\Admin\Gallerys;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallerys extends Model
{
    use SoftDeletes;

    protected $table = 'gallerys';

    protected $fillable = [
    	'title',
    	'content',
    ];
}
