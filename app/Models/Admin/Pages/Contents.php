<?php

namespace App\Models\Admin\Pages;

use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contents extends Model
{
    use SoftDeletes, Sortable;

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

    // -------------------------------------------------------------------------------

    public function category()
    {
        return $this->belongsTo('App\Models\Admin\Pages\Categorys');
    }

    // -------------------------------------------------------------------------------

    public function seo($type = null)
    {
        if ($type === null) {
            return;
        }

        if ($type === 'title') {
            if (! empty($this->seo_title)) {
                return str_limit($this->seo_title, 70);
            }

            return str_limit($this->title, 70);
        }

        if ($type === 'description') {
            if (! empty($this->seo_description)) {
                return str_limit($this->seo_description, 170);
            }

            return str_limit($this->description, 170);
        }

        if ($type === 'keywords') {
            return $this->seo_keywords;
        }
    }

    // -------------------------------------------------------------------------------
}
