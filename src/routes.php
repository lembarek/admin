<?php


Route::group(['namespace' => 'Lembarek\Admin\Controllers', 'as' => 'admin::', 'middleware' => ['web','auth','AccessBackend']], function () {

        Route::get('/dashboard/{page?}', [
            'as' => 'dashboard',
            'uses' => 'DashboardController@index',
            ]);

        Route::get('/show_users', [
            'as' => 'show_users',
            'uses' => 'UsersController@show_users',
            ]);


        Route::get('/dashboard/profile/{username}', [
            'as' => 'profile',
            'uses' => 'DashboardController@profile',
            ]);

});
