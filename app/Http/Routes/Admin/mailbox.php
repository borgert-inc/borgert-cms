<?php

// Mailbox
Route::group(['prefix' => 'mailbox', 'as' => 'mailbox.'], function () {
    Route::get('inbox', [
        'as' => 'inbox',
        'uses' => 'Admin\Mailbox\InboxController@index',
    ]);

    Route::get('trash', [
        'as' => 'trash',
        'uses' => 'Admin\Mailbox\TrashController@index',
    ]);

    Route::post('trash/{id}', [
        'as' => 'trash_in',
        'uses' => 'Admin\Mailbox\TrashController@trash',
    ])->where('id', '[0-9]+');

    Route::get('archive', [
        'as' => 'archive',
        'uses' => 'Admin\Mailbox\ArchiveController@index',
    ]);

    Route::post('archive/{id}', [
        'as' => 'archive_in',
        'uses' => 'Admin\Mailbox\ArchiveController@archive',
    ])->where('id', '[0-9]+');

    Route::get('message/{id}', [
        'as' => 'message',
        'uses' => 'Admin\Mailbox\MessageController@index',
    ])->where('id', '[0-9]+');

    Route::post('delete', [
        'as' => 'delete',
        'uses' => 'Admin\Mailbox\DeleteController@destroy',
    ]);
});
