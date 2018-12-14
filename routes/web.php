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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('/');

Route::get('/home/admin', 'HomeController@admin')->name('admin')->middleware('auth');

Route::get('produk/{id}', 'HomeController@produk')->name('beli');

Route::post('insert', 'HomeController@insert')->name('insert');

Route::post('update', 'HomeController@update')->name('update');

Route::get('hapus/{id}', 'HomeController@hapus')->name('hapus');

Route::post('/hapus/transaksi', 'HomeController@hapusTr')->name('htr');

Route::post('/produk/bayar', 'HomeController@bayar')->name('bayar');

Route::post('bayar', 'HomeController@insertTr')->name('insertTr');

Route::get('/random', function(){
    //Code kamu
    return var_dump(Auth::user()->status);
});
