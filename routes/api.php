<?php

use Illuminate\Http\Request;

Route::group([
    'middleware' => [
        'cors'
    ],
], function ($router) {
    Route::post('login', 'Auth\AuthAPIController@login');
    Route::post('register', 'Auth\AuthAPIController@register');
    Route::post('update_user/{uuid}', 'Auth\AuthAPIController@update_user');
    Route::get('sliders', 'ApisController@listSliders');
    Route::get('categories', 'ApisController@listCategories');
    Route::get('categories/show/{uuid}', 'ApisController@showCategory');
    Route::get('categories/ads/{uuid}', 'ApisController@listCategoryAds');
    Route::get('ads', 'ApisController@listAds');
    Route::get('ads/show/{uuid}', 'ApisController@showAd');
    Route::get('page/privacy', 'ApisController@showPrivacyPage');
    Route::get('page/terms', 'ApisController@showTermsPage');
    Route::get('user/{uuid}', 'ApisController@showUser');
    Route::get('user/{uuid}/ads', 'ApisController@showUserAds');
    Route::post('user/{uuid}/add-new-ads', 'ApisController@addUserInsert');

    Route::get('pages/privacy', 'ApisController@showPrivacyPage');
    Route::get('pages/terms', 'ApisController@showTermsPage');

    Route::post('upload/image', 'ApisController@uploadImage');
});

