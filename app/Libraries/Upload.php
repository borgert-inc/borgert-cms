<?php

namespace App\Libraries;

use Illuminate\Http\Request;

class Upload
{
    public function __construct(Request $request, $init)
    {
        $user = \Auth::User();

        $path = 'temp-'.$user->id;

        if (is_numeric($init['id'])) {
            $path = $init['id'];
        }

        $config = [
            'script_url' => route($init['route'], $path),
            'upload_dir' => public_path('uploads').'/'.$init['path'].$path.'/',
            'upload_url' => url('/').'/uploads/'.$init['path'].$path.'/',
            'delete_type' => 'GET',
        ];

        // Deletamos a imagem por GET
        if (isset($request->file)) {
            $file = $init['path'].$path.'/'.$request->file;
            if (\Storage::disk('uploads')->has($file)) {
                \Storage::disk('uploads')->delete($file);
            }

            $thumb = $init['path'].$path.'/thumbnail/'.$request->file;
            if (\Storage::disk('uploads')->has($thumb)) {
                \Storage::disk('uploads')->delete($thumb);
            }
        }

        new UploadHandler($config);
    }
}
