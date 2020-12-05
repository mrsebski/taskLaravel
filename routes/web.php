<?php

//use App\Http\Controllers\BoxController;
use Illuminate\Support\Facades\Auth;
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

// Route::post('add_box', [App\Http\Controllers\BoxController::class, 'add_box'])->name('add_box');



Route::resource('box', BoxController::class);

Route::post('/box/check', 'BoxController@check')->name('box.check');



Route::get('/', 'IndexController@index')->name('index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

