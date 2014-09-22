<?php

# All fixed pages from the website
Route::get('/', 'PagesController@index');

# Admin area
Route::post('user/admin/store', 'AdminController@createAdminUser');