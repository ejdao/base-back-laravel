<?php

namespace App\Http\Controllers\Security;

use App\Http\Controllers\Controller;
use Src\Security\Application\CreateUserDto;
use Src\Security\Application\UpdateUserDto;
use Src\Security\Presentation\UserHandler;

class UserController extends Controller
{
    private $_userHandler;

    public function __construct()
    {
        $this->middleware('admin')->except('getAll', 'getOne');
        $this->_userHandler = new UserHandler();
    }
    /**
     * Create a new user.
     * @OA\Post (
     *  path="/v1/users",
     *  tags={"Users"},
     *  security={ {"bearer": {} }},
     *  @OA\RequestBody(
     *      @OA\MediaType(
     *          mediaType="application/json",
     *              @OA\Schema(
     *                  @OA\Property(
     *                      type="object",
     *                      @OA\Property(
     *                          property="role",
     *                          type="int"
     *                      ),
     *                      @OA\Property(
     *                          property="fullName",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="email",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="password",
     *                          type="string"
     *                      ),
     *                 ),
     *                 example={
     *                      "role" : "0001",
     *                      "fullName": "user",
     *                      "email": "user",
     *                      "password": "123"
     *                  }
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="successfully created",
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="unsuccess, Bad request",
     *      )
     *  )
     */
    public function create(CreateUserDto $request)
    {
        return $this->_userHandler->create($request);
    }
    /**
     * Update a user.
     * @OA\Put (
     *     path="/v1/user/{id}",
     *     tags={"Users"},
     *     security={ {"bearer": {} }},
     * @OA\Parameter(
     *     in="path",
     *     name="id",
     *     required=true,
     *     @OA\Schema(type="number")
     *    ),
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                      type="object",
     *                      @OA\Property(
     *                          property="role",
     *                          type="int"
     *                      ),
     *                      @OA\Property(
     *                          property="fullName",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="email",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="active",
     *                          type="boolean"
     *                      ),
     *                 ),
     *                 example={
     *                      "role" : "0002",
     *                      "names": "user",
     *                      "email": "user",
     *                      "active": true
     *                  }
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=204,
     *          description="successfully updated",
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="unsuccess, Bad request",
     *      )
     *  )
     */
    public function update(UpdateUserDto $request, int $id)
    {
        return $this->_userHandler->update($request, $id);
    }
    /**
     * Get all users.
     * @OA\Get(
     *     path="/v1/users",
     *     tags={"Users"},
     * @OA\Response(
     *     response=200,
     *     description="success"
     *   )
     * )
     */
    public function getAll()
    {
        return $this->_userHandler->getAll();
    }
    /**
     * Get one user.
     * @OA\Get(
     *     path="/v1/user/{id}",
     *     tags={"Users"},
     * @OA\Parameter(
     *     in="path",
     *     name="id",
     *     required=true,
     *     @OA\Schema(type="number")
     *    ),
     * @OA\Response(
     *     response=200,
     *     description="success"
     *   ),
     * )
     */
    public function getOne(int $id)
    {
        return $this->_userHandler->getOne($id);
    }
    /**
     * Delete one user.
     * @OA\Delete(
     *     path="/v1/user/{id}",
     *     tags={"Users"},
     *     security={ {"bearer": {} }},
     * @OA\Parameter(
     *     in="path",
     *     name="id",
     *     required=true,
     *     @OA\Schema(type="number")
     *    ),
     * @OA\Response(
     *     response=204,
     *     description="Successfully deleted"
     *   ),
     * @OA\Response(
     *     response=404,
     *     description="No found"
     *   )
     * )
     */
    public function deleteOne(int $id)
    {
        return $this->_userHandler->deleteOne($id);
    }
}
