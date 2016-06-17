<?php

// ---------------------------------------------------------------------------------------------

// Start
Route::get('', function () {
    return view('base');
});

// ---------------------------------------------------------------------------------------------

// Authentication routes...

// Login
Route::get('auth/login', ['as' => 'login', 'uses' => 'Admin\Security\LoginController@index']);
Route::post('auth/login', ['as' => 'login', 'uses' => 'Admin\Security\LoginController@authenticate']);

// Logout
Route::get('auth/logout', ['as' => 'logout', 'uses' => 'Admin\Security\LogoutController@logout']);

// Esqueci minha senha
Route::get('auth/forget-password', ['as' => 'forget_password', 'uses' => 'Admin\Security\ForgetPasswordController@index']);

// ---------------------------------------------------------------------------------------------

// Router Partials

Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'as' => 'admin.'], function () {
    $path = __DIR__.'/Routes/Admin';
    $files = File::allFiles($path);

    foreach ($files as $file) {
        if (! file_exists($file)) {
            throw new FileNotFoundException('O arquivo da ['.$file.'] da da rota não existe.');
        }
        require_once $file;
    }
});

// ---------------------------------------------------------------------------------------------
