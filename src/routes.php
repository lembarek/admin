<?php


Route::group(['namespace' => 'Lembarek\Admin\Controllers', 'as' => 'admin::', 'middleware' => ['web','auth','AccessBackend']], function () {

        Route::get('/dashboard/profile/{username}', [
            'as' => 'profile',
            'uses' => 'UsersController@profile',
            ]);


        Route::get('/dashboard/create-user', [
            'as' => 'create-user',
            'uses' => 'UsersController@createUser',
            ]);


        Route::post('/dashboard/create-user', [
            'as' => 'create-user',
            'uses' => 'UsersController@postCreateUser',
            ]);


        Route::delete('/dashboard/delete/{username}', [
            'as' => 'delete-user',
            'uses' => 'UsersController@delete',
            ]);


        Route::post('/dashboard/addrole', [
            'as' => 'add-role',
            'uses' => 'UsersController@addRole',
            ]);


        Route::delete('/dashboard/{role}/delete', [
            'as' => 'delete-role',
            'uses' => 'UsersController@deleteRole',
            ]);

        Route::get('/dashboard/{page?}', [
            'as' => 'dashboard',
            'uses' => 'DashboardController@index',
            ]);




});
