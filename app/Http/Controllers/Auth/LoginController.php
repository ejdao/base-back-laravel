<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Src\Auth\LoginDto;
use Src\Auth\LoginHandler;
use Src\Shared\Presentation\BaseHandler;

class LoginController extends Controller
{

    private $_baseHandler;

    private $_loginHandler;

    public function __construct()
    {
        $this->_loginHandler = new LoginHandler();

        $this->_baseHandler = new BaseHandler();
    }
    /**
     * @OA\Post (
     *     path="/v1/login",
     *     tags={"Auth"},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                      type="object",
     *                      @OA\Property(
     *                          property="email",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="password",
     *                          type="string"
     *                      )
     *                 ),
     *                 example={
     *                     "email":"admin",
     *                     "password":"123"
     *                }
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="success",
     *      ),
     *      @OA\Response(
     *          response="default",
     *          description="invalid credentials / inactive user",
     *      )
     *  )
     */
    public function login(LoginDto $body)
    {
        return $this->_loginHandler->execute($body);
    }
    /**
     * @OA\Get(
     *     path="/v1/refresh",
     *     tags={"Auth"},
     *     security={ {"bearer": {} }},
     * @OA\Response(
     *     response=200,
     *     description="success"
     *   ),
     * @OA\Response(
     *     response="default",
     *     description="error"
     *   )
     * )
     */
    public function refresh()
    {
        $token = auth($this->_baseHandler->guard)->refresh();
        return response()->json($token, 200);
    }
    /**
     * @OA\Get(
     *     path="/v1/logout",
     *     tags={"Auth"},
     *     security={ {"bearer": {} }},
     * @OA\Response(
     *     response=200,
     *     description="success"
     *   ),
     * @OA\Response(
     *     response="default",
     *     description="error"
     *   )
     * )
     */
    public function logout()
    {
        auth($this->_baseHandler->guard)->logout();
        return response()->json([], 204);
    }
}
