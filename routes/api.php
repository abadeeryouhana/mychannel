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
Route::get('categories','CategoryController@indexApi');
Route::post('checkpass','CategoryController@checkpassApi');

Route::get('checkpassword','PasswordController@checkpassword');
Route::get('channel/{id}','ChannelController@channelApi');

Route::get('links','LinkController@linkApi');
Route::get('infos','InfoController@infoApi');
Route::get('ads','AdController@adApi');

Route::get('msg','MessageController@msgApi');
Route::get('hour','ExpirationController@gethours');

Route::get('subcat1/{id}','SubCategory1Controller@get_sub1_api');
Route::get('subcat2/{id}','SubCategory2Controller@get_sub2_api');
Route::get('channel_new/{id}','ChannelController@channelApi2');

Route::get('channel_test/{id}','ChannelController@channelApi_test');
