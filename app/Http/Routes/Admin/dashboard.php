<?php

// Dashboard
Route::get('/dashboard', ['as' => 'index', 'uses' => 'Admin\DashboardController@index']);


