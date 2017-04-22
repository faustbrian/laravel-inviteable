<?php



declare(strict_types=1);

namespace BrianFaust\Inviteable;

use BrianFaust\ServiceProvider\AbstractServiceProvider;

class InviteableServiceProvider extends AbstractServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot(): void
    {
        $this->publishMigrations();
    }

    /**
     * Get the default package name.
     *
     * @return string
     */
    public function getPackageName(): string
    {
        return 'inviteable';
    }
}
