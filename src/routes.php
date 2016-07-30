<?php


Route::group([
    'namespace' => 'Lembarek\Admin\Controllers',
    'prefix' => 'dashboard',
    'as' => 'admin::',
    'middleware' => ['web','auth','AccessBackend']
],
    function () {

        Route::delete('/users/{user}/roles/{role}', [
            'as' => 'roles.users.destroy',
            'uses' => 'RoleUserController@destroy',
        ]);

        Route::post('/users/{user}', [
            'as' => 'roles.users.store',
            'uses' => 'RoleUserController@store',
            ]);

        Route::get('/categories', [
            'as' => 'categories.posts.store',
            'uses' => 'CategoryPostController@store',
            ]);

        Route::resource('roles', 'RolesController');
        Route::resource('posts', 'PostsController');
        Route::resource('users', 'UsersController');
        Route::resource('tags', 'TagsController');
        Route::resource('categories', 'CategoriesController');

        Route::get('{page?}', [
            'as' => 'dashboard',
            'uses' => 'DashboardController@index',
            ]);
});
