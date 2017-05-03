<?php

namespace App\Models\Admin\Products;

use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contents extends Model
{
    use SoftDeletes, Sortable;

    protected $table = 'products_contents';

    protected $fillable = [
        'title',
        'description',
    ];

    protected $sortable = [
        'id',
        'title',
        'status',
        'created_at',
    ];

    // -------------------------------------------------------------------------------

    public function category()
    {
        return $this->belongsTo('App\Models\Admin\Products\Categorys');
    }

    // -------------------------------------------------------------------------------

    public function seo($type = null)
    {
        if ($type === null) {
            return null;
        }

        if ($type === 'title') {
            if (!empty($this->seo_title)) {
                return str_limit($this->seo_title, 70);
            }

            return str_limit($this->title, 70);
        }

        if ($type === 'description') {
            if (!empty($this->seo_description)) {
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
