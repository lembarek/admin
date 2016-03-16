<?php


Route::group(['as' => 'admin::', 'middleware' => ['web','auth','admin']], function () {

        Route::get('/show_users', [
            'as' => 'show_users',
            'uses' => 'Lembarek\Admin\Controllers\UsersController@show_users',
            ]);
});
