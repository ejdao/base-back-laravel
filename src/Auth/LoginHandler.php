<?php

namespace Src\Auth;

use Src\Security\Infrastructure\Models\User;
use Src\Shared\Presentation\BaseHandler;

class LoginHandler extends BaseHandler
{

    public function execute(LoginDto $body)
    {
        // Check if the email exists.
        if (User::where('email', $body->email)->count() === 0) {
            return response()->json(['message' => 'Invalid credentials'], 404);
        }
        // Check if the user is active.
        if (!User::where('email', $body->email)->first()['active']) {
            return response()->json(['message' => 'Your user is disabled'], 403);
        }
        // Generate authentication token if credentials are valid.
        $credentials = $body->only('email', 'password');
        if (!$token = auth($this->guard)->attempt($credentials)) {
            return response()->json(['message' => 'Invalid credentials'], 404);
        }
        return $this->responseOk($token);
    }
}
