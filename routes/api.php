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

Route::get('categories', 'ApisController@listCategories');
Route::get('categories/show/{uuid}', 'ApisController@showCategory');
Route::get('ads', 'ApisController@listAds');
Route::get('ads/show/{uuid}', 'ApisController@showAd');
Route::get('page/privacy', 'ApisController@showPrivacyPage');
Route::get('page/terms', 'ApisController@showTermsPage');
Route::get('user/{uuid}', 'ApisController@showUser');
Route::get('user/{uuid}/ads', 'ApisController@showUserAds');
