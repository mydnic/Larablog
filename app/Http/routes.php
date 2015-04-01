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

Route::group(['prefix' => 'portfolio'], function() {
    Route::get('/', ['as'=>'portfolio', 'uses'=>'ProjectController@index']);
    Route::resource('project', 'ProjectController');
});

# Admin area
Route::post('admin/useradmin/store', 'Admin\AdminController@storeAdminUser');
Route::group(['prefix' => 'admin', 'middleware' => ['auth','admin']], function() {
    Route::get('index', ['as'=>'admin.home', 'uses'=>'Admin\AdminController@index']);
    Route::resource('post', 'Admin\PostController');
    Route::get('post/{id}/delete', ['as'=>'admin.post.delete', 'uses'=>'Admin\PostController@destroy']);
    Route::resource('page', 'Admin\PageController');
    Route::resource('project', 'Admin\ProjectController');
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
    Route::group(['prefix' => 'admin', 'middleware' => ['auth','admin']], function() {
        Route::resource('category', 'API\CategoryController');
        Route::post('category/delete', ['as'=>'category.delete', 'uses'=>'API\CategoryController@destroy']);
        Route::resource('projectcategory', 'API\ProjectCategoryController');
        Route::post('projectcategory/delete', ['as'=>'category.delete', 'uses'=>'API\ProjectCategoryController@destroy']);
        Route::resource('task', 'API\TaskController');
        Route::resource('menu', 'API\MenuController');
    });
});