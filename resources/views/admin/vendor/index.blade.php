@extends('layouts.admin.master')

@section('title', 'Vendor')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="float-right page-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Admin</a></li>
                    <li class="breadcrumb-item active">Vendor</li>
                </ol>
            </div>
            <h5 class="page-title">Vendor Management</h5>
        </div>
    </div>
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <span class="pull-left">
                            <h5 class="m-1">Vendor List</h5>
                        </span>
                        <span class="pull-right">
                            <a href="{{ route('admin.vendor.create')}}" class="btn btn-success">Add Vendor</a>
                        </span>
                    </div>
                    <div class="card-body">
                        @include('common.status')
                        <br>
                        {!! $dataTable->table(['class' => 'table table-bordered dt-responsive nowrap']) !!}        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')

    {!! $dataTable->scripts() !!}

    <script>
        $(document).on('click', '#vendor_delete', function() {
            var id = $(this).attr('vendor-id');

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                reverseButtons: true
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            type:'POST',
                            url:'vendor/'+id+'/delete',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success:function(data) {
                                if (data) {
                                    Swal.fire(
                                    'Deleted!',
                                    'vendor has been deleted.',
                                    'success'
                                    )

                                    window.LaravelDataTables["vendor-table"].draw();
                                }
                                
                            }
                        });
                    } else {
                        Swal.fire("Cancelled", "Your record is safe :)", "error");
                    }
                })
        });   
     
        function changeStatus(id , status){
            Swal.fire({
                title: 'Are you sure?',
                text: "You  be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Change it!',
                reverseButtons: true
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            type: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: " {{ route('admin.vendor.is_active') }}",
                            dataType: 'json',
                            data: { 'id':id ,'status' : status,'_token': '{{ csrf_token() }}'},                         
                            success: function(response) {
                                if (response.status == true) {
                                    toastr.success(response.message, appName)   
                                    window.LaravelDataTables["vendor-table"].draw();
                                    // setTimeout(function () {
                                    //     window.location.reload(1);
                                    // }, 2000);  
                                } else {
                                    toastr.error(response.error, appName)
                                    return false;
                                }
                                return false;
                            },
                            error: function(response) {
                                var i;
                                var res = response.responseJSON.errors;
                                $.each(res, function(key, value) {
                                    toastr.error(value, appName)
                                });
                            }
                        });
                        return false;
                    } else {
                        Swal.fire("Cancelled", "Your Status is safe :)", "error");
                    }
                })
        // });   
        }
               
    </script>
@endsection