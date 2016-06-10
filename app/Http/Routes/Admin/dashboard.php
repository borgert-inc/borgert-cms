<?php

// Dashboard
Route::get('/', ['as' => 'index', 'uses' => 'Admin\DashboardController@index']);
