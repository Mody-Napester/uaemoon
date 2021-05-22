<?php

Route::get('advertise/list', 'AdvertiseController@list')->name('advertise.list');

Route::get('advertise/show/{uuid}', 'AdvertiseController@show')->name('advertise.show');

Route::get('advertise/approved/{uuid}', 'AdvertiseController@approved')->name('advertise.approved');

Route::get('advertise/not-approved/{uuid}', 'AdvertiseController@not_approved')->name('advertise.not_approved');
