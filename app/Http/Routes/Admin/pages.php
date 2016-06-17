<?php

// Pages
Route::group(['prefix' => 'pages', 'as' => 'pages.'], function () {

    // --------------------------------------------------------------------------------------------

    // Category
    Route::group(['prefix' => 'categorys', 'as' => 'categorys.'], function () {
        Route::get('list', [
            'as' => 'list',
            'uses' => 'Admin\Pages\CategorysController@index',
        ]);

        Route::get('create', [
            'as' => 'create',
            'uses' => 'Admin\Pages\CategorysController@create',
        ]);

        Route::get('edit/{id}', [
            'as' => 'edit',
            'uses' => 'Admin\Pages\CategorysController@edit',
        ])->where('id', '[0-9]+');

        Route::post('store', [
            'as' => 'store',
            'uses' => 'Admin\Pages\CategorysController@store',
        ]);

        Route::post('update/{id}', [
            'as' => 'update',
            'uses' => 'Admin\Pages\CategorysController@update',
        ])->where('id', '[0-9]+');

        Route::post('destroy', [
            'as' => 'destroy',
            'uses' => 'Admin\Pages\CategorysController@destroy',
        ]);
    });

    // --------------------------------------------------------------------------------------------

    // Contents
    Route::group(['prefix' => 'contents', 'as' => 'contents.'], function () {
        Route::get('list', [
            'as' => 'list',
            'uses' => 'Admin\Pages\ContentsController@index',
        ]);

        Route::get('create', [
            'as' => 'create',
            'uses' => 'Admin\Pages\ContentsController@create',
        ]);

        Route::get('edit/{id}', [
            'as' => 'edit',
            'uses' => 'Admin\Pages\ContentsController@edit',
        ])->where('id', '[0-9]+');

        Route::post('store', [
            'as' => 'store',
            'uses' => 'Admin\Pages\ContentsController@store',
        ]);

        Route::post('update/{id}', [
            'as' => 'update',
            'uses' => 'Admin\Pages\ContentsController@update',
        ])->where('id', '[0-9]+');

        Route::post('destroy', [
            'as' => 'destroy',
            'uses' => 'Admin\Pages\ContentsController@destroy',
        ]);
    });

    // --------------------------------------------------------------------------------------------
});
