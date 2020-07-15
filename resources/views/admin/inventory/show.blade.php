@extends('layouts.app')

@section('title', 'Inventory')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Inventory</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">admin</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.inventories.index') }}">Inventory</a></li>
                        <li class="breadcrumb-item active">Show Inventory: {{ $inventory->name }}</li>
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
                    <h2># {{ $inventory->id }}</h2>
                    <hr>
                    <h2>Pirce: {{ $inventory->price }} $</h2>
                    <hr>
                    <h2>Quantity: {{ $inventory->quantity }}</h2>
                    <hr>
                    <h2>Vendor: <a
                            href="{{route('admin.users.show',$inventory->user->id)}}">{{ $inventory->user->name }}</a>
                    </h2>
                    <hr>
                    <h2>Product: <a
                            href="{{route('admin.products.show',$inventory->product->id)}}">{{ $inventory->product->name }}</a>
                    </h2>
                    <hr>
                    <a href="{{ route('admin.inventories.edit', $inventory) }}" class="btn btn-primary">Edit</a>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
@endsection
