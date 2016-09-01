<?php

namespace App\Http\Routes;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\App;

class Routing
{

    public static function get()
    {
        $routing = new self();
        $routing->auth()->admin()->pages();
    }

    private function auth()
    {
        require_once __DIR__.'/Auth/auth.php';

        return $this;
    }

    private function admin()
    {
        $config = ['middleware' => 'auth', 'prefix' => 'admin', 'as' => 'admin.'];
        Route::group($config, function () {
            $this->make('/Admin');
        });

        return $this;
    }

    private function pages()
    {
        $this->make('/Custom');

        return $this;
    }

    private function make($folder)
    {
        $files = File::allFiles(__DIR__.$folder);

        foreach ($files as $file) {
            if (! file_exists($file)) {
                $text = 'O arquivo da ['.$file.'] da da rota não existe.';
                throw new FileNotFoundException($text);

            }

            require_once $file;
        }
    }
}
