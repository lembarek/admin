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
