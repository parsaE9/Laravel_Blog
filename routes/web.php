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

    Route::resource('user_blogs', 'User\BlogController')
        ->middleware('privilege:1');

    Route::resource('admin_blogs', 'Admin\BlogController')
        ->except(['create', 'store'])
        ->middleware('privilege:2');

    Route::resource('users', 'Admin\UserController')
        ->except(['show'])
        ->middleware('privilege:2');

    Route::resource('admins', 'Admin\AdminController')
        ->except(['show'])
        ->middleware('privilege:2');
});