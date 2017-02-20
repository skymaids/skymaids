<?php
/**
 * Login e logout
 */
Route::get('login', ['middleware' => 'web', 'as' => 'auth.login', 'uses' => 'Modules\Auth\Http\Controllers\LoginController@showLoginForm']);
Route::post('login', ['middleware' => 'web', 'as' => 'auth.login', 'uses' => 'Modules\Auth\Http\Controllers\LoginController@login']);
Route::get('logout', ['middleware' => 'web', 'as' => 'auth.logout', 'uses' => 'Modules\Auth\Http\Controllers\LoginController@logout']);

/**
 * Rotas de registro
 */
Route::get('register', ['middleware' => 'web', 'as' => 'auth.register', 'uses' => 'Modules\Auth\Http\Controllers\RegisterController@showRegistrationForm']);
Route::post('register', ['middleware' => 'web', 'as' => 'auth.register', 'uses' => 'Modules\Auth\Http\Controllers\RegisterController@register']);

/**
 * Rotas para resetar senha
 */
Route::get('password/reset/{token?}', ['middleware' => 'web', 'as' => 'auth.password.reset', 'uses' => 'Modules\Auth\Http\Controllers\ResetPasswordController@showResetForm']);
Route::post('password/email', ['middleware' => 'web', 'as' => 'auth.password.email', 'uses' => 'Modules\Auth\Http\Controllers\ForgotPasswordController@sendResetLinkEmail']);
Route::get('password/forgot', ['middleware' => 'web', 'as' => 'auth.password.forgot', 'uses' => 'Modules\Auth\Http\Controllers\ForgotPasswordController@showLinkRequestForm']);
Route::post('password/reset', ['middleware' => 'web', 'as' => 'auth.password.reset', 'uses' => 'Modules\Auth\Http\Controllers\ResetPasswordController@reset']);

/**
 * Rota para tela principal
 */
Route::get('/', ['middleware' => 'web', 'as' => 'home', 'uses' => 'Modules\Dashboard\Http\Controllers\DashboardController@index']);

/**
 * Rota para tela de bloqueio
 */
Route::get('lock', ['middleware' => 'web', 'as' => 'auth.lock', 'uses' => 'Modules\Auth\Http\Controllers\LockController@showLockForm']);
Route::post('lock', ['middleware' => 'web', 'as' => 'auth.lock', 'uses' => 'Modules\Auth\Http\Controllers\LockController@lock']);