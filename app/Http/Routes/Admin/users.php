<?php

// Mailbox
Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
    Route::get('list', [
        'as' => 'list',
        'uses' => 'Admin\Users\UsersController@index',
    ]);

    Route::get('create', [
        'as' => 'create',
        'uses' => 'Admin\Users\UsersController@create',
    ]);

    Route::get('edit/{id}', [
        'as' => 'edit',
        'uses' => 'Admin\Users\UsersController@edit',
    ])->where('id', '[0-9]+');

    Route::post('store', [
        'as' => 'store',
        'uses' => 'Admin\Users\UsersController@store',
    ]);

    Route::post('update/{id}', [
        'as' => 'update',
        'uses' => 'Admin\Users\UsersController@update',
    ])->where('id', '[0-9]+');

    Route::post('destroy', [
        'as' => 'destroy',
        'uses' => 'Admin\Users\UsersController@destroy',
    ]);
});
