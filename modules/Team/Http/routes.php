<?php

Route::group(['middleware' => 'web', 'prefix' => 'team', 'namespace' => 'Modules\Team\Http\Controllers'], function()
{
	Route::get('/', 'TeamController@index');
});