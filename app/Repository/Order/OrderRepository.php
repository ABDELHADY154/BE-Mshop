<?php

namespace App\Repository\Order;

use App\Order;

class OrderRepository implements OrderRepositoryInterface

{
    protected $model;
    public function __construct(Order $model)
    {
        $this->model = $model;
    }

    public function create($request)
    {

        // $order = $this->model::create($request->all());
        // $products = $request->get('products');
        // $orderDetails = [];
        // $productIds = [];
        // $totalAmount = 0;
        // $errors = [];
        // foreach ($products as $rowId => $product) {

        //     if (in_array($product['product_id'], $productIds)) {
        //         $errors['products'][$rowId] = 'duplicated products';
        //         continue;
        //     }
        //     $price = $product['price'];
        //     // dd($price);

        //     $productIds[] = $product['product_id'];
        //     $quantity = $product['quantity'];
        //     // Product::find($product)->price;
        //     $total =  $price * $quantity;
        //     $totalAmount += $total;
        //     $orderDetails[] = [
        //         'product_id' => $product,
        //         'quantity' => $quantity,
        //         'price' => $price,
        //         'total' => $total

        //     ];
        // }
        // // dd($orderDetails);
        // $order->total_amount = $totalAmount;
        // // dd($totalAmount);
        // $order->save();
        // $order->products()->attach($request->get('products'));
        // // dd($order);

        // return redirect(route('admin.orders.show',  $order));
    }
}
