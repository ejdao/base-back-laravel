<?php

namespace App\Traits;

use Illuminate\Support\ServiceProvider;
use Src\Auth\Infrastructure\Services\AuthUserImpl;
use Src\Auth\Presentation\Handlers\AuthUserHandler;

class AuthTrait extends ServiceProvider
{
    public function register()
    {
        /* AuthUserService */
        $this->app->bind('Src\Auth\Application\Services\AuthUserService', function ($app) {
            return new AuthUserImpl();
        });
        /* AuthUserHandler */
        $this->app->bind('Src\Auth\Presentation\Handlers\AuthUserHandler', function ($app) {
            $authUserImpl = new AuthUserImpl();
            return new AuthUserHandler($authUserImpl);
        });
    }
}
