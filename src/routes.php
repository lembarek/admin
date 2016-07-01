<?php


Route::group([
    'namespace' => 'Lembarek\Admin\Controllers',
    'prefix' => 'dashboard',
    'as' => 'admin::',
    'middleware' => ['web','auth','AccessBackend']
],
    function () {

        Route::resource('roles', 'RolesController');
        Route::resource('posts', 'PostsController');
        Route::resource('users', 'UsersController');
        Route::resource('tags', 'TagsController');

        Route::get('{page?}', [
            'as' => 'dashboard',
            'uses' => 'DashboardController@index',
            ]);


});
