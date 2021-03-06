<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from creative-wp.com/demos/majesty/index01.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 26 Aug 2020 18:08:05 GMT -->
<head>
    <!-- Meta Tags
        ============================================= -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="pizza, delivery food, fast food, sushi, take away, chinese, italian food">
    <meta name="description" content="">
    <meta name="author" content="Ansonika">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Your Title Page
        ============================================= -->
    <title>@yield('title') :: Sahani</title>

    <!-- Favicons-->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114"
          href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144"
          href="img/apple-touch-icon-144x144-precomposed.png">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('plugins/Snackbar-Notification-Component/css/snackbar.css')}}">

    <!--The following cascading style sheet is explicitly for the forms -->
    <style>
        .modal{
            border-radius: 10px;
        }
        .modal-popup h1{
            font-weight: 500px;
            text-transform: uppercase;
            color: green;
        }
        .popup-form input[type = "text"], .popup-form input[type = "password"], .popup-form input[type = "email"]{
            border-radius: 15px;
            background-color: rgba(87, 84, 84, 0.6);
            color: #000;
            transition-duration: 0.24s;
        }

        .popup-form button[type = "submit"]{
            background-color: yellow;
            color: #111;
        }

        .popup-form input[type = "text"]:focus, .popup-form input[type = "password"]:focus, .popup-form input[type = "email"]:focus{
            -ms-transform: scale(1.2); /* IE 9 */
            -webkit-transform: scale(1.2); /* Safari 3-8 */
            transform: scale(1.2);
            border: 2px solid #2ecc71;
        }


        

    </style>

{{-- Include core + vendor Styles --}}
@include('panels/styles')
<!-- Modernizr -->
    <script src="{{asset('landing/js/modernizr.js')}}"></script>

<!--[if lt IE 9]>
    <script src="{{asset('landing/js/html5shiv.min.js')}}"></script>
    <script src="{{asset('landing/js/respond.min.js')}}"></script>
    <![endif]-->
</head>
<body onload="windowLoaded();loadEarly()">
{{--@include('panels.loader')--}}
<!-- Document Wrapper  -->
<div id="wrapper">
    @include('panels.navbar')
<!--[if lte IE 8]>
    <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
        your browser</a>.</p>
    <![endif]-->

    @yield('content')

    {{-- include footer --}}
    @include('panels/footer')

    <div class="layer"></div><!-- Mobile menu overlay mask -->

    <!-- Login modal -->
    <div class="modal fade" id="login_2" tabindex="-1" role="dialog" aria-labelledby="myLogin" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content modal-popup" style="background-repeat:no-repeat; background-size: cover; background-color: white; border-radius:20px">
                
                <a href="#" class="close-link" style="color:red"><i class="icon_close_alt2"></i></a>
                <form action="{{route('login')}}" method="POST" class="popup-form" id="myLogin" name="loginForm">
                    @csrf
                    <div class="login_icon"><i class="fa fa-user fa-1x" style="color: rgba(87, 84, 84, 0.6) "></i></div>
                    <input type="email" id="email" autofocus class="form-control form-white  @error('email') is-invalid @enderror" name="email" placeholder="Email address">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <input type="password" id="password" class="form-control form-white @error('password') is-invalid @enderror" name="password" placeholder="Password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="text-left">
                        <a href="{{ route('password.request') }}">Forgot Password?</a>
                    </div>
                    <button type="submit" class="btn btn-submit">Login</button>
                    <div class="text-danger mt-1 alert-validation-msg animate__animated animate__wobble" role="alert"
                         style="opacity: 1;margin-top: 1em!important;display: none" id="loginAlert">
                        <i class="icon_error-oct_alt mr-1 align-middle" style="color: white"></i>
                        <span class=""
                              style="color: red!important; font-weight:400">Either the username or password is incorrect</span>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- End modal -->

    <!-- Register modal -->
    <div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="myRegister" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content modal-popup" style="background-repeat:no-repeat; background-size: cover; background-color: white; border-radius:20px">
                
                <a href="#" class="close-link" style="color:red;"><i class="icon_close_alt2" style="color:  rgba(87, 84, 84, 0.6)"></i></a>
                <form method="POST" action="{{ route('register') }}" class="popup-form" id="myRegister"
                      name="registerForm">
                    @csrf
                    <input type="hidden" name="role" value="3">
                    
                    <input type="text" class="form-control form-white text-capitalize" placeholder="Name" name="name"
                           value="{{ old('name') }}" autocomplete="name" autofocus>
                    <input type="email" class="form-control form-white text-lowercase" placeholder="Email address"
                           name="email" value="{{ old('email') }}" autocomplete="email">
                    <input type="password" class="form-control form-white" placeholder="Password" name="password"
                           autocomplete="new-password">
                    <input type="password" class="form-control form-white" placeholder="Confirm password" id="password2"
                           name="password_confirmation" autocomplete="new-password">
                    <button type="submit" class="btn btn-submit">Register</button>
                    <div class="text-danger mt-1 alert-validation-msg animate__animated animate__wobble" role="alert"
                         style="opacity: 1;margin-top: 1em!important;display: none" id="registerAlert">
                        <i class="icon_error-oct_alt mr-1 align-middle" style="color: white"></i>
                        <span class="" id="registerAlertMessage"
                              style="color: #ff0000!important; font-weight: 300px"></span>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- End Register modal -->

    <!-- Search Menu -->
    <div class="search-overlay-menu">
        <span class="search-overlay-close"><i class="icon_close"></i></span>
        <form role="search" id="searchform" action="{{route('item.search')}}" method="get">
            <input value="" name="search_item" type="search" placeholder="Search..."/>
            <button type="submit"><i class="icon-search-6"></i>
            </button>
        </form>
    </div>
    <!-- End Search Menu -->
</div>
<snackbar></snackbar>

{{-- include default scripts --}}
@include('panels/scripts')

<script>
    //login operation
    $("form[name='loginForm']").on('submit', function (e) { //use on if jQuery 1.7+

        e.preventDefault();  //prevent form from submitting

        HoldOn.open({
            theme: 'sk-fading-circle',
            // message:"<h4>logging in</h4>"
        });

        const inputData = $("#myLogin").serializeArray();
        $('#loginAlert').css('display', 'none');

        $.ajax({
            type: "POST",
            data: inputData,
            url: "{{route('login')}}",
            success: function (data) {
                HoldOn.close();
                let response = JSON.parse(data);
                if (response.status === true) {
                    window.open(response.url, "_self")
                    return;
                }
                $('#loginAlert').css('display', 'block');

            },
            error: function (data) {
                console.log(data);
                HoldOn.close();
                $('#loginAlert').css('display', 'block');
            }
        });
        return false;

    });
</script>
<script>
    //login operation
    $("form[name='registerForm']").on('submit', function (e) { //use on if jQuery 1.7+

        e.preventDefault();  //prevent form from submitting

        HoldOn.open({
            theme: 'sk-fading-circle',
            // message:"<h4>logging in</h4>"
        });

        const inputData = $("#myRegister").serializeArray();
        $('#registerAlert').css('display', 'none');

        $.ajax({
            type: "POST",
            data: inputData,
            url: "{{route('register')}}",
            success: function (data) {
                console.log(data);
                HoldOn.close();
                location.reload();

            },
            error: function (data) {
                console.log(data);
                HoldOn.close();
                let msg;
                msg = JSON.parse(data.responseText);
                if (msg.errors === undefined) {
                    msg = "Unknown error has occurred, try again later";
                } else {
                    if (msg.errors.email != null)
                        msg = msg.errors.email[0];
                    else if (msg.errors.password != null)
                        msg = msg.errors.password[0];
                    else
                        msg = "Unknown error has occurred, try again later";
                }


                $("#registerAlertMessage").html(msg);
                $('#registerAlert').css('display', 'block');
            }
        });
        return false;

    });
</script>

<script src="{{asset('plugins/Snackbar-Notification-Component/js/snackbar.js')}}"></script>

<script>
    function loadEarly() {
        @if(session('login'))
        $("#openDiagLogin").trigger("click");
        @elseif(session('register'))
        $("#openDiagRegister").trigger("click");
        @endif
    }
</script>
</body>


<!-- Mirrored from creative-wp.com/demos/majesty/index01.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 26 Aug 2020 18:08:14 GMT -->
</html>
