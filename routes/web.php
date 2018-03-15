<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group([
    'prefix' => '/costs/',
    'namespace' => 'Admin\Costs'
    ], function(){
    Route::resource('categories', 'CategoryController');
});

Route::resource('/users', 'UsersController');