@yield('vendor-script')
<!-- Jquery Core Js -->
<script src="{{asset('port/assets/bundles/libscripts.bundle.js')}}"></script> <!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) -->
<script src="{{asset('port/assets/bundles/vendorscripts.bundle.js')}}"></script> <!-- slimscroll, waves Scripts Plugin Js -->

<script src="{{asset('port/assets/bundles/morrisscripts.bundle.js')}}"></script><!-- Morris Plugin Js -->
<script src="{{asset('port/assets/bundles/jvectormap.bundle.js')}}"></script> <!-- JVectorMap Plugin Js -->
<script src="{{asset('port/assets/bundles/knob.bundle.js')}}"></script> <!-- Jquery Knob, Count To, Sparkline Js -->

<script src="{{asset('port/assets/bundles/mainscripts.bundle.js')}}"></script>
<script src="{{asset('port/assets/js/pages/index.js')}}"></script>
{{-- page script --}}
@yield('page-script')
{{-- page script --}}
