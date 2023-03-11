<?php

namespace Src\Auth\Presentation\Controllers;

use App\Http\Controllers\Auth\LoginDocsController;
use App\Http\Controllers\Controller;
use Src\Auth\Presentation\Dtos\LoginDto;
use Src\Auth\Presentation\Handlers\AuthUserHandler;

class LoginController extends Controller implements LoginDocsController
{

    public function __construct(private AuthUserHandler $authUser)
    {}

    public function login(LoginDto $body)
    {
        return $this->authUser->login($body);
    }

    public function refresh()
    {
        return $this->authUser->refresh();
    }

    public function logout()
    {
        return $this->authUser->logout();
    }
}
