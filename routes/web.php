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

Route::get('/', 'Main@index')->name('main');
Route::get('/catalog', 'Main@catalog')->name('catalog.view');

Auth::routes();


/* BACKEND ROUTES */
//Route::get('/backend', 'BackendController@index')->name('backend');

Route::prefix('backend')->middleware(['auth'])->namespace('Back')->group(function () {
    Route::get('/', 'BackendController@index')->name('backend');

    Route::resource('catalog', 'CatalogController', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);

    Route::get('gallery/{id}', 'GalleryController@index')->name('gallery.index');
    Route::get('gallery/{id}/add', 'GalleryController@add')->name('gallery.add');
    Route::post('gallery/{id}/store', 'GalleryController@store')->name('gallery.store');
    Route::delete('gallery/{id}/destroy', 'GalleryController@destroy')->name('gallery.destroy');

    Route::resource('slider', 'SliderController', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);
    Route::resource('settings', 'SettingsController', ['only' => ['index', 'edit', 'update']]);
});