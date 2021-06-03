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
    Route::post('user/{uuid}/add-new-ads', 'ApisController@addUserInsert');
    Route::post('upload/image', 'ApisController@uploadImage');

    Route::get('{lang}/sliders', 'ApisController@listSliders');
    Route::get('{lang}/categories', 'ApisController@listCategories');
    Route::get('{lang}/categories/show/{uuid}', 'ApisController@showCategory');
    Route::get('{lang}/categories/ads/{uuid}', 'ApisController@listCategoryAds');
    Route::get('{lang}/ads', 'ApisController@listAds');
    Route::get('{lang}/ads/show/{uuid}', 'ApisController@showAd');
    Route::get('{lang}/page/privacy', 'ApisController@showPrivacyPage');
    Route::get('{lang}/page/terms', 'ApisController@showTermsPage');
    Route::get('user/{uuid}', 'ApisController@showUser');
    Route::get('{lang}/user/{uuid}/ads', 'ApisController@showUserAds');
    Route::get('{lang}/pages/all', 'ApisController@listPages');
    Route::get('{lang}/pages/privacy', 'ApisController@showPrivacyPage');
    Route::get('{lang}/pages/terms', 'ApisController@showTermsPage');

});

