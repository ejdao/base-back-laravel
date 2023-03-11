<?php

namespace App\Http\Controllers\Auth;

use Src\Auth\Presentation\Dtos\LoginDto;

interface LoginDocsController
{

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
     *                     "password":"1234"
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
    public function login(LoginDto $body);

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
    public function refresh();
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
    public function logout();
}
