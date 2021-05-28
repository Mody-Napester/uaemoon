<?php
// Site Languages
Route::get('language/{language}', 'LanguagesController@setLanguage')->name('language');

Route::group(['prefix' => 'dashboard', 'middleware' => ['auth']], function () {
    Route::get('/', 'DashboardController@index')->name('dashboard.index');
    Route::resource('permission-groups', 'PermissionGroupsController');
    Route::resource('permissions', 'PermissionsController');
    Route::resource('roles', 'RolesController');
    Route::resource('users', 'UsersController');
    Route::resource('lookup', 'LookupsController');
    Route::resource('category', 'CategoryController');
    Route::resource('page', 'PageController');
    Route::resource('social', 'SocialController');

    // User update data
    Route::get('user/profile', 'UsersController@showUserProfile')->name('users.showUserProfile');
    // Update password
    Route::put('users/{user}/update_password', 'UsersController@updatePassword')->name('users.update_password');
    // Reset password
    Route::get('users/{user}/reset_password', 'UsersController@resetPassword')->name('users.reset_password');

    ////////////////////////////////////////
    Route::get('settings/edit', [
        'as' => 'editSettings',
        'uses' => 'SettingsController@editSettings'
    ]);
    Route::post('settings/edit', [
        'as' => 'updateSettings',
        'uses' => 'SettingsController@updateSettings'
    ]);
    Route::get('settings/edit/about-us', [
        'as' => 'editSettingsAboutUs',
        'uses' => 'SettingsController@editSettingsAboutUs'
    ]);
    Route::get('settings/edit/contact-us', [
        'as' => 'editSettingsContactUs',
        'uses' => 'SettingsController@editSettingsContactUs'
    ]);
    Route::get('settings/edit/home-seo', [
        'as' => 'editSettingsHomeSeo',
        'uses' => 'SettingsController@editSettingsHomeSeo'
    ]);
    Route::get('settings/edit/about-seo', [
        'as' => 'editSettingsAboutSeo',
        'uses' => 'SettingsController@editSettingsAboutSeo'
    ]);
    Route::get('settings/edit/contact-seo', [
        'as' => 'editSettingsContactSeo',
        'uses' => 'SettingsController@editSettingsContactSeo'
    ]);
    ///////////////////////////////////////////
    Route::get('slider/index', [
        'as' => 'listSlider',
        'uses' => 'SliderController@listSlider'
    ]);

    Route::get('slider/add', [
        'as' => 'addSlider',
        'uses' => 'SliderController@addSlider'
    ]);

    Route::post('slider/add', [
        'as' => 'createSlider',
        'uses' => 'SliderController@createSlider'
    ]);

    Route::get('slider/edit/{id}', [
        'as' => 'editSlider',
        'uses' => 'SliderController@editSlider'
    ]);

    Route::post('slider/edit/{id}', [
        'as' => 'updateSlider',
        'uses' => 'SliderController@updateSlider'
    ]);

    Route::get('slider/delete/{id}', [
        'as' => 'deleteSlider',
        'uses' => 'SliderController@deleteSlider'
    ]);

    Route::post('slider/update-order', [
        'as' => 'updatedSliderOrder',
        'uses' => 'SliderController@updatedSliderOrder'
    ]);
    /////////////////////////////////
    Route::get('message/list', [
        'as' => 'listMessage',
        'uses' => 'MessageController@listMessage'
    ]);


    Route::get('message/delete/{id}', [
        'as' => 'deleteMessage',
        'uses' => 'MessageController@deleteMessage'
    ]);

    Route::get('message/status/{id}', [
        'as' => 'statusMessage',
        'uses' => 'MessageController@statusMessage'
    ]);
    //////////////////////////////////
    Route::get('advertise/list', 'AdvertiseController@list')->name('advertise.list');

    Route::get('advertise/show/{uuid}', 'AdvertiseController@show')->name('advertise.show');

    Route::get('advertise/approved/{uuid}', 'AdvertiseController@approved')->name('advertise.approved');

    Route::get('advertise/not-approved/{uuid}', 'AdvertiseController@not_approved')->name('advertise.not_approved');

});

/*
|--------------------------------------------------------------------------
| Front website routes
|--------------------------------------------------------------------------
|
| Here is where front website routes exists.
|
*/
Route::get('/', 'Front\HomeController@index')->name('front.home.index');
//////////////////////////////////
Route::get('/login-user', 'Front\UserController@login_or_register')->name('front.user.login_or_register');

Route::post('/login-user', 'Front\UserController@postLogin')->name('front.user.postLogin');

Route::post('/register-user', 'Front\UserController@postRegister')->name('front.user.postRegister');

Route::get('/logout-user', 'Front\UserController@getLogout')->name('front.user.getLogout');

Route::get('/profile', 'Front\UserController@profile')->name('front.user.profile');

Route::post('/profile/update', 'Front\UserController@update_profile')->name('front.user.update_profile');

Route::post('/profile/update/password', 'Front\UserController@change_password')->name('front.user.change_password');
/////////////////////////////////
Route::get('/about_us', 'Front\PageController@aboutUs')->name('front.page.aboutUs');

Route::get('/contact_us', 'Front\PageController@contactUs')->name('front.page.contactUs');

Route::get('/privacy-page', 'Front\PageController@privacyPage')->name('front.page.privacyPage');

Route::get('/terms-page', 'Front\PageController@termsPage')->name('front.page.termsPage');

Route::get('/page/{uuid}', 'Front\PageController@anyPage')->name('front.page.anyPage');
///////////////////////////////////
Route::get('categories/show/{uuid}', 'Front\CategoryController@show')->name('front.category.show');
//////////////////////////////////
Route::group(['middleware' => ['auth.front']], function () {
    Route::get('/ads/add-new', 'Front\AdvertiseController@add')->name('front.advertise.add');
    Route::post('/ads/add-new', 'Front\AdvertiseController@create')->name('front.advertise.create');
});
Route::get('/ads/show/{uuid}', 'Front\AdvertiseController@show')->name('front.advertise.show');

//////////////////////////////////
Auth::routes();

?>
