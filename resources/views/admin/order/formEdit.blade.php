@csrf
<div class="form-group">
    <label for="client_id">Client</label>
    <select name="client_id" id="client_id" class="form-control">
        <option value="">Not set</option>
        @foreach($clients as $client)
        @if(isset($orders) && $client->id == $orders->client_id)
        <option value="{{$client->id }}" selected>{{ $client->name }}</option>
        @else
        <option value="{{ $client->id }}">{{ $client->name }}</option>
        @endif
        @endforeach
    </select>
    @if ($errors->first('client_id'))
    <span class="text-danger">
        {{ $errors->first('client_id') }}
    </span>
    @endif
</div>

<div class="row">
    <div class="col">
        <h3>Products
            @if ($errors->first('products'))
            <span class="text-danger">
                {{ $errors->first('products') }}
            </span>
            @endif

        </h3>

        <button type="button" class="btn btn-info" id="btn-add-new-product">Add Product</button>
    </div>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="products-list">
            @foreach ($orders->products as $order )
            {{-- {{$order}} --}}

            <tr id="product-{{$order->id}}">
                <td>
                    <select name="products[{{$order->id}}][product_id]" class="form-control input-product-product_id"
                        row-id="product-{{$order->id}}">
                        @foreach($products as $product)
                        @if(isset($orders) && $product->id == $order->id)
                        <option value="{{ $product->id }}" data-price="{{ $product->price }}" selected>
                            {{ $product->name }} | {{ $product->price }}
                        </option>
                        @endif
                        <option value="{{ $product->id }}" data-price="{{ $product->price }}">
                            {{ $product->name }} | {{ $product->price }}
                        </option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <input type="number" name="products[{{$order->id}}][quantity]" value="{{$order->pivot->quantity}}"
                        row-id="product-{{$order->id}}" class="form-control input-product-quantity">
                </td>
                <td>
                    <input type="number" name="products[{{$order->id}}][price]" readonly
                        class="form-control input-product-price" row-id="product-{{$order->id}}"
                        value="{{ $order->pivot->price }}">
                </td>
                <td>
                    <input type="number" name="products[{{$order->id}}][total]" readonly
                        class="form-control input-product-total" row-id="product-{{$order->id}}"
                        value="{{ $order->pivot->total }}">
                </td>
                <td>
                    <button type="button" class="btn btn-danger row-delete" row-id="product-{{$order->id}}">-</button>
                </td>
            </tr>
            @endforeach
            {{-- @endif --}}

        </tbody>

    </table>
</div>
<div class="text-center">
    <button type="submit" class="btn btn-success">Save</button>
</div>
@section('js')
<script>
    /**
         * Events
         */
        $(document).on('click', '#btn-add-new-product', function () {
            const rowId = Date.now();
            const productRow = `
            <tr id="product-${rowId}">
                <td>
                    <select name="products[${rowId}][product_id]"
                    row-id="product-${rowId}"
                    class="form-control  input-product-product_id">
                        @foreach($products as $product)
                            <option value="{{ $product->id }}" data-price="{{ $product->price }}">
                                {{ $product->name }} | {{ $product->price }}
                            </option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <input type="number"
                    name="products[${rowId}][quantity]"
                    value="1"
                    row-id="product-${rowId}"
                    class="form-control input-product-quantity">
                </td>
                <td>
                    <input type="number"
                    name="products[${rowId}][price]"
                    row-id="product-${rowId}"
                    value="{{ $products->first()->price }}"
                    readonly
                    class="form-control input-product-price">
                </td>
                <td>
                    <input type="number"
                    name="products[${rowId}][total]"
                    row-id="product-${rowId}"
                    readonly
                    value="{{ $products->first()->price }}"
                    class="form-control input-product-total">
                </td>
                <td>
                    <button type="button" class="btn btn-danger row-delete" row-id="product-${rowId}">-</button>
                </td>
            </tr>
            `;
            $('#products-list').append(productRow);
        });

        $(document).on('click', '.row-delete', function () {
            const rowId = '#' + $(this).attr('row-id');
            $(rowId).remove();
        });

        $(document).on('keyup', '.input-product-quantity', function () {
            const rowId = '#' + $(this).attr('row-id');
            calculateTotal(rowId);
        });

        $(document).on('change', '.input-product-product_id', function () {
            const rowId = '#' + $(this).attr('row-id'),
                price = $(this).children("option:selected").data('price')
            ;
            $(`${rowId} .input-product-price`).val(price);
            calculateTotal(rowId);
        });

        ///////////////////////////
        /**
         * Functions
         */

        /**
         * @param rowId
         */
        function calculateTotal(rowId) {
            const quantity = $(`${rowId} .input-product-quantity`).val(),
                price = $(`${rowId} .input-product-price`).val(),
                total = price * quantity;

            $(`${rowId} .input-product-total`).val(total);
        }
</script>

@endsection
