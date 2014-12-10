<?php

# All fixed pages from the website
Route::get('/', array('as' => 'home', 'uses' => 'PagesController@index'));

# Sessions
Route::get('/login', 'SessionsController@create');
Route::get('/logout', 'SessionsController@destroy');
Route::resource('session', 'SessionsController');

# Categories
Route::resource('category', 'CategoriesController');
Route::post('category/delete', array('before' => 'auth|admin', 'uses' => 'CategoriesController@delete'));

# Admin area
Route::post('admin/useradmin/store', 'AdminController@storeAdminUser');
Route::group(array('prefix' => 'admin', 'before' => 'auth|admin'), function()
{
    Route::get('/', 'AdminController@index');
    Route::get('index', 'AdminController@index');
    Route::resource('post', 'AdminPostsController');
    Route::resource('page', 'AdminPagesController');
    Route::resource('task', 'AdminTasksController');
    Route::resource('settings', 'AdminSettingsController');
    Route::resource('menu', 'AdminMenuController');
});

#API routes
Route::group(array('prefix' => 'api/v1'), function()
{
    Route::get('category', function(){
        return Category::with('posts')->get();
    });
    Route::get('task', function(){
        return Task::where('completed', false)->get();
    });
    Route::get('menu', function(){
        return Menu::orderBy('weight')->get();
    });
    Route::post('menu', function(){
        return Menu::orderBy('weight')->get();
    });
});