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
Auth::routes(['register' => false]);

Route::get('/', 'HomeController@index');

Route::get('/register/{type?}', 'HomeController@index')->name('register_edit');;

Route::post('/register/{type}', 'HomeController@register');

Route::get('/products/{type?}', 'ProductController@index')->name('products');

Route::post('/products/create', 'ProductController@create');

Route::put('/products/{id}', 'ProductController@update');

Route::get('/reports', 'ReportController@index')->name('reports');

Route::get('/reports/{type}/{year}/{month}/confirm', 'ReportController@confirm');

Route::get('/reports/{type}/{year}/{month}/export', 'ReportController@export');
