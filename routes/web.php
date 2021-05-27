<?php
// Site Languages
Route::get('language/{language}', 'LanguagesController@setLanguage')->name('language');

Auth::routes(['verify' => true]);

Route::group(['prefix' => 'dashboard'], function () {
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

    foreach (File::allFiles(__DIR__ . '/admin') as $route) {
        require_once $route->getPathname();
    }
});

/*
|--------------------------------------------------------------------------
| Front website routes
|--------------------------------------------------------------------------
|
| Here is where front website routes exists.
|
*/
foreach (File::allFiles(__DIR__ . '/front') as $route) {
    require_once $route->getPathname();
}
