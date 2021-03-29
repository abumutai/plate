{{-- Vendor Styles --}}
@yield('vendor-style')

<!-- GOOGLE WEB FONT -->
<link href='https://fonts.googleapis.com/css?family=Lato:400,700,900,400italic,700italic,300,300italic' rel='stylesheet' type='text/css'>

<!-- BASE CSS -->
<link href="{{asset('landing/css/base.css')}}" rel="stylesheet">


{{-- Page Styles --}}
@yield('page-style')

<style>
    #header-sticky-wrapper.is-sticky #header {
        background-color: rgba(255, 193, 7, 0.95);
        text-align: right;
        color: white !important;
    }

    #header-sticky-wrapper.is-sticky #header #main-menu > ul > li > a, #header-sticky-wrapper.is-sticky #header #shop_cart > a > i {
        text-shadow: 1px 1px 0 #ddd

    }
    nav ul li a{
        font-size: 16px!important;
    }
</style>

<link href="{{asset('plugins/home/holdon/src/css/HoldOn.css')}}" rel="stylesheet">
<link href="{{asset('plugins/home/animate.css/4.0.0/animate.min.css')}}" rel="stylesheet"/>

