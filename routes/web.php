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

Route::get('edit/{id}', function () {
  // code...
  echo "string";
})->name('edit');

Route::get('/random', function(){
    //Code kamu
    $id = "TR";
    $tra = rand();
    $result = $id . $tra;
    return var_dump(strval($result));
});
