<?php

// Mailbox
Route::group(['prefix' => 'blog', 'as' => 'blog.'], function () {

    // --------------------------------------------------------------------------------------------

    // Category
    Route::group(['prefix' => 'categorys', 'as' => 'categorys.'], function () {
        Route::get('list', [
            'as' => 'list',
            'uses' => 'Admin\Blog\CategorysController@index',
        ]);

        Route::get('create', [
            'as' => 'create',
            'uses' => 'Admin\Blog\CategorysController@create',
        ]);

        Route::get('edit/{id}', [
            'as' => 'edit',
            'uses' => 'Admin\Blog\CategorysController@edit',
        ])->where('id', '[0-9]+');

        Route::post('store', [
            'as' => 'store',
            'uses' => 'Admin\Blog\CategorysController@store',
        ]);

        Route::post('update/{id}', [
            'as' => 'update',
            'uses' => 'Admin\Blog\CategorysController@update',
        ])->where('id', '[0-9]+');

        Route::post('destroy', [
            'as' => 'destroy',
            'uses' => 'Admin\Blog\CategorysController@destroy',
        ]);
    });

    // --------------------------------------------------------------------------------------------

    // Posts
    Route::group(['prefix' => 'posts', 'as' => 'posts.'], function () {
        Route::get('list', [
            'as' => 'list',
            'uses' => 'Admin\Blog\PostsController@index',
        ]);

        Route::get('create', [
            'as' => 'create',
            'uses' => 'Admin\Blog\PostsController@create',
        ]);

        Route::get('edit/{id}', [
            'as' => 'edit',
            'uses' => 'Admin\Blog\PostsController@edit',
        ])->where('id', '[0-9]+');

        Route::post('store', [
            'as' => 'store',
            'uses' => 'Admin\Blog\PostsController@store',
        ]);

        Route::post('update/{id}', [
            'as' => 'update',
            'uses' => 'Admin\Blog\PostsController@update',
        ])->where('id', '[0-9]+');

        Route::post('destroy', [
            'as' => 'destroy',
            'uses' => 'Admin\Blog\PostsController@destroy',
        ]);

        Route::any('upload/{id?}', [
            'as' => 'upload',
            'uses' => 'Admin\Blog\PostsController@upload',
        ]);
    });

    // --------------------------------------------------------------------------------------------

    // Posts
    Route::group(['prefix' => 'comments', 'as' => 'comments.'], function () {
        Route::get('list', [
            'as' => 'list',
            'uses' => 'Admin\Blog\CommentsController@index',
        ]);

        Route::get('aproved', [
            'as' => 'aproved',
            'uses' => 'Admin\Blog\CommentsController@aproved',
        ]);

        Route::get('reproved', [
            'as' => 'reproved',
            'uses' => 'Admin\Blog\CommentsController@reproved',
        ]);

        Route::get('aprove/{id}', [
            'as' => 'aprove',
            'uses' => 'Admin\Blog\CommentsController@aprove',
        ]);

        Route::get('reprove/{id}', [
            'as' => 'reprove',
            'uses' => 'Admin\Blog\CommentsController@reprove',
        ]);
    });

    // --------------------------------------------------------------------------------------------
});
