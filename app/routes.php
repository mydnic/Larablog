<?php

# All fixed pages from the website
Route::get('/', 'PagesController@index');

# Sessions
Route::get('/login', 'SessionsController@create');
Route::get('/logout', 'SessionsController@destroy');
Route::resource('session', 'SessionsController');

# Categories
Route::resource('category', 'CategoriesController');

# Admin area
Route::post('admin/useradmin/store', 'AdminController@storeAdminUser');
Route::get('/admin', function(){
    return Redirect::to('admin/index');
});
Route::group(array('prefix' => 'admin', 'before' => 'auth|admin'), function()
{
    Route::get('index', 'AdminController@index');
    Route::resource('post', 'AdminPostsController');
    Route::resource('page', 'AdminPagesController');
    Route::resource('settings', 'AdminSettingsController');
});