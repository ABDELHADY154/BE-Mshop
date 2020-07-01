<?php

namespace App\Repository\Order;

use App\Http\Requests\OrderRequest;

interface OrderRepositoryInterface
{
    public function create(OrderRequest $request);
}
