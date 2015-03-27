<?php

# All fixed pages from the website
Route::get('/', array('as' => 'home', 'uses' => 'PageController@index'));

# Categories
Route::resource('category', 'CategoryController');

# Articles
Route::get('post/category/{category}', ['as'=>'post.category', 'uses'=>'PostController@getPostsByCategory']);
Route::resource('post', 'PostController');

# Tags
Route::get('tag/{slug}', ['as'=>'tag.show', 'uses'=>'TagController@show']);

# Users
Route::resource('user', 'UserController');

# Admin area
Route::post('admin/useradmin/store', 'Admin\AdminController@storeAdminUser');
Route::group(['prefix' => 'admin', 'middleware' => ['auth','admin']], function() {
    Route::get('index', ['as'=>'admin.home', 'uses'=>'Admin\AdminController@index']);
    Route::resource('post', 'Admin\PostController');
    Route::get('post/{id}/delete', ['as'=>'admin.post.delete', 'uses'=>'Admin\PostController@destroy']);
    Route::resource('page', 'Admin\PageController');
    Route::resource('task', 'Admin\TaskController');
    Route::resource('settings/social', 'Admin\SocialLinkController');
    Route::resource('settings', 'Admin\SettingController');
    Route::resource('menu', 'Admin\MenuController');
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

#API routes
Route::group(['prefix' => 'api/v1'], function() {
    Route::resource('category', 'API\CategoryController');
    Route::resource('task', 'API\TaskController');
    Route::resource('menu', 'API\MenuController');
});