@extends('layouts.admin.master')

@section('title', 'Vendor')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="float-right page-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Admin</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.vendor.index') }}">Vendor</a></li>
                    <li class="breadcrumb-item active">View</li>
                </ol>
            </div>
            <h5 class="page-title">Vendor Management</h5>
        </div>
    </div>
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <span class="pull-left">
                            <h5 class="m-1">Vendor Detail</h5>
                        </span>
                        <span class="pull-right">
                            <a href="{{ route('admin.vendor.index')}}" class="btn btn-primary">Back</a>
                        </span>
                    </div>
                    <div class="card-body">
                        <table class="table table-condensed">
                            <tr>
                                <td><b>Business Name</b></td>
                                <td>{{ $vendor->business_name ?? '' }}</td>
                            </tr>
                            <tr>
                                <td><b>Business Email</b></td>
                                <td>{{ $vendor->business_email ?? '' }}</td>
                            </tr>
                            <tr>
                                <td><b>Vendor Avatar</b></td>
                                @if(isset($vendor->vendor_avatar))
                                <td><img src="{{ $vendor->vendor_avatar }}"  width="100px" height="100px" class=""></td>
                                @endif
                            </tr>
                            <tr>
                                <td><b>Business Phone Number</b></td>
                                <td>{{ $vendor->phone_number ?? '' }}</td>
                            </tr>
                            <tr>
                                <td><b>ABN/ACN</b></td>
                                <td>{{ $vendor->abn_no }}</td>
                            </tr>
                            <tr>
                                <td><b>Website</b></td>
                                <td>{{ $vendor->website ?? '' }}</td>
                            </tr>
                            <tr>
                                <td><b>Business Headquarters Address</b></td>
                                <td>{{ $vendor->headquarters_address ?? '' }}</td>
                            </tr>
                            <tr>
                                <td><b>Business Store Address</b></td>
                                <td>{{ $vendor->store_address ?? '' }}</td>
                            </tr>
                            <tr>
                                <td><b>Business Registration Document</b></td>
                                @if(isset($vendor->registration_document))
                                <td><img src="{{ $vendor->registration_document }}"  width="100px" height="100px" class=""></td>
                                @endif
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection