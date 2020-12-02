@extends('layouts.admin.master')

@section('title', 'Dashboard')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="float-right page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Vendors</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
                <h5 class="page-title">Dashboard</h5>
            </div>
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card mini-stat m-b-30 bg-dash-1">
                    <a href="{{ url('admin/vendor') }}">
                        <div class="p-3 text-white">
                            <h6 class="text-uppercase mb-0 dash-heading">Total Vendors</h6>
                        </div>
                        <div class="card-body">
                            <div class="mini-stat-icon">
                                <i class="mdi mdi-cube-outline float-right mb-0"></i>
                            </div>
                            <div class="mt-0">
                                <h5 class="m-0 dash-text-count">
                                    @if (isset($vendors))
                                        {{ $vendors }}
                                    @endif
                                    <i class="mdi mdi-arrow-up text-success ml-1"></i>
                                </h5>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card mini-stat m-b-30 bg-dash-1">
                    <a href="{{ url('admin/store') }}">
                        <div class="p-3 text-white">
                            <h6 class="text-uppercase mb-0 dash-heading">Total Stores</h6>
                        </div>
                        <div class="card-body">
                            <div class="mini-stat-icon">
                                <i class="mdi mdi-account-network float-right mb-0"></i>
                            </div>
                            <div class="mt-0 text-muted">
                                <h5 class="m-0 dash-text-count">
                                    @if (isset($stores))
                                        {{ $stores }}
                                    @endif

                                    <i class="mdi mdi-arrow-up text-success ml-1"></i>
                                </h5>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card mini-stat m-b-30 bg-dash-1">
                    <a href="{{ url('admin/product') }}">

                        <div class="p-3 text-white">
                            <h6 class="text-uppercase mb-0 dash-heading">Total Products</h6>
                        </div>
                        <div class="card-body">
                            <div class="mini-stat-icon">
                                <i class="mdi mdi-help-circle-outline float-right mb-0"></i>
                            </div>
                            <div class="mt-0 text-muted">
                                <h5 class="m-0 dash-text-count">
                                    @if (isset($products))
                                        {{ $products }}
                                    @endif
                                    <i class="mdi mdi-arrow-up text-success ml-1"></i>
                                </h5>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card mini-stat m-b-30 bg-dash-1">
                    <a href="{{ url('admin/user') }}">

                        <div class="p-3 text-white">
                            <h6 class="text-uppercase mb-0 dash-heading">Total Users</h6>
                        </div>
                        <div class="card-body">
                            <div class="mini-stat-icon">
                                <i class="mdi mdi-cube-unfolded float-right mb-0"></i>
                            </div>
                            <div class="mt-0 text-muted">
                                <h5 class="m-0 dash-text-count">
                                    @if (isset($users))
                                        {{ $users }}
                                    @endif

                                    <i class="mdi mdi-arrow-up text-success ml-1"></i>
                                </h5>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- end row -->
        <div class="row">
            @if (isset($userRecent))
                <div class="col-xl-6">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <h4 class="mt-0 header-title mb-4">Recent Joined Users</h4>
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Email Id</th>
                                            <th>Profile</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($userRecent as $key => $item)
                                            <tr>
                                                <td>
                                                    {{ $key + 1 }}
                                                </td>
                                                <td>
                                                    {{ $item->name }}
                                                </td>
                                                <td>
                                                    {{ $item->email }}
                                                </td>
                                                <td>
                                                    <img src="{{ $item->profile_picture }}" height="50px;">
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @if (isset($vendorRecent))
                <div class="col-xl-6">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <h4 class="mt-0 header-title mb-4">Recent Joined Vendors</h4>
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Business Name</th>
                                            <th>Business Email</th>
                                            <th>Avatar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($vendorRecent as $key => $item)
                                            <tr>
                                                <td>
                                                    {{ $key + 1 }}
                                                </td>
                                                <td>
                                                    {{ $item->business_name }}
                                                </td>
                                                <td>
                                                    {{ $item->business_email }}
                                                </td>
                                                <td>
                                                    <img src="{{ $item->vendor_avatar }}" height="50px;">
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>

    </div>
@endsection
@section('js')
    <script src="{{ asset('admin/pages/dashboard.js') }}"></script>
@endsection
