<?php

use Illuminate\Support\Facades\App;
use App\Models\Admin\Pages\Contents;

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

// Mobule: AUTH

Route::group(['as' => 'auth.'], function () {
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', ['as' => 'login', 'uses' => 'Auth\LoginController@login']);
    Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\LogoutController@logout']);

    Route::get('password/email', ['as' => 'password.forgot', 'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm']);
    Route::post('password/email', ['as' => 'password.send', 'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail']);
    Route::get('password/reset/{token?}', ['as' => 'password.reset', 'uses' => 'Auth\ResetPasswordController@showResetForm']);
    Route::post('password/reset', ['as' => 'password.reset', 'uses' => 'Auth\ResetPasswordController@reset']);
});

// ---------------------------------------------------------------------------------------------

// Borgert CMS Admin

Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'as' => 'admin.'], function () {

    // Dashboard
    Route::get('/', ['as' => 'index', 'uses' => 'Admin\DashboardController@index']);

    // ---------------------------------------------------------------------------------------------

    // Mobule: BLOG

    Route::group(['prefix' => 'blog', 'as' => 'blog.'], function () {

        // Categorys
        Route::resource('categorys', 'Admin\Blog\CategorysController');
        Route::post('categorys/update/{id}', 'Admin\Blog\CategorysController@update')->name('categorys.update');
        Route::post('categorys/destroy', 'Admin\Blog\CategorysController@destroy')->name('categorys.destroy');

        // Posts
        Route::resource('posts', 'Admin\Blog\PostsController');
        Route::post('posts/update/{id}', 'Admin\Blog\PostsController@update')->name('posts.update');
        Route::post('posts/destroy', 'Admin\Blog\PostsController@destroy')->name('posts.destroy');
        Route::any('posts/upload/{id?}', 'Admin\Blog\PostsController@upload')->name('posts.upload');

        // Comments
        Route::group(['prefix' => 'comments', 'as' => 'comments.'], function () {
            Route::get('index', ['as' => 'index', 'uses' => 'Admin\Blog\CommentsController@index']);
            Route::get('aproved', ['as' => 'aproved', 'uses' => 'Admin\Blog\CommentsController@aproved']);
            Route::get('reproved', ['as' => 'reproved', 'uses' => 'Admin\Blog\CommentsController@reproved']);
            Route::get('aprove/{id}', ['as' => 'aprove', 'uses' => 'Admin\Blog\CommentsController@aprove']);
            Route::get('reprove/{id}', ['as' => 'reprove', 'uses' => 'Admin\Blog\CommentsController@reprove']);
        });
    });

    // ---------------------------------------------------------------------------------------------

    // Mobule: GALLERYS

    Route::resource('gallerys', 'Admin\Gallerys\GallerysController');
    Route::post('gallerys/destroy', 'Admin\Gallerys\GallerysController@destroy')->name('gallerys.destroy');
    Route::post('gallerys/update/{id}', 'Admin\Gallerys\GallerysController@update')->name('gallerys.update');
    Route::any('gallerys/upload/{id?}', 'Admin\Gallerys\GallerysController@upload')->name('gallerys.upload');

    // ---------------------------------------------------------------------------------------------

    // Mobule: MAILBOX

    Route::group(['prefix' => 'mailbox', 'as' => 'mailbox.'], function () {
        Route::get('inbox', ['as' => 'inbox', 'uses' => 'Admin\Mailbox\InboxController@index']);
        Route::get('trash', ['as' => 'trash', 'uses' => 'Admin\Mailbox\TrashController@index']);
        Route::post('trash/{id}', ['as' => 'trash_in', 'uses' => 'Admin\Mailbox\TrashController@trash'])->where('id', '[0-9]+');
        Route::get('archive', ['as' => 'archive', 'uses' => 'Admin\Mailbox\ArchiveController@index']);
        Route::post('archive/{id}', ['as' => 'archive_in', 'uses' => 'Admin\Mailbox\ArchiveController@archive'])->where('id', '[0-9]+');
        Route::get('message/{id}', ['as' => 'message', 'uses' => 'Admin\Mailbox\MessageController@index'])->where('id', '[0-9]+');
        Route::post('delete', ['as' => 'delete', 'uses' => 'Admin\Mailbox\DeleteController@destroy']);
    });

    // ---------------------------------------------------------------------------------------------

    // Mobule: PAGES

    Route::group(['prefix' => 'pages', 'as' => 'pages.'], function () {

        // Categorys
        Route::resource('categorys', 'Admin\Pages\CategorysController');
        Route::post('categorys/update/{id}', 'Admin\Pages\CategorysController@update')->name('categorys.update');
        Route::post('categorys/destroy', 'Admin\Pages\CategorysController@destroy')->name('categorys.destroy');

        // Contents
        Route::resource('contents', 'Admin\Pages\ContentsController');
        Route::post('contents/update/{id}', 'Admin\Pages\ContentsController@update')->name('contents.update');
        Route::post('contents/destroy', 'Admin\Pages\ContentsController@destroy')->name('contents.destroy');
    });

    // ---------------------------------------------------------------------------------------------

    // Mobule: PRODUCTS

    Route::group(['prefix' => 'products', 'as' => 'products.'], function () {

        // Categorys
        Route::resource('categorys', 'Admin\Products\CategorysController');
        Route::post('categorys/update/{id}', 'Admin\Products\CategorysController@update')->name('categorys.update');
        Route::post('categorys/destroy', 'Admin\Products\CategorysController@destroy')->name('categorys.destroy');

        // Contents
        Route::resource('contents', 'Admin\Products\ContentsController');
        Route::post('contents/update/{id}', 'Admin\Products\ContentsController@update')->name('contents.update');
        Route::post('contents/destroy', 'Admin\Products\ContentsController@destroy')->name('contents.destroy');
        Route::any('contents/upload/{id?}', 'Admin\Products\ContentsController@upload')->name('contents.upload');
    });

    // ---------------------------------------------------------------------------------------------

    // Mobule: PROFILE

    Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
        Route::get('', ['as' => 'profile', 'uses' => 'Admin\Profile\ProfileController@index']);
        Route::post('update', ['as' => 'update', 'uses' => 'Admin\Profile\ProfileController@password']);
    });

    // ---------------------------------------------------------------------------------------------

    // Mobule: USERS

    Route::resource('users', 'Admin\Users\UsersController');
    Route::post('users/update/{id}', 'Admin\Users\UsersController@update')->name('users.update');
    Route::post('users/destroy', 'Admin\Users\UsersController@destroy')->name('users.destroy');
});

// ---------------------------------------------------------------------------------------------

// Custom pages model

Route::get('/{page}', ['as' => 'pages', function ($page) {
    $page = Contents::where('slug', $page)->first();
    if (isset($page)) {
        return view('pages.template', ['page' => $page]);
    }

    App::abort(404);
}]);

// ---------------------------------------------------------------------------------------------
