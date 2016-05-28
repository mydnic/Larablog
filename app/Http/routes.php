<?php

Route::group(['middleware' => 'web'], function () {
    // Pages
    Route::get('/', ['as' => 'home', 'uses' => 'PageController@index']);
    Route::get('page/{slug}', ['as' => 'page.show', 'uses' => 'PageController@show']);

    // Categories
    Route::resource('category', 'CategoryController');

    Route::auth();

    // Articles
    Route::get('search', ['as' => 'post.search', 'uses' => 'SearchController@searchPosts']);
    Route::get('post/category/{category}', ['as' => 'post.category', 'uses' => 'PostController@getPostsByCategory']);
    Route::resource('post', 'PostController');

    // Tags
    Route::get('tag/{slug}', ['as' => 'tag.show', 'uses' => 'TagController@show']);

    // Users
    Route::resource('user', 'UserController');

    Route::group(['prefix' => 'portfolio'], function () {
        Route::get('/', ['as' => 'portfolio', 'uses' => 'ProjectController@index']);
        Route::resource('project', 'ProjectController');
    });

    // RSS Feed
    Route::get('feed', ['as' => 'rss', 'uses' => 'FeedController@getRss']);

    // Admin area
    Route::post('admin/useradmin/store', 'Admin\UserController@storeAdminUser');
    Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
        Route::get('/', ['as' => 'admin.home', 'uses' => 'Admin\DashboardController@index']);

        Route::get('post/{id}/delete', ['as' => 'admin.post.delete', 'uses' => 'Admin\PostController@delete']);
        Route::resource('post', 'Admin\PostController');

        Route::get('page/{id}/delete', ['as' => 'admin.page.delete', 'uses' => 'Admin\PageController@delete']);
        Route::resource('page', 'Admin\PageController');

        Route::get('category/{id}/delete', ['as' => 'admin.category.delete', 'uses' => 'Admin\CategoryController@delete']);
        Route::resource('category', 'Admin\CategoryController');

        Route::get('project/{id}/publish', ['as' => 'admin.project.publish', 'uses' => 'Admin\ProjectController@setPublished']);
        Route::get('project/{id}/unpublish', ['as' => 'admin.project.unpublish', 'uses' => 'Admin\ProjectController@setUnpublished']);
        Route::resource('project', 'Admin\ProjectController');

        Route::get('project_category/{id}/delete', ['as' => 'admin.project_category.delete', 'uses' => 'Admin\ProjectCategoryController@delete']);
        Route::resource('project_category', 'Admin\ProjectCategoryController');

        Route::resource('task', 'Admin\TaskController');

        Route::resource('social', 'Admin\SocialLinkController');

        Route::resource('settings', 'Admin\SettingController');
        Route::post('image/upload', 'Admin\SettingController@upload');

        Route::resource('menu', 'Admin\MenuController');
    });

    //API routes
    Route::group(['prefix'     => 'api/v1'], function () {
        Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
            Route::resource('task', 'API\TaskController');
            Route::resource('menu', 'API\MenuController');
            Route::post('menu/destroy', 'API\MenuController@destroy');
            Route::post('menu/order', 'API\MenuController@updateOrder');
            Route::resource('page', 'API\PageController');
        });
    });
});
