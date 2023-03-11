<?php

namespace Src\Shared\Infrastructure\Utils;

use Src\Shared\Application\Constants\Contexts;

class BaseSource
{
    public function guard()
    {
        return Contexts::defaultGuard();
    }
}
