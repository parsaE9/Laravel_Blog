<?php

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

Route::view('/', 'welcome')->name('welcome');

Auth::routes(['register' => false]);


Route::middleware('auth')->group(function () {

    Route::get('/admin', 'AdminController@index')->name('admin_panel')->middleware('privilege:2');

    Route::resource('blogs', 'BlogController')->middleware('privilege:1');
});