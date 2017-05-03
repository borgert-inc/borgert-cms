<?php

namespace App\Models\Admin\Gallerys;

use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallerys extends Model
{
    use SoftDeletes, Sortable;

    protected $table = 'gallerys';

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

    public function image($thumb = false)
    {
        $img = collect(\Storage::disk('uploads')->files('gallerys/'.$this->id.'/'.($thumb ? 'thumbnail/' : '')))->first();

        return $img ? public_path('uploads/'.$img) : null;
    }

    // -------------------------------------------------------------------------------

    public function images()
    {
        $imgs = collect(\Storage::disk('uploads')->files('gallerys/'.$this->id))->all();

        return $imgs ? $imgs : null;
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
