@extends('layouts.front')

@section('title', 'Home')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row form-group">
                <form class="form-inline">
                    <input class="form-control" name="search" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-success " type="submit">Search</button>
                </form>
            </div>
            <div class="row row-cols-1 row-cols-md-3">
                @if(isset($_GET['category'])||isset($_GET['price']))
                @foreach ($productsFilterd as $productf)
                <div class="col mb-4 text-center">
                    <div class="card">
                        <img src="{{$productf->image}}" class="card-img-top" alt="productf-image">
                        <div class="card-body">
                            <h5 class="card-title">{{$productf->name}}</h5>
                            <p class="card-text">{{$productf->price}} $</p>
                            <a href="{{route('admin.products.show',$productf)}}" class="btn btn-primary">Show
                                Product</a>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                @foreach ($products as $product)
                <div class="col mb-4 text-center">
                    <div class="card">
                        <img src="{{$product->image}}" class="card-img-top" alt="product-image">
                        <div class="card-body">
                            <h5 class="card-title">{{$product->name}}</h5>
                            <p class="card-text">{{$product->price}} $</p>
                            <a href="{{route('admin.products.show',$product)}}" class="btn btn-primary">Show Product</a>
                        </div>
                    </div>
                </div>
                @endforeach

                @endif

            </div>
            @if(isset($_GET['category']))
            {!! $productsFilterd->links() !!}
            @else
            {!! $products->links() !!}

            @endif

            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
@endsection
@section('js')
<script>
    function change() {
    var slider = document.getElementById("myRange");
    var output = document.getElementById("demo");
    output.innerHTML = slider.value; // Display the default slider value

    // Update the current slider value (each time you drag the slider handle)
    slider.oninput = function() {
    output.innerHTML = this.value;
    }}
</script>

@endsection
