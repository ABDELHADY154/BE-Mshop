<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    /**
     * @OA\Info(
     *      version="1.0.0",
     *      title="Laravel OpenApi Demo Documentation",
     *      description="L5 Swagger OpenApi description",
     *      @OA\Contact(
     *          email="admin@admin.com"
     *      ),
     *      @OA\License(
     *          name="Apache 2.0",
     *          url="http://www.apache.org/licenses/LICENSE-2.0.html"
     *      )
     * )
     *
     * @OA\Server(
     *      url=L5_SWAGGER_CONST_HOST,
     *      description="Demo API Server"
     * )

     *
     * @OA\Tag(
     *     name="Products",
     *     description="API Endpoints of Products"
     * )
     */
    /**
     *  @OA\Server(
     *      url=L5_SWAGGER_CONST_HOST,
     *      description="L5 Swagger OpenApi dynamic host server"
     *  )
     *
     *  @OA\Server(
     *      url="localhost:8000/api/v1",
     *      description="L5 Swagger OpenApi Server"
     * )
     */

    /**
     * @OA\SecurityScheme(
     *     type="oauth2",
     *     description="Use a global client_id / client_secret and your username / password combo to obtain a token",
     *     name="Password Based",
     *     in="header",
     *     scheme="https",
     *     securityScheme="Password Based",
     *     @OA\Flow(
     *         flow="password",
     *         authorizationUrl="/oauth/authorize",
     *         tokenUrl="/oauth/token",
     *         refreshUrl="/oauth/token/refresh",
     *         scopes={}
     *     )
     * )
     */
}
