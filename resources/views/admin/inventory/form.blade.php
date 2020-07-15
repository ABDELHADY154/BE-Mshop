@csrf
<div class="form-group">
    <label for="product">Product</label>
    <select name="product_id" id="product" class="form-control">
        <option value="">Not set</option>
        @foreach($products as $product)
        @if(isset($inventory) && $product->id == $inventory->product->id)
        <option value="{{ $product->id }}" selected>{{$product->id}}|{{$product->name }}</option>
        @else
        <option value="{{ $product->id }}">{{$product->id}}|{{$product->name }}</option>
        @endif
        @endforeach
    </select>
    @if ($errors->first('product_id'))
    <span class="text-danger">
        {{ $errors->first('product_id') }}
    </span>
    @endif
</div>
<div class="form-group">
    <label for="vendor">Vendor</label>
    <select name="user_id" id="vendor" class="form-control">
        <option value="">Not set</option>
        @foreach($users as $user)
        @if(!$user->is_admin)
        @if(isset($inventory) && $user->id == $inventory->user->id)
        <option value="{{ $user->id }}" selected>{{$user->id}}|{{$user->name }}</option>
        @else
        <option value="{{ $user->id }}">{{$user->id}}|{{$user->name }}</option>
        @endif
        @endif
        @endforeach
    </select>
    @if ($errors->first('user_id'))
    <span class="text-danger">
        {{ $errors->first('user_id') }}
    </span>
    @endif
</div>
<div class="form-group">
    <label for="quantity">Quantity</label>
    <input type="number" name="quantity" id="quantity" class="form-control"
        value="{{ isset($inventory)?$inventory->quantity : '' }}">
    @if ($errors->first('quantity'))
    <span class="text-danger">
        {{ $errors->first('quantity') }}
    </span>
    @endif
    <label for="price">Price</label>
    <input type="number" name="price" id="price" class="form-control"
        value="{{ isset($inventory)?$inventory->price : '' }}">
    @if ($errors->first('price'))
    <span class="text-danger">
        {{ $errors->first('price') }}
    </span>
    @endif

</div>
<div class="text-center">
    <button type="submit" class="btn btn-success">Save</button>
</div>
