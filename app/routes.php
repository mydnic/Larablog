<?php

# All fixed pages from the website
Route::get('/', 'PagesController@index');

Route::get('uri', function(){
    return 'qsdfqs';
});




# Admin area
Route::post('admin/useradmin/store', 'AdminController@storeAdminUser');
Route::group(array('prefix' => 'admin', 'before' => 'auth|admin'), function()
{
});

Route::filter('admin', function()
{
    if (!Auth::user()->superuser)
    {
        return Redirect::back()->withFlashMessage('I don\'t think you mean what you think it means');
    }
});
