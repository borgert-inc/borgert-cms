<?php

// Settings
Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {

    // --------------------------------------------------------------------------------------------

    Route::get('', [
        'as' => 'profile',
        'uses' => 'Admin\Profile\ProfileController@index',
    ]);

    Route::post('update', [
        'as' => 'update',
        'uses' => 'Admin\Profile\ProfileController@password',
    ]);

    // --------------------------------------------------------------------------------------------
});
