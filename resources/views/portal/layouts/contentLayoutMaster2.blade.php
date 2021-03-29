
<!doctype html>
<html class="no-js " lang="en">

<!-- Mirrored from thememakker.com/templates/oreo/html/light/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 21 Aug 2020 05:13:27 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') :: Sahani</title>
    <link rel="icon" href="{{asset('images/favicon.ico')}}" type="image/x-icon">
    {{-- Include core + vendor Styles --}}
    @include('portal.panels.styles2')




</head>

@extends('portal.layouts.verticalLayoutMaster2' )
