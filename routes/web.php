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
    //set config
    //config(['app.timezone' => 'America/Chicago']);
    //echo config('app.timezone'); //get config

    return view('welcome');
});

Route::get('foo', function () {
    return 'Hello World';
});
