<?php

namespace Src\Auth\Presentation\Handlers;

use Src\Auth\Application\Payloads\LoginPayload;
use Src\Auth\Application\Services\AuthUserService;
use Src\Auth\Presentation\Dtos\LoginDto;
use Src\Shared\Presentation\Utils\BaseHandler;
use Throwable;

class AuthUserHandler extends BaseHandler
{

    public function __construct(private AuthUserService $authUser)
    {}

    public function login(LoginDto $body)
    {
        try {
            $payload = new LoginPayload($body->email, $body->password);

            $token = $this->authUser->login($payload);

            return $this->responseOk($token);
        } catch (Throwable $error) {
            throw $error;
        }

    }

    public function refresh()
    {
        try {
            $token = auth($this->guard())->refresh();

            return $this->responseOk($token);
        } catch (Throwable $error) {
            throw $error;
        }
    }

    public function logout()
    {

        try {
            auth($this->guard())->logout();

            return $this->responseNoContent();
        } catch (Throwable $error) {
            throw $error;
        }

    }
}
