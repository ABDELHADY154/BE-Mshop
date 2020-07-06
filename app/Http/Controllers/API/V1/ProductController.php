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

    public function index()
    {

        $products = ProductList::collection(Product::all());
        // return ProductList::collection(Client::all());
        return $this->ok($products->resolve());
    }
    public function show(Product $product)
    {
        return new ProductShow($product);
    }
}
