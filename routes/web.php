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
})->name('/');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home/admin', 'HomeController@admin')->name('admin');

Route::get('/random', function(){
    //Code kamu
    $id = "TR";
    $tra = rand();
    $result = $id . $tra;
    return var_dump(strval($result));
});
