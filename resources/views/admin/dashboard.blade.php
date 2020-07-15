@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h4 class="text-left">Welcome, {{Auth::user()->name}}</h4> --}}
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Dashboard</li>
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
                <div class="card card-body" style="min-height: 600px">
                    <h1></h1>
                    <div class="row">
                        <div class="col-lg col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{$orderCount}}</h3>

                                    <p>Orders</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="{{route('admin.orders.index')}}" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>{{$productsCount}}</h3>

                                    <p>Products</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="{{route('admin.products.index')}}" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>{{$clientsCount}}</h3>

                                    <p>Clients</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="{{route('admin.clients.index')}}" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>{{$categoryCount}}</h3>

                                    <p>Categories</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="{{route('admin.categories.index')}}" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>{{ number_format($total, 0, '', ',')}} $</h3>

                                    <p>Sales</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-shopping-cart"></i>
                                </div>
                                <a href="{{route('admin.orders.index')}}" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <!-- ./col -->
                    </div>
                    {{-- search for products form  --}}

                    <div class="">
                        <form class="form-inline d-flex justify-content-center md-form form-sm mt-0">
                            {{-- <i class="fas fa-search" aria-hidden="true"></i> --}}
                            <input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Search"
                                aria-label="Search" id="myInput" onkeyup="myFunction()">
                        </form>
                        <ul id="myUL" class="w-100 m-auto">
                            @foreach ($products as $product)
                            <li style="display: none">
                                <a href="{{route('admin.inventories.create',['productID'=> $product->id])}}">
                                    {{$product->name}}
                                    <button class="btn btn-primary">Add To Inventory</button>

                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>

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
    function myFunction() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        }else {
            li[i].style.display = "none";
        }

    }
    if(!(txtValue.toUpperCase().indexOf(filter)))
        {
            ul.style.display="none";
        }else{
            ul.style.display="";
        }
}
</script>
@endsection
