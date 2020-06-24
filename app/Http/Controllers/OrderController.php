<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetail;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q = $request->query('search');

        return view('admin.order.index', [
            'orders' => Order::with(['products'])
                ->where('name', 'LIKE', "%{$q}%")
                ->paginate($request->query('limit', 5))
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.order.create', [
            'orders' => Order::with(['products'])->get(),
            'users' => User::all(),
            'products' => Product::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = Order::create($request->all());
        $quantities = $request->get('quantity');
        $products = $request->get('product_id');
        $orderDetails = [];
        $totalAmount = 0;
        foreach ($products as $key => $product) {
            $price = Product::find($product)->price;
            $total =  $price * $quantities[$key];
            $totalAmount += $total;
            $orderDetails[] = [
                'product_id' => $product,
                'quantity' => $quantities[$key],
                'price' => $price,
                'total' => $total

            ];
        }

        $order->total_amount = $totalAmount;
        // dd($orderDetails);
        $order->save();
        $order->products()->attach($orderDetails);
        // $totalAmount = $order->product()->sum('total');
        // dd($totalAmount);
        return redirect(route('admin.orders.show',  $order));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('admin.order.show', [
            'order' => $order
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        // $quantities = $request->get('quantity');
        return view('admin.order.edit', [
            'orders' => $order,
            // 'quantity' => $quantities,
            'products' => Product::all(),
            'users' => User::all()

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $quantities = $request->get('quantity');
        $products = $request->get('product_id');
        // $orderDetails = [];
        $totalAmount = $order->total_amount;
        foreach ($products as $key => $product) {
            $price = Product::find($product)->price;
            $total =  $price * $quantities[$key];
            $totalAmount += $total;
            $orderDetails[] = [
                'product_id' => $product,
                'quantity' => $quantities[$key],
                'price' => $price,
                'total' => $total

            ];
        }
        $order->total_amount = $totalAmount;
        $order->save();
        $order->products()->sync($orderDetails);
        $order->update($request->all());

        return redirect(route('admin.orders.show', $order));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    # code...
    public function destroy(Order $order)
    {

        $order->delete();

        // $order->products()->detach();


        return redirect(route('admin.orders.index'));
    }
}
