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
