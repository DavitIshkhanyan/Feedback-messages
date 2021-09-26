<?php

use Illuminate\Support\Facades\Route;

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
    return view('feedback');
})->name('feedback');

Auth::routes();

Route::post('/', 'MessageController@sendMessage')->name('send.message');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/messages', 'MessageController@index')->name('messages')->middleware('admin');
Route::get('/messages/{id}', 'MessageController@view')->name('message.view')->middleware('admin');
Route::delete('/messages/{id}', 'MessageController@delete')->name('message.destroy')->middleware('admin');

