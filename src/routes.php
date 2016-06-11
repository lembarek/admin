<?php


Route::group(['namespace' => 'Lembarek\Admin\Controllers', 'as' => 'admin::', 'middleware' => ['web','auth','AccessBackend']], function () {

        Route::get('/dashboard/{page?}', [
            'as' => 'dashboard',
            'uses' => 'DashboardController@index',
            ]);

        Route::get('/dashboard/profile/{username}', [
            'as' => 'profile',
            'uses' => 'UsersController@profile',
            ]);

        Route::delete('/dashboard/delete/{username}', [
            'as' => 'delete-user',
            'uses' => 'UsersController@delete',
            ]);


        Route::post('/dashboard/addrole', [
            'as' => 'add-role',
            'uses' => 'UsersController@addRole',
            ]);

});
