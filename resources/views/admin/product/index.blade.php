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
                        <li class="breadcrumb-item"><a href="/">admin</a></li>
                        <li class="breadcrumb-item active">All Products</li>
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
                    <div class="row">
                        <div class="col">
                            <form>
                                <select name="limit" id="">
                                    <option value="5" {{ Request::get('limit') == 5? 'selected' : '' }}>5</option>
                                    <option value="10" {{ Request::get('limit') == 10? 'selected' : '' }}>10</option>
                                    <option value="25" {{ Request::get('limit') == 25? 'selected' : '' }}>25</option>
                                </select>
                                <button type="submit">update</button>
                            </form>
                        </div>
                        <div class="col text-center">
                            <form>
                                <input type="text" name="search" class="form-control">
                                <button type="submit" class="btn btn-info">Searching</button>
                                <a href="{{ route('admin.products.index') }}">Reset</a>
                            </form>
                        </div>
                        <div class="col text-right">
                            <a href="{{ route('admin.products.create') }}" class="btn btn-success">Create</a>
                        </div>
                    </div>



                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Category</th>

                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->price }} $</td>
                                <td>{{ $product->quantity }}, item</td>
                                <td>
                                    @if ($product->category)
                                    <a href="{{ route('admin.categories.show', $product->category) }}"
                                        class="link-item">{{ $product->category->name }}</a>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('admin.products.show', $product) }}" class="btn btn-info">Show</a>
                                    <a href="{{ route('admin.products.edit', $product) }}"
                                        class="btn btn-primary">Edit</a>
                                    <form action="{{ route('admin.products.destroy', $product) }}" method="post"
                                        class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="text-right">
                        {!! $products->links() !!}
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
@endsection
