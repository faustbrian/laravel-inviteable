<?php

namespace BrianFaust\Inviteable;

class ServiceProvider extends \BrianFaust\ServiceProvider\ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->publishMigrations();
    }

    /**
     * Get the default package name.
     *
     * @return string
     */
    public function getPackageName()
    {
        return 'inviteable';
    }
}
