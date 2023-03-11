<?php

namespace Src\Shared\Presentation\Utils;

use Src\Shared\Application\Constants\Contexts;

class BaseHandler
{

    public function guard()
    {
        return Contexts::defaultGuard();
    }

    public function responseOk($data, $message = 'Request executed successfully')
    {
        return response()->json(['success' => true, 'data' => $data, 'message' => $message], 200);
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
