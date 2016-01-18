<?php

namespace DraperStudio\Inviteable;

use DraperStudio\ServiceProvider\ServiceProvider as BaseProvider;

class ServiceProvider extends BaseProvider
{
    protected $packageName = 'inviteable';

    public function boot()
    {
        $this->setup(__DIR__)
             ->publishMigrations();
    }
}
