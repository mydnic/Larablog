<?php

# All fixed pages from the website
Route::get('/', 'PagesController@index');

# Sessions
Route::get('/login', 'SessionsController@create');
Route::get('/logout', 'SessionsController@destroy');
Route::resource('session', 'SessionsController');






# Admin area
Route::post('admin/useradmin/store', 'AdminController@storeAdminUser');
Route::group(array('prefix' => 'admin', 'before' => 'auth|admin'), function()
{
    Route::get('/', 'AdminController@index');
    Route::get('index', 'AdminController@index');
    Route::resource('post', 'AdminPostsController');
});

Route::filter('admin', function()
{
    if (!Auth::user()->superuser)
    {
        return Redirect::back()->withFlashMessage('I don\'t think you mean what you think it means');
    }
});
