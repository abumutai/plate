{{-- Vendor Styles --}}
@yield('vendor-style')
<link rel="stylesheet" href="{{asset('port/assets/plugins/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('port/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css')}}"/>
<link rel="stylesheet" href="{{asset('port/assets/plugins/morrisjs/morris.min.css')}}"/>

{{-- Page Styles --}}
@yield('page-style')
<!-- Custom Css -->
<link rel="stylesheet" href="{{asset('port/assets/css/main.css')}}">
<link rel="stylesheet" href="{{asset('port/assets/css/color_skins.css')}}">
<style>
    .slimScrollBar {
        width: 5px !important;
        background: #6a1b99 !important;
        height: 128px !important;

    }

    /*3.1 Preloader*/
    #page-loader-wrapper {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        width: 100%;
        height: 100%;
        bottom: 0;
        background-color: #6a1b9a;
        z-index: 999999;
    }

    .sk-spinner-wave.sk-spinner {
        margin: -15px 0 0 -25px;
        position: absolute;
        left: 50%;
        top: 50%;
        width: 50px;
        height: 30px;
        text-align: center;
        font-size: 10px;
    }

    .sk-spinner-wave div {
        background-color: #fff;
        height: 100%;
        width: 6px;
        display: inline-block;
        -webkit-animation: sk-waveStretchDelay 1.2s infinite ease-in-out;
        animation: sk-waveStretchDelay 1.2s infinite ease-in-out;
    }

    .sk-spinner-wave .sk-rect2 {
        -webkit-animation-delay: -1.1s;
        animation-delay: -1.1s;
    }

    .sk-spinner-wave .sk-rect3 {
        -webkit-animation-delay: -1s;
        animation-delay: -1s;
    }

    .sk-spinner-wave .sk-rect4 {
        -webkit-animation-delay: -0.9s;
        animation-delay: -0.9s;
    }

    .sk-spinner-wave .sk-rect5 {
        -webkit-animation-delay: -0.8s;
        animation-delay: -0.8s;
    }

    @-webkit-keyframes sk-waveStretchDelay {
        0%, 40%, 100% {
            -webkit-transform: scaleY(0.4);
            transform: scaleY(0.4);
        }
        20% {
            -webkit-transform: scaleY(1);
            transform: scaleY(1);
        }
    }

    @keyframes sk-waveStretchDelay {
        0%, 40%, 100% {
            -webkit-transform: scaleY(0.4);
            transform: scaleY(0.4);
        }
        20% {
            -webkit-transform: scaleY(1);
            transform: scaleY(1);
        }
    }

    .breadcrumb-item + .breadcrumb-item::before {
        display: inline-block;
        padding-right: .5rem;
        color: #adafb0;
        content: "/"
    }</style>
