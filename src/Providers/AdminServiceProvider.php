<?php

 namespace Lembarek\Admin\Providers;


use Illuminate\Contracts\Auth\Access\Gate;
use Lembarek\Auth\Models\User;

class AdminServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(Gate $gate)
    {
        $this->fullBoot('admin', __DIR__.'/../');
        app('Lembarek\Admin\Kernel');

        $gate->define('destory-user', function($loginUser,User $user){
            return $loginUser->isSuperiorThen($user);
        });

        $gate->define('create-posts', function(User $user){
            return $user->hasPermission('create-posts');
        });

        $gate->define('update-posts', function(User $user){
            return $user->hasPermission('update-posts');
        });

        $gate->define('delete-posts', function(User $user){
            return $user->hasPermission('delete-posts');
        });

        $gate->define('create-users', function(User $user){
            return $user->hasPermission('create-users');
        });
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
    }
}
