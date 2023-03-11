<?php

namespace Src\Auth\Application\Services;

use Src\Auth\Application\Payloads\LoginPayload;

interface AuthUserService
{
    public function login(LoginPayload $payload): string;
}
