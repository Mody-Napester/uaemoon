<?php

Route::get('/login-user', 'Front\UserController@login_or_register')->name('front.user.login_or_register');

Route::post('/login-user', 'Front\UserController@postLogin')->name('front.user.postLogin');

Route::post('/register-user', 'Front\UserController@postRegister')->name('front.user.postRegister');

Route::get('/logout-user', 'Front\UserController@getLogout')->name('front.user.getLogout');

Route::get('/profile', 'Front\UserController@profile')->name('front.user.profile');

Route::post('/profile/update', 'Front\UserController@update_profile')->name('front.user.update_profile');

Route::post('/profile/update/password', 'Front\UserController@change_password')->name('front.user.change_password');
