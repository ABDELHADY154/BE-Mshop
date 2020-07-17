@csrf
<div class="form-group">
    <label for="category_id">Category</label>
    <select name="category_id" id="category_id" class="form-control">
        <option value="">Not set</option>
        @foreach($categories as $category)
        @if(isset($product) && $category->id == $product->category_id)
        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
        @else
        <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endif
        @endforeach
    </select>
    @if ($errors->first('category_id'))
    <span class="text-danger">
        {{ $errors->first('category_id') }}
    </span>
    @endif
</div>
<div class="form-group">
    <label for="user_id">User</label>
    <select name="user_id" id="user_id" class="form-control">
        <option value="">Not set</option>
        @foreach($users as $user)
        @if(isset($product) && $user->id == $product->user_id)
        <option value="{{ $user->id }}" selected>{{ $user->name }}</option>
        @else
        <option value="{{ $user->id }}">{{ $user->name }}</option>
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
    <label for="name">Name</label>
    <input type="text" name="name" id="name" class="form-control" value="{{ isset($product)?$product->name : '' }}">
    @if ($errors->first('name'))
    <span class="text-danger">
        {{ $errors->first('name') }}
    </span>
    @endif

</div>
<div class="form-group">
    <label for="price">price</label>
    <input type="text" name="price" id="price" class="form-control" value="{{ isset($product)?$product->price : '' }}">
    @if ($errors->first('price'))
    <span class="text-danger">
        {{ $errors->first('price') }}
    </span>
    @endif

</div>
<div class="form-group">
    <label for="quantity">quantity</label>
    <input type="text" name="quantity" id="quantity" class="form-control"
        value="{{ isset($product)?$product->quantity : '' }}">
    @if ($errors->first('quantity'))
    <span class="text-danger">
        {{ $errors->first('quantity') }}
    </span>
    @endif

</div>
<div class="form-group">
    <label for="desc">Description</label>
    <textarea name="desc" id="desc" cols="30" rows="10" class="form-control">
        {{ isset($product)?$product->desc : '' }}
    </textarea>
</div>
<form action="{{ route('admin.image.upload.post') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">

        <div class="col-md-6">
            <input type="file" name="image" class="form-control">
        </div>
        @if ($errors->first('image'))
        <span class="text-danger">
            {{ $errors->first('image') }}
        </span>
        @endif
        <div class="col-md-6">
            <button type="submit" class="btn btn-success d-block">Save</button>
        </div>

    </div>
</form>
{{-- <div class="text-center">
    <button type="submit" class="btn btn-success">Save</button>
</div> --}}
