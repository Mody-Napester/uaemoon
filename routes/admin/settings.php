<?php


Route::get('settings/edit',[
    'as'=>'editSettings',
    'uses'=> 'SettingsController@editSettings'
]);

Route::post('settings/edit',[
    'as'=>'updateSettings',
    'uses'=> 'SettingsController@updateSettings'
]);


Route::get('settings/edit/about-us',[
    'as'=>'editSettingsAboutUs',
    'uses'=> 'SettingsController@editSettingsAboutUs'
]);


Route::get('settings/edit/contact-us',[
    'as'=>'editSettingsContactUs',
    'uses'=> 'SettingsController@editSettingsContactUs'
]);

Route::get('settings/edit/home-seo',[
    'as'=>'editSettingsHomeSeo',
    'uses'=> 'SettingsController@editSettingsHomeSeo'
]);

Route::get('settings/edit/about-seo',[
    'as'=>'editSettingsAboutSeo',
    'uses'=> 'SettingsController@editSettingsAboutSeo'
]);

Route::get('settings/edit/contact-seo',[
    'as'=>'editSettingsContactSeo',
    'uses'=> 'SettingsController@editSettingsContactSeo'
]);