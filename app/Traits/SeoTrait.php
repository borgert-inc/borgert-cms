<?php

namespace App\Traits;

trait SeoTrait
{
    public function seo($type = null)
    {
        if ($type === null) {
            return;
        }

        if ($type === 'title') {
            if (! empty($this->seo_title)) {
                return str_limit($this->seo_title, 70);
            }

            return str_limit($this->{$this->traits['seo']['title']}, 70);
        }

        if ($type === 'description') {
            if (! empty($this->seo_description)) {
                return str_limit($this->seo_description, 170);
            }

            return str_limit($this->{$this->traits['seo']['description']}, 170);
        }

        if ($type === 'keywords') {
            if (! empty($this->seo_keywords)) {
                return $this->seo_keywords;
            }

            return;
        }
    }
}
