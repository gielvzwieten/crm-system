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

Route::resource('customers', 'CustomersController');//->middleware('can:update,customer');

Route::patch('/tasks/{task}', 'CustomerTasksController@update');
Route::delete('/tasks/{task}', 'CustomerTasksController@destroy');
Route::post('/customers/{customer}/tasks', 'CustomerTasksController@store');
//Route::get('/customers', 'CustomersController@index');
//Route::get('/customers/create', 'CustomersController@create');
//Route::get('/customers/{customer}', 'CustomersController@show');
//Route::post('/customers', 'CustomersController@store');
//Route::get('customers/{customer}/edit', 'CustomersController@edit');
//Route::patch('customers/{customer}', 'CustomersController@update');
//Route::delete('customers/{customer}', 'CustomersController@destroy');
