<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('biodata', 'SiswaController');
Route::resource('sekolah', 'SekolahController');


Route::group(['middleware' => 'cors'], function () {
    //isi route disini
});
Route::resource('siswa', 'SiswaController');
Route::resource('tag', 'Api\TagController');
Route::resource('kategori', 'Api\KategoriController');
Route::resource('artikel', 'Api\ArtikelController');
