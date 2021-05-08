<?php

Route::get('/about_us', 'Front\PageController@aboutUs')->name('front.page.aboutUs');

Route::get('/contact_us', 'Front\PageController@contactUs')->name('front.page.contactUs');

Route::get('/privacy-page', 'Front\PageController@privacyPage')->name('front.page.privacyPage');

Route::get('/terms-page', 'Front\PageController@termsPage')->name('front.page.termsPage');
