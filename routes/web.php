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

Route::get('/order/{type?}', 'HomeController@index')->name('orders');

Route::post('/order', 'HomeController@order')->name('order_create');

Route::get('/products', 'ProductController@index')->middleware('can:isAdmin')->name('products');

Route::post('/products/create', 'ProductController@create')->middleware('can:isAdmin')->name('product_create');

Route::post('/products/update', 'ProductController@update')->middleware('can:isAdmin')->name('product_update');

Route::get('/reports', 'ReportController@index')->middleware('can:isAdmin')->name('reports');

Route::post('/reports/confirm', 'ReportController@confirm')->middleware('can:isAdmin')->name('report_confirm');

Route::post('/reports/export', 'ReportController@export')->middleware('can:isAdmin')->name('report_export');
