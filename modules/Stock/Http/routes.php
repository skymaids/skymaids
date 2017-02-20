<?php

Route::group(['middleware' => 'web', 'prefix' => 'stock', 'namespace' => 'Modules\Stock\Http\Controllers'], function()
{
    Route::group(['prefix' => 'categories'],function(){
        Route::get('/', 'CategoryController@search')->name('stock.category');
        Route::post('getData', 'CategoryController@getData')->name('stock.category.getData');
    });

    Route::group(['prefix' => 'products'],function(){
        Route::get('/', 'ProductController@search')->name('stock.product');
        Route::post('getData', 'ProductController@getData')->name('stock.product.getData');
    });

    Route::group(['prefix' => 'softwares'],function(){
        Route::get('/', 'SoftwareController@search')->name('stock.software');
        Route::post('getData', 'SoftwareController@getData')->name('stock.software.getData');
    });

    Route::group(['prefix' => 'software_licenses'],function(){
        Route::get('/', 'SoftwareLicenseController@search')->name('stock.software_licenses');
        Route::post('getData', 'SoftwareLicenseController@getData')->name('stock.software_licenses.getData');
    });
});


Route::group(['middleware' => 'auth:api', 'prefix' => 'api', 'namespace' => 'Modules\Stock\Http\Controllers'], function()
{
    Route::group(['prefix' => 'stock'],function(){
        Route::resource('categories', 'CategoryController', ['as' => 'stock']);
        Route::resource('products', 'ProductController', ['as' => 'stock']);
        Route::resource('softwares', 'SoftwareController', ['as' => 'stock']);
        Route::resource('software_licenses', 'SoftwareLicenseController', ['as' => 'stock']);
    });
});

