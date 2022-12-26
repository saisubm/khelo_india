<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Infra Dashboard | Log in</title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('public/admin/assets/plugins/fontawesome-free/css/all.min.css')}}">
        <!-- icheck bootstrap -->
        <link rel="stylesheet" href="{{ asset('public/admin/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('public/admin/assets/dist/css/adminlte.min.css')}}">
        <link rel="stylesheet" href="{{ asset('public/admin/assets/css/custom.css')}}">
        <style>
            body {
                background-image: url('public/admin/india.jpg');
                background-color: #cccccc;
            }
        </style>


    </head>
    <body class="hold-transition login-page">
       <div class="row w-100">
           <div class="col-sm-6 d-flex align-item-center justify-content-center">
            <div class="login-box my-auto">
                {{-- <div class="login-logo">
                   <h1>INFRA <small class="d-block">DASHBOARD</small></h1>
                </div> --}}
                
                <!-- /.login-logo -->
                <div class="card">
                    <div class="card-body login-card-body">
                        <div class="logo_wrap px-4 mb-3">
                            <a class="d-block border bg-white p-2 rounded" href="{{url('/')}}"><img src="http://localhost:8080/infra_dashboard/public/front/assets/images/new_logo.svg" alt="" class="img-fluid"></a>
                        </div>
                        {{-- <p class="login-box-msg"> @if (session('error'))
                        <div class="text-danger text-center" role="alert">
                            {{ session('error') }}
                        </div>
                        @endif</p> --}}
                        @if (Session::has('message'))
                        <div class="alert alert-success" role="alert">
                           {{ Session::get('message') }}
                       </div>
                        @endif
                        <form  id="login_form" method="post" action="{{ route('admin.forget.password.post') }}" autocomplete="off" >
                            @csrf
                            <div class="mb-3 form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" autofocus>
                                @if ($errors->has('email'))
                                      <span class="text-danger">{{ $errors->first('email') }}</span>
                                  @endif
                            </div>
                            
                            <div><button type="submit" class="btn btn-primary btn-block text-uppercase">Send Password Reset Link</button></div>
                        </form>
                    </div>
                    <!-- /.login-card-body -->
                </div>
            </div>
            <!-- /.login-box -->
           </div>
           <div class="col-sm-6 d-flex">
               <div class="loginsliderbox d-flex">
                <div class="mt-auto w-100 px-3 px-xl-5 text-center mx-xl-5">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                          <div class="carousel-item text-center active">
                            <img src="{{ asset('public/admin/assets/images/login-slide2.png')}}" class="img-fluid" alt="...">
                          </div>
                          <div class="carousel-item text-center">
                            <img src="{{ asset('public/admin/assets/images/login-slide2.png')}}" class="img-fluid" alt="...">
                          </div>
                          <div class="carousel-item text-center">
                            <img src="{{ asset('public/admin/assets/images/login-slide2.png')}}" class="img-fluid" alt="...">
                          </div>
                        </div>
                      </div>
                      {{-- <p class="mx-xl-5 mt-3">Printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p> --}}
                </div>
               </div>
           </div>
       </div>

        <!-- jQuery -->
        <script src="{{ asset('public/admin/assets/plugins/jquery/jquery.min.js')}}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('public/admin/assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('public/admin/assets/dist/js/adminlte.min.js')}}"></script>
        <script src="{{ asset('public/admin/assets/plugins/jquery-validation/jquery.validate.min.js')}}"></script>

    </body>
</html>
<script>

$(function () {
    // $.validator.setDefaults({
    //   submitHandler: function () {
    //     alert( "Form successful submitted!" );
    //   }
    // });
    // $.validator.addMethod(
    //         "regex",
    //         function(value, element, regexp)
    //         {
    //             if (regexp.constructor != RegExp)
    //                 regexp = new RegExp(regexp);
    //             else if (regexp.global)
    //                 regexp.lastIndex = 0;
    //             return this.optional(element) || regexp.test(value);
    //         },
    //         "Password must contain at least 8-15 characters,including UPPER/LOWERCASE,special symbols and numbers"
    // );

    $('#login_form').validate({
        rules: {
            email: {
                required: true,
                email: true,
            },
            password: {
                required: true,
                // regex : /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/,

            },
        },
        messages: {
            email: {
                required: "Please enter a email address",
                email: "Please enter a vaild email address"
            },
            password: {
                required: "Please enter a password",
            },

        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });

});

$('#carouselExampleIndicators').carousel({
    interval: 2000
});
</script>
