<?php

namespace App\Http\Controllers;

use App\Client;
use App\Http\Requests\OrderRequest;
use App\Order;
use App\OrderDetail;
use App\Product;
use App\Repository\Order\OrderRepositoryInterface;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class OrderController extends Controller
{
    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q = $request->query('search');

        return view('admin.order.index', [
            'orders' => Order::with(['products', 'clients'])
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
            // 'orders' => Order::with(['products'])->get(),
            'clients' => Client::all(),
            'products' => Product::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request)
    {
        // $this->orderRepository->create($request);
        $order = Order::create($request->all());
        $products = $request->get('products');
        $orderDetails = [];
        $productIds = [];
        $totalAmount = 0;
        $errors = [];
        foreach ($products as $rowId => $product) {

            if (in_array($product['product_id'], $productIds)) {
                $errors['products'][$rowId] = 'duplicated products';
                continue;
            }
            $price = $product['price'];

            $productIds[] = $product['product_id'];
            $quantity = $product['quantity'];
            $total =  $price * $quantity;
            $totalAmount += $total;
            $orderDetails[] = [
                'product_id' => $product,
                'quantity' => $quantity,
                'price' => $price,
                'total' => $total

            ];
        }
        $order->total_amount = $totalAmount;
        $order->save();
        $order->products()->attach($request->get('products'));
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
            'clients' => Client::all()

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(OrderRequest $request, Order $order)
    {
        $products = $request->get('products');
        $orderDetails = [];
        $productIds = [];
        $totalAmount = 0;
        $errors = [];
        foreach ($products as $rowId => $product) {

            if (in_array($product['product_id'], $productIds)) {
                $errors['products'][$rowId] = 'duplicated products';
                continue;
            }
            $price = $product['price'];
            $productIds[] = $product['product_id'];
            $quantity = $product['quantity'];
            $total =  $price * $quantity;
            $totalAmount += $total;
            $orderDetails[] = [
                'product_id' => $product,
                'quantity' => $quantity,
                'price' => $price,
                'total' => $total

            ];
        }
        // dd($orderDetails);
        $order->total_amount = $totalAmount;
        // dd($totalAmount);
        $order->save();
        $order->products()->sync($request->get('products'));
        $order->update($request->all());
        return redirect(route('admin.orders.show',  $order));
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
