<?php

// Gallery
Route::group(['prefix' => 'gallerys', 'as' => 'gallerys.'], function () {

// --------------------------------------------------------------------------------------------
    Route::get('list', [
        'as' => 'list',
        'uses' => 'Admin\Gallerys\GallerysController@index',
    ]);

    Route::get('create', [
        'as' => 'create',
        'uses' => 'Admin\Gallerys\GallerysController@create',
    ]);

    Route::get('edit/{id}', [
        'as' => 'edit',
        'uses' => 'Admin\Gallerys\GallerysController@edit',
    ])->where('id', '[0-9]+');

    Route::post('store', [
        'as' => 'store',
        'uses' => 'Admin\Gallerys\GallerysController@store',
    ]);

    Route::post('update/{id}', [
        'as' => 'update',
        'uses' => 'Admin\Gallerys\GallerysController@update',
    ])->where('id', '[0-9]+');

    Route::post('destroy', [
        'as' => 'destroy',
        'uses' => 'Admin\Gallerys\GallerysController@destroy',
    ]);

    Route::any('upload/{id?}', [
        'as' => 'upload',
        'uses' => 'Admin\Gallerys\GallerysController@upload',
    ]);

    // --------------------------------------------------------------------------------------------
});
