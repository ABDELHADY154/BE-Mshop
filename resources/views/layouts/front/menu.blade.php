@if(Route::currentRouteName()=='home.index')
@php
$maxPrice = 0;
@endphp

@foreach($Allproducts as $productmin)
@php
if ($maxPrice < $productmin->price) {
    $maxPrice = $productmin->price;
    }
    @endphp
    @endforeach
    <label for="sort" style="color: white">view per page</label>
    <form class="form-inline" id="sort">
        <select name="limit" id="" class="form-control">
            <option value="5" {{ Request::get('limit') == 5? 'selected' : '' }}>5</option>
            <option value="10" {{ Request::get('limit') == 10? 'selected' : '' }}>10</option>
            <option value="25" {{ Request::get('limit') == 25? 'selected' : '' }}>25</option>
        </select>
        <button type="submit" class="btn btn-primary">update</button>
    </form>
    <li class="nav-item">
        <h3 style="color: white">Filter by:</h3>
    </li>
    <form action="" method="GET">
        <div class="form-group">
            <label for="categories" style="color: white">By Category :</label>
            <select multiple name="category" class="form-control" id="categories" size="8">
                @foreach ($categories as$category )
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="slidecontainer">
            <p style="color: white">Price: <span id="demo"></span> $</p>
            <input type="range" min="1" max="{{$maxPrice}}" value="0" class="slider" id="myRange" onchange="change();"
                name="price">
        </div>
        <button type="submit" class="btn btn-primary">update</button>
    </form>
    @else
    <li class="nav-item d-none d-sm-inline-block">
        <a href="/" class="nav-link"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i>
            Back </a>
    </li>
    @endif
