<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mailbox extends Model
{
    use SoftDeletes;

    protected $table = 'mailbox';

    protected $fillable = [
        'name',
        'email',
        'subject',
        'content',
    ];
}
