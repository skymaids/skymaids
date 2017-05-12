<?php
//Route::get('api/users', function () {
//    return Datatables::eloquent(Modules\User\Entities\User::query())->make(true);
//});

Route::group(['middleware' => 'auth:api', 'prefix' => 'api', 'namespace' => 'Modules\User\Http\Controllers'], function()
{
    Route::group(['prefix' => 'user'],function(){
        Route::get('members', 'UserController@members', ['as' => 'user']);
    });
});