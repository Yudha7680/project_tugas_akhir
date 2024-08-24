<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('user_details', 'UserDetailAPIController');

Route::resource('suppliers', 'SupplierAPIController');

Route::resource('items', 'ItemAPIController');

Route::resource('stock_ins', 'StockInAPIController');

Route::resource('stock_outs', 'StockOutAPIController');

Route::resource('borrows', 'BorrowAPIController');

Route::resource('roles', 'RoleAPIController');