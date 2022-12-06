<?php

namespace App\Http\Controllers\Notices;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Src\Notices\Infrastructure\Repositories\NoticeRepository;

class NoticeController extends Controller
{

    private $_noticeRepository;

    public function __construct()
    {
        $this->_noticeRepository = new NoticeRepository();

    }

    /**
     * Create a new notice.
     * @OA\Post (
     *  path="/v1/notices",
     *  tags={"Notices"},
     *  security={ {"bearer": {} }},
     *  @OA\RequestBody(
     *      @OA\MediaType(
     *          mediaType="application/json",
     *              @OA\Schema(
     *                  @OA\Property(
     *                      type="object",
     *                      @OA\Property(
     *                          property="imageUrl",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="content",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="description",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="categoryId",
     *                          type="int"
     *                      ),
     *                      @OA\Property(
     *                          property="location",
     *                          type="string"
     *                      ),
     *                 ),
     *                 example={
     *                      "imageUrl" : "noticeImage.url",
     *                      "content": "contenido de la noticia",
     *                      "description" : "descripción de la noticia",
     *                      "categoryId" : 1,
     *                      "location" : "ubicación de la noticia"
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
    public function create(Request $request)
    {
        return $this->_noticeRepository->create($request);
    }

}
