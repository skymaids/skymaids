<?php

Route::group(['middleware' => 'web', 'prefix' => 'menu', 'namespace' => 'Modules\Menu\Http\Controllers'], function()
{
    Route::get('/', 'MenuController@index')->name('menu');
});


Route::group(['middleware' => 'auth:api', 'prefix' => 'api', 'namespace' => 'Modules\Menu\Http\Controllers'], function()
{
    Route::group(['prefix' => 'menu'],function(){
        Route::resource('page', 'PageController', ['as' => 'menu']);
    });
});