<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group([
    'namespace' => 'Admin\Costs',
    'prefix' => '/costs/',
    'middleware' => 'auth'
    ], function(){
    Route::resource('categories', 'CategoryController');
});

Route::group([
   'namespace' => 'Admin\Bill',
   'prefix' => '/bill/',
   'middleware' => 'auth'
], function (){
    Route::resource('receive', 'ReceiveController');
    Route::resource('pay', 'PayController');
});

Route::resource('/users', 'UsersController');