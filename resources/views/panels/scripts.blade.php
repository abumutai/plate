@yield('vendor-script')
<!-- Core JS Libraries -->
<!-- COMMON SCRIPTS -->
<script src="{{asset('landing/js/jquery-2.2.4.min.js')}}"></script>
<script src="{{asset('landing/js/common_scripts_min.js')}}"></script>
<script src="{{asset('landing/js/functions.js')}}"></script>
{{--<script src="{{asset('landing/assets/validate.js')}}"></script>--}}
{{-- page script --}}
@yield('page-script')
{{-- page script --}}
<script src="{{asset('plugins/home/holdon/src/js/HoldOn.js')}}"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
