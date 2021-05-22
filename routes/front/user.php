<?php

Route::get('/login-user', 'Front\UserController@login_or_register')->name('front.user.login_or_register');

Route::post('/login-user', 'Front\UserController@postLogin')->name('front.user.postLogin');

Route::post('/register-user', 'Front\UserController@postRegister')->name('front.user.postRegister');

Route::get('/logout-user', 'Front\UserController@getLogout')->name('front.user.getLogout');
