<?php

Route::group(['middleware' => 'web', 'prefix' => 'team', 'namespace' => 'Modules\Team\Http\Controllers'], function()
{
	Route::get('/', 'TeamController@index');
});

Route::group(['middleware' => 'auth:api', 'prefix' => 'api', 'namespace' => 'Modules\Stock\Http\Controllers'], function()
{
    Route::group(['prefix' => 'team'],function(){
        Route::get('sync', 'TeamController@sync', ['as' => 'team']);
    });
});