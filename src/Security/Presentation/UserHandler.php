<?php

namespace Src\Security\Presentation;

use Src\Security\Application\CreateUserDto;
use Src\Security\Application\UpdateUserDto;
use Src\Security\Infrastructure\Repositories\UserRepository;
use Src\Shared\Presentation\Utils\BaseHandler;

class UserHandler extends BaseHandler
{
    private $_userRepository;

    public function __construct()
    {
        $this->_userRepository = new UserRepository();
    }

    public function create(CreateUserDto $request)
    {
        $result = $this->_userRepository->create($request);
        if ($result) {
            return $this->responseCreated();
        } else {
            return $this->responseBadRequest();
        }
    }
    public function update(UpdateUserDto $request, int $id)
    {
        $result = $this->_userRepository->update($request, $id);
        if ($result) {
            return $this->responseNoContent();
        } else {
            return $this->responseBadRequest();
        }
    }
    public function getAll()
    {
        $users = $this->_userRepository->getAll();
        return $this->responseOk($users);
    }
    public function getOne(int $id)
    {
        $user = $this->_userRepository->getOne($id);
        return $this->responseOk($user);
    }
    public function deleteOne(int $id)
    {
        $result = $this->_userRepository->deleteOne($id);
        if ($result) {
            return $this->responseNoContent();
        } else {
            return $this->responseBadRequest();
        }
    }
}
