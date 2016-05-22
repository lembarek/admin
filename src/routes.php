<?php


Route::group(['namespace' => 'Lembarek\Admin\Controllers', 'as' => 'admin::', 'middleware' => ['web','auth','admin']], function () {


        Route::get('/dashboard/{page?}', [
            'as' => 'bashboard',
            'uses' => 'DashboardController@index',
            ]);


        Route::get('/show_users', [
            'as' => 'show_users',
            'uses' => 'UsersController@show_users',
            ]);

});
