<?php

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

Route::get('/admin', function () {
    if(Auth::check())
	{
    return redirect('/dashboard');
	}		
	else
	{	
    return view('auth.login');
	}
});

Route::get('/', 'FrontController@index');

Route::get('/item_detail/{id}', 'FrontController@show');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('/product/search', 'ProductController@search');

Route::get('/product/add', 'ProductController@create');

Route::post('/product/store', 'ProductController@store');

Route::get('/product/edit/{id}', 'ProductController@edit');

Route::post('/product/update', 'ProductController@update');

Route::get('/product/delete/{id}', 'ProductController@destroy');
