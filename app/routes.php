<?php

# All fixed pages from the website
Route::get('/', 'PagesController@index');

# Admin area
Route::group(array('prefix' => 'admin', 'before' => 'auth|admin'), function()
{
    Route::post('useradmin/store', 'AdminController@storeAdminUser');
});

Route::filter('admin', function()
{
    if (!Auth::user()->superuser)
    {
        return Redirect::back()->withFlashMessage('I don\'t think you mean what you think it means');
    }
});
