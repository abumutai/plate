<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>404 Error</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicons-->
    <link rel="shortcut icon" href="landing/fullscreen/img/favicon.ico" type="image/x-icon"/>
    <link rel="apple-touch-icon" type="image/x-icon" href="landing/fullscreen/img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="landing/fullscreen/img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="landing/fullscreen/img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="landing/fullscreen/img/apple-touch-icon-144x144-precomposed.png">

    <!-- CSS -->
    <link href="{{asset('landing/fullscreen/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('landing/fullscreen/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('landing/fullscreen/fontello/css/fontello.css')}}" rel="stylesheet" >
    <link href="{{asset('landing/fullscreen/fontello/css/animation.css')}}" rel="stylesheet" >

    <!--[if lt IE 9]>
    <script src="http://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="http://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

</head>
<body>

<div id="wrapper">
    <div id="main">
        <div class="container text-center h-100">
            <div class="my-auto text-center" style="margin-top: 8em">
                <img src="{{asset('images/logo/SVG/logosa.svg')}}" class="img-fluid align-self-center" width="auto" height="128" alt="branding logo">
                <h1 class="font-large-2 my-1">404 - Page Not Found!</h1>
                <p class="p-2">We unfortunately can't find the page you're looking for</p>
                <a class="btn btn-primary btn-lg mt-2 waves-effect waves-light" style="margin-top: 2em" href="{{route('landing')}}">Back to Home</a>
            </div>

            {{--
            <div class="row countdown">
                <div class="col-md-12">
                    <div id="logo"><img src="{{asset('images/logo/SVG/logosa.svg')}}" width="auto" height="100" alt="" data-retina="true"></div>
                    <h1>404 - Page Not Found</h1>
                    <h2>We unfortunately can't find the page you're looking for</h2>
                </div>
            </div>
            <div class=" justify-content-center text-center">
                   <div class="mx-auto w-25">
                       <a href="{{route('landing')}}" class="btn-check btn-lg" style="font-size: 20px">Back to home</a>
                   </div>
            </div>
            --}}
        </div><!-- End container -->
    </div><!-- End main -->

    <div id="slides">
        <ul class="slides-container">
            <li><img src="{{asset('images/backgrounds/404.jpg')}}" alt=""></li>
            <li><img src="{{asset('images/backgrounds/404.jpg')}}" alt=""></li>
            <li><img src="{{asset('images/backgrounds/404.jpg')}}" alt=""></li>
        </ul>
    </div><!-- End background slider -->

    <!-- JQUERY -->
    <script src="{{asset('landing/fullscreen/js/jquery-2.2.4.min.js')}}"></script>
    <script src="{{asset('landing/fullscreen/js/jquery.easing.1.3.min.js')}}"></script>
    <script src="{{asset('landing/fullscreen/js/jquery.animate-enhanced.min.js')}}"></script>
    <script src="{{asset('landing/fullscreen/js/jquery.superslides.min.js')}}"></script>
    <script  type="text/javascript">
        $('#slides').superslides({
            play: 6000,
            pagination:false,
            animation_speed: 800,
            animation: 'fade'
        });
    </script>
    <!-- OTHER JS -->
    <script src="{{asset('landing/fullscreen/js/retina.min.js')}}"></script>
    <script  src="{{asset('landing/fullscreen/js/functions.js')}}"></script>
    <script src="{{asset('landing/fullscreen/assets/validate.js')}}"></script>
</body>
</html>
