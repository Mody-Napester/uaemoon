<?php

Route::get('/ads/add-new', 'Front\AdvertiseController@add')->name('front.advertise.add');

Route::post('/ads/add-new', 'Front\AdvertiseController@create')->name('front.advertise.create');

Route::get('/ads/show/{uuid}', 'Front\AdvertiseController@show')->name('front.advertise.show');
