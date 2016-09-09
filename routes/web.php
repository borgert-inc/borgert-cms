<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// ---------------------------------------------------------------------------------------------

// Web
Route::get('', function () {
    return view('base');
});

// ---------------------------------------------------------------------------------------------

// Custom
$path = __DIR__.'/custom';
$files = File::allFiles($path);
foreach ($files as $file) {
    if (! file_exists($file)) {
        throw new FileNotFoundException('File ['.$file.'] the route not found.');
    }
    require_once $file;
}

// ---------------------------------------------------------------------------------------------

// Auth
$path = __DIR__.'/auth';
$files = File::allFiles($path);
foreach ($files as $file) {
    if (! file_exists($file)) {
        throw new FileNotFoundException('File ['.$file.'] the route not found.');
    }
    require_once $file;
}

// ---------------------------------------------------------------------------------------------

// Admin
Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'as' => 'admin.'], function () {
    $path = __DIR__.'/admin';
    $files = File::allFiles($path);
    foreach ($files as $file) {
        if (! file_exists($file)) {
            throw new FileNotFoundException('File ['.$file.'] the route not found.');
        }
        require_once $file;
    }
});

// ---------------------------------------------------------------------------------------------
