<?php

namespace App\Http\Controllers;

use App\Category;
use App\Client;
use App\Order;
use App\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $orders = Order::all();
        $products = Product::all();
        $clients = Client::all();
        $categories = Category::all();
        $orderCount = 0;
        $total = 0;
        foreach ($orders as $order) {
            $total += $order->total_amount;
            $orderCount++;
        }
        $productsCount = 0;
        foreach ($products as $product) {
            $productsCount++;
        }
        $clientsCount = 0;
        foreach ($clients as $client) {
            $clientsCount++;
        }
        $categoryCount = 0;
        foreach ($categories as $category) {
            $categoryCount++;
        }
        return view('admin.dashboard', [
            'orderCount' => $orderCount,
            'productsCount' => $productsCount,
            'clientsCount' => $clientsCount,
            'categoryCount' => $categoryCount,
            'total' => $total,
            'products' => $products,
        ]);
    }
}
