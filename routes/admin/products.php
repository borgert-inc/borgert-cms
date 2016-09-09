<?php

// Products
Route::group(['prefix' => 'products', 'as' => 'products.'], function () {

    // --------------------------------------------------------------------------------------------

    // Category
    Route::group(['prefix' => 'categorys', 'as' => 'categorys.'], function () {
        Route::get('list', [
            'as' => 'list',
            'uses' => 'Admin\Products\CategorysController@index',
        ]);

        Route::get('create', [
            'as' => 'create',
            'uses' => 'Admin\Products\CategorysController@create',
        ]);

        Route::get('edit/{id}', [
            'as' => 'edit',
            'uses' => 'Admin\Products\CategorysController@edit',
        ])->where('id', '[0-9]+');

        Route::post('store', [
            'as' => 'store',
            'uses' => 'Admin\Products\CategorysController@store',
        ]);

        Route::post('update/{id}', [
            'as' => 'update',
            'uses' => 'Admin\Products\CategorysController@update',
        ])->where('id', '[0-9]+');

        Route::post('destroy', [
            'as' => 'destroy',
            'uses' => 'Admin\Products\CategorysController@destroy',
        ]);
    });


    // --------------------------------------------------------------------------------------------


    // Contents
    Route::group(['prefix' => 'contents', 'as' => 'contents.'], function () {
        Route::get('list', [
            'as' => 'list',
            'uses' => 'Admin\Products\ContentsController@index',
        ]);

        Route::get('create', [
            'as' => 'create',
            'uses' => 'Admin\Products\ContentsController@create',
        ]);

        Route::get('edit/{id}', [
            'as' => 'edit',
            'uses' => 'Admin\Products\ContentsController@edit',
        ])->where('id', '[0-9]+');

        Route::post('store', [
            'as' => 'store',
            'uses' => 'Admin\Products\ContentsController@store',
        ]);

        Route::post('update/{id}', [
            'as' => 'update',
            'uses' => 'Admin\Products\ContentsController@update',
        ])->where('id', '[0-9]+');

        Route::post('destroy', [
            'as' => 'destroy',
            'uses' => 'Admin\Products\ContentsController@destroy',
        ]);

        Route::any('upload/{id?}', [
            'as' => 'upload',
            'uses' => 'Admin\Products\ContentsController@upload',
        ]);
    });

    // --------------------------------------------------------------------------------------------
});
