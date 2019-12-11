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
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function ($route){
    $route->resources(
        [
            '/products' => 'ProductsController'
        ]);
});

Route::group(['middleware' => ['auth', 'admin'] ], function ($router){
    $router->get('admin-test', function (){
       return 123;
    });
});
