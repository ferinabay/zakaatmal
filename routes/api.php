<?php

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Route;


// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
//api user create
Route::post('register','Api\RegisterController@action');
Route::post('login','Api\LoginController@action');
Route::get('me','Api\UserController@me')->middleware('auth:api');
//api zakatmal
Route::post('zakatmal','Api\ZakatmalController@store')->middleware('auth:api');
