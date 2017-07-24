<?php

namespace App\Traits;

trait ImageTrait
{
    // -------------------------------------------------------------------------------

    public function image($thumb = false)
    {
        if (! $this->image_trait['path']) {
            return;
        }

        $img = collect(\Storage::disk('uploads')->files($this->traits['image']['path'].$this->id.'/'.($thumb ? 'thumbnail/' : '')))->first();

        return $img ? 'uploads/'.$img : null;
    }

    // -------------------------------------------------------------------------------

    public function images($thumb = false)
    {
        if (! $this->image_trait['path']) {
            return;
        }

        $img = collect(\Storage::disk('uploads')->files($this->traits['image']['path'].$this->id.'/'.($thumb ? 'thumbnail/' : '')))->all();

        return $img ? 'uploads/'.$img : null;
    }

    // -------------------------------------------------------------------------------
}
