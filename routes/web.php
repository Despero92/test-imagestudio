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
Route::get('/admin/homepage/stage_create', ['uses' => 'Admin\HomePageController@stageCreate', 'as' => 'admin.stage.create']);
Route::post('/admin/homepage/stage_create', ['uses' => 'Admin\HomePageController@stageCreate', 'as' => 'admin.stage.create']);
Route::get('/admin/homepage/stage/{id}/edit', ['uses' => 'Admin\HomePageController@edit', 'as' => 'admin.stage.edit']);
Route::put('/admin/homepage/stage/{id}/update', ['uses' => 'Admin\HomePageController@update', 'as' => 'admin.stage.update']);
Route::delete('/admin/homepage/stage/{id}/destroy', ['uses' => 'Admin\HomePageController@destroy', 'as' => 'admin.stage.destroy']);
Route::post('/admin/homepage/delete', ['uses' => 'Admin\HomePageController@massDelete', 'as' => 'admin.stage.massDelete']);
