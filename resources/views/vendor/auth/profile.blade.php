@extends('layouts.vendor.master')

@section('title', 'Vendor')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="float-right page-breadcrumb">
                    <ol class="breadcrumb">
                        {{-- <li class="breadcrumb-item"><a href="{{ route('home') }}">Admin</a></li> --}}
                        <li class="breadcrumb-item"><a href="{{ route('vendor-home') }}">Vendor</a></li>
                        <li class="breadcrumb-item active">Add</li>
                    </ol>
                </div>
                <h5 class="page-title">Vendor Management</h5>
            </div>
        </div>

        <div class="row justify-content-md-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <span class="pull-left">
                            <h5 class="m-1">Vendor Profile</h5>
                        </span>
                   
                    </div>
                    <div class="card-body">
                        {{-- action="{{ route('profile.vendor', $vendor->id)}}" --}}
                        <form  id="vendor_profile" name="vendor_profile" method="post" enctype="multipart/form-data" class="needs-validation vendor_form" novalidate>
                            @csrf
                   
                        
                        @csrf

                            <div class="row">
                                <div class="form-group col-6">
                                    <label class="control-label" for="business_name">Business Name</label>

                                    <input type="text" class="form-control{{ $errors->has('business_name') ? ' is-invalid' : '' }}" 
                                    name="business_name" id="business_name" value="{{ old('business_name',isset($vendor) ? $vendor->business_name : '')}}" 
                                    placeholder="Enter a business name" required>

                                    <span class="invalid-feedback" role="alert">
                                        @if ($errors->has('business_name'))
                                            <strong>{{ $errors->first('business_name') }}</strong>
                                        @else
                                            <strong class="error-text">This business name field is required.</strong>
                                        @endif
                                    </span> 
                                </div>

                                <div class="form-group col">
                                    <label class="control-label" for="vendor_avatar">Vendor Avatar</label>
                                    @php $required = "" @endphp
                                    @if(isset($vendor->vendor_avatar))
                                        @php $required = "" @endphp
                                    @else
                                        @php $required = "required" @endphp
                                    @endif
                                    <input type="file" class="form-control{{ $errors->has('vendor_avatar') ? ' is-invalid' : '' }}" 
                                    name="vendor_avatar" id="vendor_avatar" value="{{ old('vendor_avatar',isset($vendor) ? $vendor->vendor_avatar : '')}}" 
                                    {{$required}}>

                                    <span class="invalid-feedback" role="alert">
                                        @if ($errors->has('vendor_avatar'))
                                            <strong>{{ $errors->first('vendor_avatar') }}</strong>
                                        @else
                                            <strong>This vendor avatar field is required.</strong>
                                        @endif
                                    </span> 
                                </div>

                                @if(isset($vendor->vendor_avatar))
                                <div class="form-group col">
                                    <img src="{{ $vendor->vendor_avatar }}" width="100px" height="100px" class="my-3">&nbsp; &nbsp;  
                                </div>
                                @endif
                            </div>
                            
                            <div class="row">
                                <div class="form-group col">
                                    <label class="control-label" for="business_email">Business Email</label>

                                    <input type="email" class="form-control{{ $errors->has('business_email') ? ' is-invalid' : '' }}" 
                                    name="business_email" id="business_email" value="{{ old('business_email',isset($vendor) ? $vendor->business_email : '')}}" 
                                    placeholder="Enter a business email" required>

                                    <span class="invalid-feedback" role="alert">
                                        @if ($errors->has('business_email'))
                                            <strong>{{ $errors->first('business_email') }}</strong>
                                        @else
                                            <strong>This business email field is required.</strong>
                                        @endif
                                    </span> 
                                </div>

                                <div class="form-group col">
                                    <label class="control-label" for="phone_number">Business Phone Number</label>

                                    <input type="number" class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}" 
                                    name="phone_number" id="phone_number" value="{{ old('phone_number',isset($vendor) ? $vendor->phone_number : '')}}" 
                                    placeholder="Enter a phone number" required minlength="10" maxlength="10">

                                    <span class="invalid-feedback" role="alert">
                                        @if ($errors->has('phone_number'))
                                            <strong>{{ $errors->first('phone_number') }}</strong>
                                        @else
                                            <strong>This phone number field is required.</strong>
                                        @endif
                                    </span> 
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col">
                                    <label class="control-label" for="abn_no">ABN/ACN</label>

                                    <input type="text" class="form-control{{ $errors->has('abn_no') ? ' is-invalid' : '' }}" 
                                    name="abn_no" id="abn_no" value="{{ old('abn_no',isset($vendor) ? $vendor->abn_no : '')}}" 
                                    placeholder="Enter an ABN/ACN" required>

                                    <span class="invalid-feedback" role="alert">
                                        @if ($errors->has('abn_no'))
                                            <strong>{{ $errors->first('abn_no') }}</strong>
                                        @else
                                            <strong>This ABN/ACN field is required.</strong>
                                        @endif
                                    </span> 
                                </div>

                                <div class="form-group col">
                                    <label class="control-label" for="website">Website</label>

                                    <input type="text" class="form-control{{ $errors->has('website') ? ' is-invalid' : '' }}" 
                                    name="website" id="website" value="{{ old('website',isset($vendor) ? $vendor->website : '')}}" 
                                    placeholder="Enter an Website" required>

                                    <span class="invalid-feedback" role="alert">
                                        @if ($errors->has('website'))
                                            <strong>{{ $errors->first('website') }}</strong>
                                        @else
                                            <strong>This website field is required.</strong>
                                        @endif
                                    </span> 
                                </div>
                            </div>
                            <div class="row">
                            <div class="form-group col">
                                <label class="control-label" for="headquarters_address">Business Headquarters Address</label>

                                <input type="text" class="form-control{{ $errors->has('headquarters_address') ? ' is-invalid' : '' }}" 
                                name="headquarters_address" id="headquarters_address" value="{{ old('headquarters_address',isset($vendor) ? $vendor->headquarters_address : '')}}" 
                                placeholder="Enter an headquarters address" required>

                                <span class="invalid-feedback" role="alert">
                                    @if ($errors->has('headquarters_address'))
                                        <strong>{{ $errors->first('headquarters_address') }}</strong>
                                    @else
                                        <strong>This headquarters address field is required.</strong>
                                    @endif
                                </span> 
                            </div>

                            <div class="form-group col">
                                <label class="control-label" for="store_address">Business Store Address</label>

                                <input type="text" class="form-control{{ $errors->has('store_address') ? ' is-invalid' : '' }}" 
                                name="store_address" id="store_address" value="{{ old('store_address',isset($vendor) ? $vendor->store_address : '')}}" 
                                placeholder="Enter an store address" required>

                                <span class="invalid-feedback" role="alert">
                                    @if ($errors->has('store_address'))
                                        <strong>{{ $errors->first('store_address') }}</strong>
                                    @else
                                        <strong>This store address field is required.</strong>
                                    @endif
                                </span> 
                            </div>
                            </div>
                            <div class="row">
                            <div class="form-group col">
                                <label class="control-label" for="registration_document">Business Registration Document</label>
                                @php $required = "" @endphp
                                @if(isset($vendor->registration_document))
                                    @php $required = "" @endphp
                                @else
                                    @php $required = "required" @endphp
                                @endif
                                <input type="file" class="form-control{{ $errors->has('registration_document') ? ' is-invalid' : '' }}" 
                                name="registration_document" id="registration_document" 
                                value="{{ old('registration_document',isset($vendor) ? $vendor->registration_document : '')}}" 
                                placeholder="Enter an registration document" {{ $required }}>

                                <span class="invalid-feedback" role="alert">
                                    @if ($errors->has('registration_document'))
                                        <strong>{{ $errors->first('registration_document') }}</strong>
                                    @else
                                        <strong>This registration document field is required.</strong>
                                    @endif
                                </span> 
                            </div>
                           
                            @if(isset($vendor->registration_document))
                            <div class="form-group col">
                                <img src="{{ $vendor->registration_document }}" width="100px" height="100px" class="my-3">&nbsp; &nbsp;  
                            </div>
                            @endif
                        </div>
                            <div class="card-footer text-center">
                                <input type="hidden" name="vendor_id" value="{{ old('vendor_id',isset($vendor) ? $vendor->id : '') }}">
                                <button type="submit" class="btn btn-success">Save</button>
                                <span class="">
                                    <a href="{{ route('admin.vendor.index') }}" class="btn btn-primary">Cancel</a>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
            
    </div>
@endsection

@section('js')
   <script>
   var avatar_required = $('#vendor_avatar').prop('required');
   var document_required = $('#registration_document').prop('required');
   
    $('#vendor_profile').validate({
        rules: {
            business_name: 'required',
            business_email: {
                required: true,
                email: true
            },
            vendor_avatar : {
                required : avatar_required,
                extension: "jpg,jpeg,png",
            },
            phone_number: {
                    required: true,
                    digits: true,
                    minlength: 10,
                    maxlength: 10,
                },
            abn_no : 'required',
            website : {
                required : true,
                url :  true,
            },
            headquarters_address : 'required',
            store_address : 'required',
            registration_document : {
                required : document_required,
                extension : 'jpeg,png,jpg',
            },
        },
        messages: {
            business_name: {
                required : "The business name field is required.",
            },
            business_email: {
                required : "The business email field is required.",
                email : "Please enter valid business email.",
            },
            vendor_avatar: {
                required : "The vendor avatar field is required.",
                extension : "The vendor avatar must be a file of type: jpeg, png, jpg.",
            },
            phone_number : {
                required : "The phone number field is required.",
            },
            abn_no : {
                required : "The abn no field is required.",
            },
            website : {
                required : "The website field is required.",
                url: "The website format is invalid.",
            },
            headquarters_address : {
                required : "The headquarters address field is required.",
            },
            store_address : {
                required : "The store address field is required.",
            },
            registration_document : {
                required : "The registration document field is required.",
                extension: "The registration document must be a file of type: jpeg, png, jpg.",
            },
        },
        submitHandler: function(form) {
                var data = new FormData(document.getElementById("vendor_profile"));
                $.ajax({
                    type: 'POST',
                    url: "{{ url('profile/vendor') }}",
                    dataType: 'json',
                    data: data,
                    async: true,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.status == true) {
                            toastr.success(response.message, appName)                          
                            
                            // window.location = response.url;
                            setTimeout(function () {
                                window.location.reload(1);
                            }, 2000);  
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
            }
    });
   </script>
@endsection