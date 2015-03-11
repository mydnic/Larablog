<?php

# All fixed pages from the website
Route::get('/', array('as' => 'home', 'uses' => 'PageController@index'));

# Categories
Route::resource('category', 'CategoryController');

# Articles
Route::resource('post', 'PostController');

# Users
Route::resource('user', 'UserController');

# Admin area
Route::post('admin/useradmin/store', 'Admin\AdminController@storeAdminUser');
Route::group(['prefix' => 'admin', 'middleware' => ['auth','admin']], function() {
    Route::get('index', ['as'=>'admin.home', 'uses'=>'Admin\AdminController@index']);
    Route::resource('post', 'Admin\PostController');
    Route::resource('page', 'Admin\PageController');
    Route::resource('task', 'Admin\TaskController');
    Route::resource('settings', 'Admin\SettingController');
    Route::resource('menu', 'Admin\MenuController');
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

#API routes
Route::group(['prefix' => 'api/v1'], function() {
    Route::get('category', 'API\CategoryController@index');
    Route::post('category', 'API\CategoryController@store');
    Route::get('task', function() {
        return Task::where('completed', false)->get();
    });
    Route::get('menu', function() {
        return Menu::orderBy('weight')->get();
    });
    Route::post('menu', function() {
        return Menu::orderBy('weight')->get();
    });
});