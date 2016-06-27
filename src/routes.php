<?php


Route::group(['namespace' => 'Lembarek\Admin\Controllers', 'prefix' => 'dashboard',  'as' => 'admin::', 'middleware' => ['web','auth','AccessBackend']], function () {

        Route::get('profile/{username}', [
            'as' => 'profile',
            'uses' => 'UsersController@profile',
            ]);


        Route::get('create-user', [
            'as' => 'create-user',
            'uses' => 'UsersController@createUser',
            ]);


        Route::post('create-user', [
            'as' => 'create-user',
            'uses' => 'UsersController@postCreateUser',
            ]);


        Route::delete('delete/{username}', [
            'as' => 'delete-user',
            'uses' => 'UsersController@delete',
            ]);


        Route::post('addrole', [
            'as' => 'add-role',
            'uses' => 'UsersController@addRole',
            ]);


        Route::delete('{role}/delete', [
            'as' => 'delete-role',
            'uses' => 'UsersController@deleteRole',
            ]);

        Route::resource('tags', 'TagsController');

        Route::get('{page?}', [
            'as' => 'dashboard',
            'uses' => 'DashboardController@index',
            ]);


});
