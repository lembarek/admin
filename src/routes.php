<?php


Route::group(['namespace' => 'Lembarek\Admin\Controllers', 'as' => 'admin::', 'middleware' => ['web','auth','AccessBackend']], function () {

        Route::get('/dashboard/{page?}', [
            'as' => 'dashboard',
            'uses' => 'DashboardController@index',
            ]);

        Route::get('/dashboard/profile/{username}', [
            'as' => 'profile',
            'uses' => 'DashboardController@profile',
            ]);

});
