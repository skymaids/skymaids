<?php

Route::group(['middleware' => 'web', 'prefix' => 'schedule', 'namespace' => 'Modules\Schedule\Http\Controllers'], function()
{
	Route::get('/', 'ScheduleController@index');
});

Route::group(['middleware' => 'web', 'prefix' => 'schedule', 'namespace' => 'Modules\Schedule\Http\Controllers'], function()
{
    Route::get('teste', 'TesteController@index');
});