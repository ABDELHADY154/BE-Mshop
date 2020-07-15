@extends('layouts.app')

@section('title', 'Inventory')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Inventory</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">admin</a></li>
                        <li class="breadcrumb-item active">Inventory</li>
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
                    @livewire('inventory-table')
                    <div class=" text-right">
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
                            icon: 'success',
                            title: 'Item Deleted',
                            showConfirmButton: false,
                            timer: 100000
                            });
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
