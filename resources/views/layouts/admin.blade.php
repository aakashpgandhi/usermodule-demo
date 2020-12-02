@extends('layouts.admin.master')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="float-right page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Celt English</a></li>
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
                    <div class="p-3 text-white">
                        <h6 class="text-uppercase mb-0 dash-heading">Total Topics</h6>
                    </div>
                    <div class="card-body">
                        <div class="mini-stat-icon">
                            <i class="mdi mdi-cube-outline float-right mb-0"></i>
                        </div>
                        <div class="mt-0">
                            <h5 class="m-0 dash-text-count">111<i class="mdi mdi-arrow-up text-success ml-1"></i></h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card mini-stat m-b-30 bg-dash-1">
                    <div class="p-3 text-white">
                        <h6 class="text-uppercase mb-0 dash-heading">Total Users</h6>
                    </div>
                    <div class="card-body">
                        <div class="mini-stat-icon">
                            <i class="mdi mdi-account-network float-right mb-0"></i>
                        </div>
                        <div class="mt-0 text-muted">
                            <h5 class="m-0 dash-text-count">3567<i class="mdi mdi-arrow-up text-success ml-1"></i></h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card mini-stat m-b-30 bg-dash-1">
                    <div class="p-3 text-white">
                        <h6 class="text-uppercase mb-0 dash-heading">Total Question</h6>
                    </div>
                    <div class="card-body">
                        <div class="mini-stat-icon">
                            <i class="mdi mdi-help-circle-outline float-right mb-0"></i>
                        </div>
                        <div class="mt-0 text-muted">
                            <h5 class="m-0 dash-text-count">12<i class="mdi mdi-arrow-up text-success ml-1"></i></h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card mini-stat m-b-30 bg-dash-1">
                    <div class="p-3 text-white">
                        <h6 class="text-uppercase mb-0 dash-heading">Total Sub Topic</h6>
                    </div>
                    <div class="card-body">
                        <div class="mini-stat-icon">
                            <i class="mdi mdi-cube-unfolded float-right mb-0"></i>
                        </div>
                        <div class="mt-0 text-muted">
                            <h5 class="m-0 dash-text-count">11<i class="mdi mdi-arrow-up text-success ml-1"></i></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <h4 class="mt-0 header-title mb-4">Recent Joined Users</h4>
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Image</th>
                                    <th>EmailId</th>
                                    <th>Country</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('js')
    <script src="{{ asset('admin/pages/dashboard.js') }}"></script>
@endsection
