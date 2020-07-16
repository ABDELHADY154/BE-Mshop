@extends('layouts.app')

@section('title', 'All Products')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Products</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">admin</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">Products</a></li>
                        <li class="breadcrumb-item active">Show product: {{ $product->name }}</li>
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
                    <h2>Title: <br> {{ $product->name }}</h2>
                    <p>Price: <br> {{ $product->price }}$</p>
                    <hr>
                    <p>Description: <br> {{ $product->desc }}</p>
                    <p>quantity availble: <br> {{ $product->quantity }} item</p>
                    @if ($product->category)
                    Category: <a
                        href="{{ route('admin.categories.show', $product->category) }}">{{ $product->category->name }}</a>
                    @endif
                    {{-- <p>Description: <br> {{ $product->desc }}</p> --}}
                    @if($product->user)
                    <p>merchant : <br> {{ $product->user->name }} </p>
                    <p>contact merchant: <br> {{ $product->user->email }}</p>
                    @endif
                    <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-primary">Edit</a>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
@endsection
