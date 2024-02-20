<?php

use Illuminate\Http\Request;
//use App\Http\Controllers\Api;
use App\Http\Controllers\feedbackController;

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

Route::get('/displayfeedback', 'feedbackController@showfeedback');
Route::get('deletefeedback/{id}','feedbackController@deletefeedback')->name('deletefeedback/{id}');
Route::get('updatefeedback/{id}','feedbackController@updatefeedback')->name('updatefeedback/{id}');
