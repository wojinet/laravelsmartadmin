<?php

namespace Wojitech\LaravelSmartAdmin;

use Illuminate\Support\ServiceProvider;

class LaravelSmartAdminServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function boot(LaravelSmartAdmin $extension)
    {
        if (! LaravelSmartAdmin::boot()) {
            return ;
        }

        if ($views = $extension->views()) {
            $this->loadViewsFrom($views, 'laravelsmartadmin');
        }

        if ($this->app->runningInConsole() && $assets = $extension->assets()) {
            $this->publishes(
                [$assets => public_path('vendor/wojinet/laravelsmartadmin')],
                'laravelsmartadmin'
            );
        }

        $this->app->booted(function () {
            LaravelSmartAdmin::routes(__DIR__.'/../routes/web.php');
        });
    }
}