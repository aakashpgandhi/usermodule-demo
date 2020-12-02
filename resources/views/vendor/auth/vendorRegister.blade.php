<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Vendors Vendor</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="ThemeDesign" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" href="{{ asset('admin/images/favicon-16x16.png') }}">
    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/css/icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/css/toastr.min.css')}}" rel="stylesheet" type="text/css">
</head>
<body class="fixed-left">
    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner"></div>
        </div>
    </div>

    <!-- Begin page -->
    <div class="accountbg">

        <div class="content-center">
            <div class="content-desc-center">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5 col-md-8">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="text-center mt-0 m-b-15">
                                        <a href="{{ url('/') }}" class="logo logo-admin"><img
                                                src="{{ asset('admin/images/logo.png') }}" height="150" alt="logo"></a>
                                    </h3>
                                    <h4 class="text-muted text-center font-18"><b>Sign Up</b></h4>
                                    <div class="p-2">
                                        <form method="POST" id="vendor-register" name="vendor-register">
                                            @csrf
                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <label for="name" class="col-form-label text-md-left">
                                                        {{ ('Name') }}</label>

                                                    <input id="name" type="text"
                                                        class="form-control @error('name') is-invalid @enderror"
                                                        name="name" id="name" value="{{ old('name') }}"
                                                        autocomplete="name" autofocus placeholder="Business Name"
                                                        required>

                                                    @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <label for="email" class="col-form-label text-md-left">
                                                        {{ ('email') }}</label>
                                                    <input id="email" type="email"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        id="email" name="email" value="{{ old('email') }}"
                                                        autocomplete="email" placeholder="Business Email" required>

                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <label for="phone_number" class="col-form-label text-md-left">
                                                        {{ ('Business Phone Number') }}</label>
                                                    <input id="phone_number" type="text"
                                                        class="form-control @error('phone_number') is-invalid @enderror"
                                                        name="phone_number" placeholder="Business Phone Number"
                                                        required minlength="10" maxlength="10">
                                                    @error('phone_number')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <label for="business_headquarters_address" class="col-form-label text-md-left">
                                                        {{ ('ABN/ACN') }}</label>
                                                    <input id="abn_acn" type="text"
                                                        class="form-control @error('abn_acn') is-invalid @enderror"
                                                        name="abn_acn" placeholder="ABN/ACN" required>
                                                    @error('abn_acn')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <label for="Website" class="col-form-label text-md-left">
                                                        {{ ('Website') }}</label>
                                                    <input id="website" type="text"
                                                        class="form-control @error('website') is-invalid @enderror"
                                                        name="website" placeholder="Website" required>
                                                    @error('website')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <label for="business_headquarters_address" class="col-form-label text-md-left">
                                                        {{ ('Business Headquarters Address') }}</label>
                                                    <input id="business_headquarters_address" type="text"
                                                        class="form-control @error('business_headquarters_address') is-invalid @enderror"
                                                        name="business_headquarters_address"
                                                        placeholder="Business Headquarters Address" required>
                                                    @error('business_headquarters_address')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <label for="business_store_address" class="col-form-label text-md-left">
                                                        {{ ('Business Store Address') }}</label>
                                                    <input id="business_store_address" type="text"
                                                        class="form-control @error('business_store_address') is-invalid @enderror"
                                                        name="business_store_address"
                                                        placeholder="Business Store Address" required>
                                                    @error('business_store_address')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <label for="business_registration_document" class="col-form-label text-md-left">
                                                        {{ ('Business Registration Document') }}</label>
                                                    <input id="business_registration_document" type="file"
                                                        class="form-control @error('business_registration_document') is-invalid @enderror"
                                                        name="business_registration_document"
                                                        placeholder="Business Registration Document" required
                                                        accept="image/*">
                                                    @error('business_registration_document')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <label for="avatar" class="col-form-label text-md-left">
                                                        {{ ('avatar') }}</label>
                                                    <input id="avatar" type="file"
                                                        class="form-control @error('avatar') is-invalid @enderror"
                                                        name="avatar" autocomplete="avatar" placeholder="Avatar"
                                                        required accept="image/*">
                                                    @error('avatar')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <label for="password" class="col-form-label text-md-left">
                                                        {{ ('Password') }}</label>
                                                    <input id="password" type="password"
                                                        class="form-control @error('password') is-invalid @enderror"
                                                        name="password" placeholder="Password">

                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <label for="password_confirmation" class="col-form-label text-md-left">
                                                        {{ ('Confirm Password') }}</label>
                                                    <input id="password_confirmation" type="password"
                                                        class="form-control" name="password_confirmation"
                                                        placeholder="Confirm Password" required>
                                                </div>
                                            </div>


                                            <div class="form-group text-center row m-t-20">
                                                <div class="col-12">
                                                    <button id="submit"
                                                        class="btn btn-primary btn-block waves-effect waves-light"
                                                        type="submit">
                                                        <i id="loader" style="display:none"
                                                            class="fa fa-spinner fa-spin"> </i>
                                                        Submit
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" id="appname" name="appname" value="{{ config('app.name') }}">
    <!-- jQuery  -->
    <script src="{{ asset('admin/js/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/js/jquery.validate.min.js') }}"></script>

    <script src="{{ asset('admin/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/js/modernizr.min.js') }}"></script>
    <script src="{{ asset('admin/js/detect.js') }}"></script>
    <script src="{{ asset('admin/js/fastclick.js') }}"></script>
    <script src="{{ asset('admin/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('admin/js/jquery.blockUI.js') }}"></script>
    <script src="{{ asset('admin/js/waves.js') }}"></script>
    <script src="{{ asset('admin/js/jquery.nicescroll.js') }}"></script>
    <script src="{{ asset('admin/js/jquery.scrollTo.min.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('admin/js/app.js') }}"></script>
    <script src="{{ asset('admin/js/toastr.min.js') }}"></script>
    <script>
        // let validExt = ['jpg','png']
        var appName = $('#appname').val();

        // $('#avatar').on('change', function() {
        //     var extension = this.files[0].type.split('/')[1]
        //     if (validExt.indexOf(extension) == -1) {
        //         toastr.warning('Invalid file.')
        //     }
        //     return false;
        // })

        $("#vendor-register").validate({
            rules: {
                name: {
                    required: true,
                },
                phone_number: {
                    required: true,
                    digits: true,
                    minlength: 10,
                    maxlength: 10,
                },
                password: {
                    required: true,
                },
                password_confirmation: {
                    required: true,
                    equalTo: "#password",
                },
                email: {
                    required: true,
                    email: true,
                },
                avatar: {
                    required: true,
                    // extension: "jpg,jpeg,png",
                },
                business_registration_document: {
                    required: true,
                },
                business_store_address: {
                    required: true,
                },
                business_headquarters_address: {
                    required: true,
                },
                website: {
                    required: true,
                    url:true,
                },
                abn_acn: {
                    required: true,
                },

            },
            messages: {
                name: {
                    required: "Please Enter Name",
                },
                password: {
                    required: "Please Enter Password",
                },
                email: {
                    required: "Please Enter Email",
                },
                phone_number: {
                    required: "Please Enter Phone Number",
                },
                password_confirmation: {
                    required: "Please Enter Confirm Password",
                },
                avatar: {
                    required: "Please Enter Avatar",
                },
                business_registration_document: {
                    required: "Please Enter Business Registration Document",
                },
                business_store_address: {
                    required: "Please Enter Business Store Address",
                },
                business_headquarters_address: {
                    required: "Please Enter Business Headquarters Address",
                },
                website: {
                    required: "Please Enter Business Website",
                },
                abn_acn: {
                    required: "Please Enter ABN/ACN",
                },
            },
            submitHandler: function(form) {
                $("#loader").css("display", "inline-block");
                $("#submit").attr("disabled", true);
                var data = new FormData(document.getElementById("vendor-register"));
                $.ajax({
                    type: 'POST',
                    url: "{{ route('register.vendor') }}",
                    dataType: 'json',
                    data: data,
                    async: true,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $("#loader").css("display", "none");
                        $("#submit").attr("disabled",false);
                        if (response.status == true) {
                            toastr.success(response.message, appName)
                            window.location = response.url;
                        } else {
                            toastr.error(response.error, appName)
                            return false;
                        }
                        return false;
                    },
                    error: function(response) {
                        $("#loader").css("display", "none");
                        $("#submit").attr("disabled",false);
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
</body>

</html>
