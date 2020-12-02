@extends('layouts.vendor.master')

@section('title', 'Dashboard Vendor')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="float-right page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Vendors</a></li>
                        <li class="breadcrumb-item active">Dashboard Vendor</li>
                    </ol>
                </div>
                <h5 class="page-title">Dashboard Vendor</h5>
            </div>
        </div>

    </div>
@endsection
@section('js')
    <script src="{{ asset('admin/pages/dashboard.js') }}"></script>
@endsection
