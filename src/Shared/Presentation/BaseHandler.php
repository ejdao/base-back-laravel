<?php

namespace Src\Shared\Presentation;

class BaseHandler
{

    public $guard = "api";

    public function responseOk($data)
    {
        return response()->json($data, 200);
    }

    public function responseCreated()
    {
        return response()->json([], 201);
    }

    public function responseNoContent()
    {
        return response()->json([], 204);
    }

    public function responseBadRequest()
    {
        return response()->json(['message' => 'Bad request'], 400);
    }

    public function responseUnauthorized()
    {
        return response()->json(['message' => 'Unauthorized'], 401);
    }

    public function responseForbidden()
    {
        return response()->json(['message' => 'Forbidden'], 403);
    }

    public function responseNoFound()
    {
        return response()->json(['message' => 'No found'], 404);
    }
}
