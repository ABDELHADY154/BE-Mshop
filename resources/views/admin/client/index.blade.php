@extends('layouts.app')

@section('title', 'All Clients')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Clients</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">admin</a></li>
                        <li class="breadcrumb-item active">All Clients</li>
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

                    {{-- <div class="col">
                <form>
                    <select name="limit" id="">
                        <option value="5" {{ Request::get('limit') == 5? 'selected' : '' }}>5</option>
                    <option value="10" {{ Request::get('limit') == 10? 'selected' : '' }}>10</option>
                    <option value="25" {{ Request::get('limit') == 25? 'selected' : '' }}>25</option>
                    </select>
                    <button type="submit">update</button>
                    </form>
                </div> --}}

                @livewire('client-table')

                <div class=" text-right">
                    {{-- {!! $clients->links() !!} --}}
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
    $(document).on('click','.delete',function (e) {
    e.preventDefault();
    Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
        }).then((result) => {


            $.ajax({
                type: "POST",
                url: $(this).data('url'),
                data: {
                    _method:'DELETE',
                    _token: '{{csrf_token()}}'
                },
                // dataType: "dataType",
                success: function (response) {
                    if (result.isConfirmed) {

                       Swal.fire({
                            // position: 'center',
                            // icon: 'success',
                            title: 'Item Deleted',
                            showConfirmButton: false,
                            timer: 10500
                            })
                                e.preventDefault();
                                location.reload();

                }}
             }
            );

                 }
            )
        })


</script>
@endsection
