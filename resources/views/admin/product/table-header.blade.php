<div class="row">
    <form class="text-left d-block" id="myForm">
        <div class="form-row align-items-center">
            <div class="col-auto mr-3">
                <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Sort</label>
                <select class="custom-select mr-sm-2 d-block" id="inlineFormCustomSelect" name="limit">
                    <option value=" 5" {{ Request::get('limit') == 5?'selected' : '' }}>5</option>
                    <option value="10" {{ Request::get('limit') == 10? 'selected' : '' }}>10</option>
                    <option value="25" {{ Request::get('limit') == 25? 'selected' : '' }}>25</option>
                </select>
            </div>
        </div>
    </form>
    <div class="" style="margin-bottom: -3%">
        <a href="{{ route('admin.products.create') }}" class="btn btn-success">Create New Product</a>
    </div>
</div>
<script>
    $(document).on('change','#inlineFormCustomSelect',function () {
        $("#myForm").submit();
     })
</script>
