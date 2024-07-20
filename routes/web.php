<?php

use App\Service;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();
Route::get('/', 'Auth\LoginController@showLoginForm');

Route::get('dashboard', 'HomeController@index')->name('showUsers')->middleware('auth');

//->middleware('auth');
////////////////////////////////


//////////////////// Users Route ////////////////////

Route::resource ('dashboard/user','UserController')->middleware('auth');
Route::post ('dashboard/user/delete/{id}','UserController@destroy')->name('deleteUser');

//////////////////// Categories Route ////////////////////
Route::resource('dashboard/category','CategoryController')->middleware('auth');
//Route::get('dashboard/categories','CategoryController@index')->name('showCategories');
//Route::get('dashboard/addCategory','CategoryController@create')->name('addCategory');
//Route::post('dashboard/addCategory','CategoryController@store')->name('addCategory');
Route::post ('dashboard/category/delete/{id}','CategoryController@destroy')->name('deleteCategory');

///////////////////// Channels Route ///////
Route::resource('dashboard/channel','ChannelController')->middleware('auth');
Route::post ('dashboard/channel/delete/{id}','ChannelController@destroy')->name('deleteChannel');

///////////////////// Infos Route ///////
Route::resource('dashboard/info','InfoController')->middleware('auth');
Route::post ('dashboard/info/delete/{id}','ChannelController@destroy')->name('deleteInfo');

///////////////////// Links Route ///////
Route::resource('dashboard/link','LinkController')->middleware('auth');
Route::post ('dashboard/link/delete/{id}','LinkController@destroy')->name('deleteLink');

///////////////////// ADS Route ///////
Route::resource('dashboard/ad','AdController')->middleware('auth');
Route::post ('dashboard/ad/delete/{id}','AdController@destroy')->name('deleteAd');


///////////// Notification Code ///////////////////
Route::get('fcm', 'HomeController@fcmIndex')->name('fcm.index')->middleware('auth');
Route::post('fcm', 'HomeController@fcm')->name('fcm.push');

///////////////////// Message Route ///////
Route::resource('dashboard/message','MessageController')->middleware('auth');
//Route::post ('dashboard/info/delete/{id}','ChannelController@destroy')->name('deleteInfo');


///////////////// Create Password /////////////////
//return URL::temporarySignedRoute(
//    'unsubscribe', now()->addSecond(30), ['user' => 1]
//);
Route::get('password', 'PasswordController@index');
//////////////////////// Expiration Date /////////////////
Route::resource('dashboard/expirationhours','ExpirationController')->middleware('auth');

/**************** SubCategories1 Route  ******************* */

Route::resource('dashboard/subcategory1','SubCategory1Controller')->middleware('auth');
Route::post ('dashboard/subcategory1/delete/{id}','SubCategory1Controller@destroy')->name('deleteSubCategory1');

/**************** SubCategories2 Route  ******************* */
Route::resource('dashboard/subcategory2','SubCategory2Controller')->middleware('auth');
Route::post ('dashboard/subcategory2/delete/{id}','SubCategory2Controller@destroy')->name('deleteSubCategory2');

Route::get('get_sub_cats', 'SubCategory2Controller@get_sub_cats')->name('get_sub_cats');

Route::get('get_sub_cats2', 'SubCategory2Controller@get_sub_cats2')->name('get_sub_cats2');
