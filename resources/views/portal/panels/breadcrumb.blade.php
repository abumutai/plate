@if(@isset($breadcrumbs))
    <ul class="breadcrumb float-md-right">
        {{-- this will load breadcrumbs dynamically from controller --}}
        @php
            $count=0;
        @endphp
        @foreach ($breadcrumbs as $breadcrumb)
            <li class="breadcrumb-item">
                @if(isset($breadcrumb['link']))
                    <a href="{{ $breadcrumb['link'] }}">
                        @if($count<1)
                            <i class="zmdi zmdi-home"></i>
                        @endif

                        @endif
                        {{$breadcrumb['name']}}
                        @if(isset($breadcrumb['link']))
                    </a>
                @endif
            </li>
            @php
                $count++;
            @endphp
        @endforeach
    </ul>
@endisset
