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

Route::apiResource('/products', 'Api\ProductController');

Route::apiResource('/user', 'Api\UserController');

Route::apiResource('/reply', 'Api\ReplyController');

Route::apiResource('/bill', 'Api\BillController');

Route::apiResource('/codeDiscount', 'Api\CodeController');

Route::post('/login', 'Api\UserController@login')->middleware("api");

Route::get('/search/{keyword}', 'Api\ProductController@search')->middleware("api");

Route::get('/login-fb/{email}', 'Api\UserController@matchesEmail')->middleware("api");

Route::get('/follow-bill/{email}', 'Api\BillController@getBills')->middleware("api");

Route::apiResource('category','Api\CategoryController');