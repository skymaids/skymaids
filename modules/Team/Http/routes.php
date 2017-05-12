<?php

Route::group(['middleware' => 'web', 'prefix' => 'team', 'namespace' => 'Modules\Team\Http\Controllers'], function()
{
	Route::get('/', 'TeamController@index');
    Route::get('report/{id}/{date}', 'ReportController@index');
});

Route::group(['middleware' => 'auth:api', 'prefix' => 'api', 'namespace' => 'Modules\Team\Http\Controllers'], function()
{
    Route::group(['prefix' => 'team'],function(){

        Route::post('sync', 'SyncController@index', ['as' => 'team.sync']);
        //Route::any('report', 'ReportController@index', ['as' => 'team']);
        Route::post('composition/members', 'CompositionController@members', ['as' => 'team.composition.members']);
        Route::post('composition/store', 'CompositionController@store', ['as' => 'team.composition.store']);
        Route::post('composition/destroy', 'CompositionController@destroy', ['as' => 'team.composition.destroy']);
        Route::post('send', 'SendController@index', ['as' => 'team.send']);
    });
});