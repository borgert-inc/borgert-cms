<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Users extends Model
{
	use SoftDeletes;

    protected $table = 'users';

    protected $fillable = [
    	'name', 
    	'email', 
    	'password',
    ];
}
