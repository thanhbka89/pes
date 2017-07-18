<?php

Route::get('/', function () {
    //set config
    //config(['app.timezone' => 'America/Chicago']);
    //echo config('app.timezone'); //get config
    
    Debugbar::info('info - thanhnm');
    Debugbar::error('Test Debugbar error message');
    Debugbar::warning('Test Debugbar warning message');
    Debugbar::addMessage('Another message', 'mylabel');
    
    //Do thoi gian thuc thi lenh
    Debugbar::addMeasure('Thoi gian thuc thi:', LARAVEL_START, microtime(true));

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
Route::group(
  [
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect' ]
  ], function()
{
   Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'namespace' => 'Admin'], function () {

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

   Route::group(['prefix' => 'admin', 'namespace' => 'Auth'],function(){
       // Authentication Routes...
       Route::get('login', 'LoginController@showLoginForm')->name('login');
       Route::post('login', 'LoginController@login');
       Route::post('logout', 'LoginController@logout')->name('logout');

       // Password Reset Routes...
       Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.reset');
       Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
       Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset.token');
       Route::post('password/reset', 'ResetPasswordController@reset');
   });
});

Route::get('/home', 'HomeController@index');
