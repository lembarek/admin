<?php


Route::group(['namespace' => 'Lembarek\Admin\Controllers', 'prefix' => 'dashboard',  'as' => 'admin::', 'middleware' => ['web','auth','AccessBackend']], function () {

        Route::post('addrole', [
            'as' => 'add-role',
            'uses' => 'UsersController@addRole',
            ]);


        Route::delete('{role}/delete', [
            'as' => 'delete-role',
            'uses' => 'UsersController@deleteRole',
            ]);

        Route::resource('users', 'UsersController');
        Route::resource('tags', 'TagsController');

        Route::get('{page?}', [
            'as' => 'dashboard',
            'uses' => 'DashboardController@index',
            ]);


});
