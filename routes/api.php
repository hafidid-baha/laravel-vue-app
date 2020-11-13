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
Route::middleware('auth:api')->post('/logout', "AuthController@logout");

Route::post('/login', "AuthController@login");

// add new interest route
Route::middleware('auth:api')->post('/addInterest', "BackController@addInterest");
Route::middleware('auth:api')->post('/addIdea', "BackController@addIdea");
Route::middleware('auth:api')->post('/addCategory', "BackController@addCategory");
Route::middleware('auth:api')->post('/updateCategory', "BackController@updateCategory");
Route::get('/getIdeas', "BackController@getIdeas");
Route::get('/getCategories', "BackController@getCategories");
Route::middleware('auth:api')->post('/deleteCategory', "BackController@deleteCategory");
Route::middleware('auth:api')->post('/deleteIdea', "BackController@deleteIdea");
Route::middleware('auth:api')->post('/updateIdea', "BackController@updateIdea");
Route::get('/getInterests', "BackController@getInterests"); 
Route::middleware('auth:api')->post('/updateInterest', "BackController@updateInterest");
Route::middleware('auth:api')->post('/updateUser', "BackController@updateUser");
Route::middleware('auth:api')->post('/updateUserSet', "BackController@updateUserSet");
Route::get('/getUserSettings', "BackController@getUserSettings");
Route::get('/getProjects', "BackController@getProjects");
Route::middleware('auth:api')->post('/addProject', "BackController@addProject");
Route::middleware('auth:api')->post('/updateProject', "BackController@updateProject");
Route::middleware('auth:api')->post('/deleteProject', "BackController@deleteProject");
Route::post('/sendMessage', "BackController@sendMessage");
Route::get('/getPreparedData', "BackController@getPreparedData");