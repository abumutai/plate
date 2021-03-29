<ul class="ml-menu">
    @if(isset($menu))
        @foreach($menu as $submenu)
            <li class="{{ (request()->is('portal/'.$submenu->url)) ? 'active' : '' }}">
                <a href="@if(isset($submenu->uri)){{route($submenu->uri)}}@else{{'javascript:void(0)'}}@endif">
                    {{$submenu->name}}
                </a>
            </li>
        @endforeach
    @endif
</ul>
