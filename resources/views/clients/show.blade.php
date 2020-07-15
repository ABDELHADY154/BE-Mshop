@extends('layouts.front')

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
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">{{ $product->name }}</li>
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
                    <div class="col text-right"><a class=" btn btn-primary" id="click"
                            href="{{route('home.create')}}">Purchase</a></div>

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





                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
@endsection
@section('js')
<script>
    $(document).on('click','#click',function (e) {
            e.preventDefault();
            Swal.fire({
        icon: 'success',
        title: 'Done',
        text: 'Thanks For Dealing With M-shop',
        footer: '<a href="/">Home</a>'
})
    })
</script>
@endsection
