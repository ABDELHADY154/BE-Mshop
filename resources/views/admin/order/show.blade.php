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
                    <div class="text-right">
                        <form action="{{route('admin.orders.destroy', $order) }}" method="post" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>

                    </div>
                    <h2>Order #: {{ $order->id }}</h2>
                    <p>Client #: {{ $order->clients->id}}</p>
                    <p>Client Name: {{ $order->clients->name }}</p>
                    <hr>
                    <h3>Products</h3>
                    <table class="table table-bordered">
                        <thead>

                            <tr class="text-center">
                                <th>Name</th>
                                <th>Price</th>{{--client name --}}
                                <th>quantity(item)</th>
                                <th>Total Item Price</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>

                            @foreach($order->products as $orderdetail)


                            <tr class="text-center">

                                <td>{{ $orderdetail->name }}</td>
                                <td>{{ number_format($orderdetail->price, 0, '', ',')  }} $</td>
                                <td>{{number_format($orderdetail->pivot->quantity, 0, '', ',')}}</td>
                                <td>{{number_format($orderdetail->pivot->total, 0, '', ',')}}</td>

                                <td>
                                    <a href="{{ route('admin.products.show', $orderdetail->id) }}"
                                        class="btn btn-info">Show Product</a>
                                    {{-- <form action="{{route('admin.orders.destroy',$order ) }}" method="post"
                                    class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                    </form> --}}
                                </td>
                                <br>
                            </tr>


                            @endforeach
                            <hr>

                            <tr>
                                <td>
                                    <h3>Total price</h3>
                                </td>
                                <td>
                                    <h3>{{number_format($order->total_amount, 0, '', ',')}} $</h3>
                                </td>
                            </tr>


                        </tbody>
                    </table>



                    <a href="{{ route('admin.orders.edit', $order) }}" class="btn btn-primary">Edit</a>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
@endsection
