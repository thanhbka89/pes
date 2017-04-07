<?php

Route::get('/', function () {
    //set config
    //config(['app.timezone' => 'America/Chicago']);
    //echo config('app.timezone'); //get config

    return view('welcome');
});

Route::get('foo', function () {
    $route = Route::current();var_dump($route);
    $name = Route::currentRouteName();var_dump($action);
    $action = Route::currentRouteAction();
    var_dump($action);
    return 'Hello World';
});

Route::get('dd', 'WelcomeController@ddFunction');
Route::get('log', 'WelcomeController@index');

//any Verb: get|post|delete|put|patch|options
Route::any('bar', function () {
    return "bar";
});

//required param
Route::get('user/{id}', function ($id) {
    return 'User '.$id;
})->where('id', '[0-9]+');

//option param
Route::get('name/{name?}', function ($name = null) {
    return 'Name ' . $name;
});

//name routes
Route::get('test/profile', function () {
    return 'profile';
})->name('profile');

Route::get('redirect', function() {
  return redirect()->route('profile'); //use name route
});

//group route : /admin/users
Route::group(['prefix' => 'administrator'], function () {
    Route::get('users', function ()    {
        return 'Admin';
    });
});

/**
 * Administrator
 */
 Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
     Route::resource('customers', 'CustomersController');
     Route::resource('brands', 'BrandsController');
     Route::resource('product-categories', 'ProductCategoriesController');
     Route::resource('products', 'ProductsController');
     Route::resource('users', 'UsersController');

     Route::get('orders', [
         'uses' => 'OrdersController@index',
         'as' => 'orders.index',
     ]);
 });
