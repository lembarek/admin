<?php

 namespace Lembarek\Admin\Providers;

class AdminServiceProvider extends ServiceProvider
{


    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->fullBoot('admin', __DIR__.'/../');
        app('Lembarek\Admin\Kernel');
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
