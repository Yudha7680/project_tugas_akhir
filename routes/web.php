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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('userDetails', 'UserDetailController')->middleware('auth');

Route::resource('suppliers', 'SupplierController')->middleware('auth');

Route::resource('items', 'ItemController')->middleware('auth');

Route::resource('stockIns', 'StockInController')->middleware('auth');

Route::resource('stockOuts', 'StockOutController')->middleware('auth');

Route::resource('borrows', 'BorrowController')->middleware('auth');

Route::resource('roles', 'RoleController')->middleware('auth');

Route::get('report', 'ReportController@index')->middleware('auth');