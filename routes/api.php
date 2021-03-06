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

// Authentication routes
Route::post('/signin', 'AuthenticationController@loginAuth');

// Account routes
Route::post('/fetchAccount', 'AccountsController@fetchAccount');
Route::post('/addAccount', 'AccountsController@addAccount');
Route::post('/updateAccount', 'AccountsController@updateAccount');
Route::post('/deleteAccount', 'AccountsController@deleteAccount');
Route::post('/reactivateAccount', 'AccountsController@reactivateAccount');

