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

Route::group(['prefix' => 'admin/homepage/stage'], function (){
    Route::match(['get', 'post'], 'stage_create', ['uses' => 'Admin\StagesController@create', 'as' => 'admin.stage.create']);
    Route::get('{id}/edit', ['uses' => 'Admin\StagesController@edit', 'as' => 'admin.stage.edit']);
    Route::put('{id}/update', ['uses' => 'Admin\StagesController@update', 'as' => 'admin.stage.update']);
    Route::delete('{id}/destroy', ['uses' => 'Admin\StagesController@destroy', 'as' => 'admin.stage.destroy']);
    Route::post('delete', ['uses' => 'Admin\StagesController@massDelete', 'as' => 'admin.stage.massDelete']);
});

Route::group(['prefix' => 'admin/homepage/startup'], function (){
    Route::match(['get', 'post'], 'startup_create', ['uses' => 'Admin\StartUpController@create', 'as' => 'admin.startup.create']);
    Route::get('{id}/edit', ['uses' => 'Admin\StartUpController@edit', 'as' => 'admin.startup.edit']);
    Route::put('{id}/update', ['uses' => 'Admin\StartUpController@update', 'as' => 'admin.startup.update']);
    Route::delete('{id}/destroy', ['uses' => 'Admin\StartUpController@destroy', 'as' => 'admin.startup.destroy']);
});

Route::group(['prefix' => 'admin/packages'], function (){
    Route::get('', ['uses' => 'Admin\PackagesController@index', 'as' => 'admin.packages.index']);
    Route::match(['get', 'post'], 'package_create', ['uses' => 'Admin\PackagesController@createPackage', 'as' => 'admin.package.create']);
    Route::get('{id}/edit', ['uses' => 'Admin\PackagesController@editPackage', 'as' => 'admin.package.edit']);
    Route::put('{id}/update', ['uses' => 'Admin\PackagesController@updatePackage', 'as' => 'admin.package.update']);
    Route::delete('{id}/destroy', ['uses' => 'Admin\PackagesController@destroyPackage', 'as' => 'admin.package.destroy']);
});

Route::group(['prefix' => 'admin/packages/description'], function (){
    Route::get('', ['uses' => 'Admin\PackagesController@index', 'as' => 'admin.packages.index']);
    Route::match(['get', 'post'], 'description_create', ['uses' => 'Admin\PackagesController@createDescription', 'as' => 'admin.package.description.create']);
    Route::get('{id}/edit', ['uses' => 'Admin\PackagesController@editDescription', 'as' => 'admin.package.description.edit']);
    Route::put('{id}/update', ['uses' => 'Admin\PackagesController@updateDescription', 'as' => 'admin.package.description.update']);
    Route::delete('{id}/destroy', ['uses' => 'Admin\PackagesController@destroyDescription', 'as' => 'admin.package.description.destroy']);
});

Route::post('/buy_package', ['uses' => 'FrontEnd\IndexController@buyPackageAction', 'as' => 'buy_package']);