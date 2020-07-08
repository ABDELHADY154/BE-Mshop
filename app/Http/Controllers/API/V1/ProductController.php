<?php

namespace App\Http\Controllers\API\V1;

use AElnemr\RestFullResponse\CoreJsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductList;
use App\Http\Resources\ProductShow;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use CoreJsonResponse;

    /**
     * @OA\Get(
     *      path="/api/products",
     *      operationId="getproductsList",
     *      tags={"products"},
     *      summary="Get list of products",
     *      description="Returns list of products",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */


    public function index()
    {

        $products = ProductList::collection(Product::all());
        return $this->ok($products->resolve());
    }
    /**
     * @OA\Get(
     *      path="/api/products/{product}",
     *      operationId="getProductById",
     *      tags={"product"},
     *      summary="Get product information",
     *      description="Returns product data",
     *      @OA\Parameter(
     *          name="product",
     *          description="product id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     */
    public function show(Product $product)
    {
        return new ProductShow($product);
    }
}
