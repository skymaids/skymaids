<?php

Route::group(['middleware' => 'web', 'prefix' => 'schedule', 'namespace' => 'Modules\Schedule\Http\Controllers'], function()
{
	Route::get('/', 'ScheduleController@index');
    Route::get('report/{date}', 'ReportController@index');
});

Route::group(['middleware' => 'web', 'prefix' => 'schedule', 'namespace' => 'Modules\Schedule\Http\Controllers'], function()
{
    Route::get('teste', 'TesteController@index');
});

Route::group(['middleware' => 'auth:api', 'prefix' => 'api', 'namespace' => 'Modules\Schedule\Http\Controllers'], function()
{
    Route::group(['prefix' => 'schedule'],function(){
        Route::post('load', 'ScheduleController@load', ['as' => 'schedule.load']);
        Route::post('sync', 'ScheduleController@sync', ['as' => 'schedule.sync']);
        Route::post('comment', 'ScheduleController@comment', ['as' => 'schedule.comment']);
        Route::post('status', 'ScheduleController@status', ['as' => 'schedule.status']);
        Route::post('checked', 'ScheduleController@checked', ['as' => 'schedule.checked']);
        Route::post('send', 'SendController@index', ['as' => 'schedule.send']);
    });
});

Route::get('confirm/{id}', ['middleware' => 'web', 'as' => 'schedule.confirm', 'uses' => 'Modules\Schedule\Http\Controllers\ScheduleController@showConfirmForm']);
Route::post('confirm', ['middleware' => 'web', 'as' => 'schedule.confirmed', 'uses' => 'Modules\Schedule\Http\Controllers\ScheduleController@confirm']);
Route::get('thanks', ['middleware' => 'web', 'as' => 'schedule.thanks', 'uses' => 'Modules\Schedule\Http\Controllers\ScheduleController@thanks']);