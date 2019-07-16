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
    return view('index');
});

Route::get('/style', function () {
    return view('style');
});

Route::get('/fashion', function () {
    return view('fashion');
});

Route::get('/travel', function () {
    return view('travel');
});

Route::get('/sports', function () {
    return view('sports');
});

Route::get('/video', function () {
    return view('video');
});

Route::get('/archives', function () {
    return view('archives');
});

Route::get('/single', function () {
    return view('single');
});

Auth::routes();

Route::get('/admin', function () {
    return view('backend.index');
});

Route::group(
    ['prefix' => 'admin', 'middleware' => ['auth']],
    function () {
        Route::get('/admin', function () {
            return view('backend.index');
        });
        Route::resource('artikel', 'ArtikelController');
        Route::resource('kategori', 'KategoriController');
        Route::resource('tag', 'TagController');
    }
);



Auth::routes();

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
