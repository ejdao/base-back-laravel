<?php

namespace Src\Auth\Infrastructure\Services;

use Src\Auth\Application\Payloads\LoginPayload;
use Src\Auth\Application\Services\AuthUserService;
use Src\Security\Infrastructure\Models\User;
use Src\Shared\Infrastructure\Utils\BaseSource;

class AuthUserImpl extends BaseSource implements AuthUserService
{

    public function login(LoginPayload $payload): string
    {
        // Check if the email exists.
        if (User::where('email', $payload->getEmail())->count() === 0) {
            return response()->json(['message' => 'Invalid credentials'], 404);
        }
        // Check if the user is active.
        if (!User::where('email', $payload->getEmail())->first()['active']) {
            return response()->json(['message' => 'Your user is disabled'], 403);
        }
        // Generate authentication token if credentials are valid.
        $credentials = [
            'email' => $payload->getEmail(),
            'password' => $payload->getPassword(),
        ];
        if (!$token = auth($this->guard())->attempt($credentials)) {
            return response()->json(['message' => 'Invalid credentials'], 404);
        }
        return $token;
    }
}
