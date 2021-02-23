<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// });
// Route::get('/user/{email}', 'LoginController@user');
Route::middleware('auth:sanctum')->get('/user/{email}', 'LoginController@user');

Route::post('/login', 'LoginController@login');
Route::post('/register', 'RegisterController@register');
Route::post('/logout', 'LoginController@logout');
Route::post('/remove_password/{email}', 'LoginController@remove_password');


//產品清單
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/products', 'ProductController@index');
    Route::post('/products', 'ProductController@store');
    Route::get('/products/{id}', 'ProductController@show');
    Route::patch('/products/{id}', 'ProductController@update');
    Route::delete('/products/{id}', 'ProductController@destroy');
    Route::post('/search', 'ProductController@search');
});
