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
    Route::resource('settings', 'AdminSettingsController');
});