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

Route::get('posts', 'PostController@getPosts');
Route::get('post', 'PostController@show');

Route::post('auth/login', 'AuthController@login');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('info', 'UserController@info');
});

Route::get('cache/clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');

    return 'ok';
});

Route::get('migrate', function () {
    Artisan::call('migrate');

    return 'ok';
});
