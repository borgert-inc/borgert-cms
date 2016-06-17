<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class Users extends Model
{
    use SoftDeletes, Sortable;

    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $sortable = [
        'id',
        'name',
        'email',
        'status',
        'created_at',
    ];
}
