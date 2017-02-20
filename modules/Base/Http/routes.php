<?php

Route::group(['middleware' => 'web', 'prefix' => 'base', 'namespace' => 'Modules\Base\Http\Controllers'], function()
{
    Route::get('viewer', 'PdfViewerController@index')->name('base.viewer');
});


Route::group(['middleware' => 'auth:api', 'prefix' => 'api', 'namespace' => 'Modules\Base\Http\Controllers'], function()
{
    Route::group(['prefix' => 'base'],function(){
        Route::resource('profile', 'ProfileController', ['as' => 'base']);
    });
});