<?php

use Illuminate\Http\Request;

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

Route::get('/section/{class_code}', 'ApiController@getSection');

Route::get('/studlist/{class_code}', 'ApiController@sectionList');

Route::get('/sem/studlist/{sem_code}', 'ApiController@semesterList');
