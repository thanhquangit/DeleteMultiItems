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

Route::get('/', function () {
    return view('welcome');
});
Route::get('listProduct','ProductController@getListProduct');
Route::get('importExport', 'ExcelController@importExport');
Route::get('downloadExcel/{type}', 'ExcelController@downloadExcel');
Route::post('importExcel', 'ExcelController@importExcel');
Route::post('del','ProductController@postDel');
Route::get('DeleteAll','ProductController@getDeleteAll');