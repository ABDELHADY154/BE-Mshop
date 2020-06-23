@extends('layouts.app')

@section('title', 'All Orders')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Orders</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">admin</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.orders.index') }}">Orders</a></li>
                        <li class="breadcrumb-item active">Show Order: {{ $order->id }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="card card-body">
                    <h2>Order #: {{ $order->id }}</h2>
                    <p>Client #: {{ $order->id }}</p>
                    <p>Client Name: {{ $order->name }}</p>
                    <hr>
                    <p>Products</p>
                    <table class="table table-bordered">
                        <thead>

                            <tr>
                                <th>Name</th>
                                <th>Price</th>{{--client name --}}
                                <th>quantity</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $totalPrice = 0;
                            $totalQuantity = 0;
                            $total = 0;

                            ?>
                            @foreach($order->product as $orderdetail)


                            <tr>



                                <td>{{ $orderdetail->name }}</td>
                                <td>{{ $orderdetail->price  }} $</td>
                                <td>{{ $orderdetail->quantity }} item</td>
                                <?php
                                $totalPrice = $orderdetail->price;
                                $totalQuantity = $orderdetail->quantity;
                                $total += ($totalPrice*$totalQuantity);

                               ?>
                                <td>
                                    <a href="{{ route('admin.products.show', $orderdetail->id) }}"
                                        class="btn btn-info">Show</a>

                                    <form action="{{route('admin.orders.destroy', $orderdetail->id) }}" method="post"
                                        class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>

                            </tr>

                            @endforeach
                            <hr>

                            <tr>
                                <td>
                                    <h3>Total price</h3>
                                </td>
                                <td>
                                    <h3>{{number_format($total, 0, '', ',')}} $</h3>
                                </td>
                            </tr>
                        </tbody>
                    </table>





                    {{-- <a href="{{ route('admin.orders.edit', $order) }}" class="btn btn-primary">Edit</a> --}}
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
@endsection
