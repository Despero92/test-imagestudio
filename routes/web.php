<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', ['uses' => 'FrontEnd\IndexController@index', 'as' => 'index']);

Route::post('/admin/homepage/launch_update', ['uses' => 'Admin\HomePageController@updateLaunchContent', 'as' => 'update.launch']);
Route::post('/admin/homepage/inst_update', ['uses' => 'Admin\HomePageController@updateInstagramContent', 'as' => 'update.inst']);
Route::get('/admin/homepage/stage_create', ['uses' => 'Admin\StagesController@create', 'as' => 'admin.stage.create']);
Route::post('/admin/homepage/stage_create', ['uses' => 'Admin\StagesController@create', 'as' => 'admin.stage.create']);
Route::get('/admin/homepage/stage/{id}/edit', ['uses' => 'Admin\StagesController@edit', 'as' => 'admin.stage.edit']);
Route::put('/admin/homepage/stage/{id}/update', ['uses' => 'Admin\StagesController@update', 'as' => 'admin.stage.update']);
Route::delete('/admin/homepage/stage/{id}/destroy', ['uses' => 'Admin\StagesController@destroy', 'as' => 'admin.stage.destroy']);
Route::post('/admin/homepage/delete', ['uses' => 'Admin\StagesController@massDelete', 'as' => 'admin.stage.massDelete']);
Route::get('/admin/homepage/startup_create', ['uses' => 'Admin\StartUpController@create', 'as' => 'admin.startup.create']);
Route::post('/admin/homepage/startup_create', ['uses' => 'Admin\StartUpController@create', 'as' => 'admin.startup.create']);
Route::get('/admin/homepage/startup/{id}/edit', ['uses' => 'Admin\StartUpController@edit', 'as' => 'admin.startup.edit']);
Route::put('/admin/homepage/startup/{id}/update', ['uses' => 'Admin\StartUpController@update', 'as' => 'admin.startup.update']);
Route::delete('/admin/homepage/startup/{id}/destroy', ['uses' => 'Admin\StartUpController@destroy', 'as' => 'admin.startup.destroy']);