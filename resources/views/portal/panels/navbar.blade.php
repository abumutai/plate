<!-- Top Bar -->
<nav class="navbar p-l-5 p-r-5">
    <ul class="nav navbar-nav navbar-left">
        <li>
            <div class="navbar-header">
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="{{route('landing')}}">
                    <img src="{{asset('images/logo/SVG/logosa.svg')}}" width="auto" height="48px" alt="Sahani">
                   </a>
            </div>
        </li>
         <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"><i class="zmdi zmdi-notifications"></i>
                <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
            </a>
            <ul class="dropdown-menu pullDown">
                <li class="body">
                    <ul class="menu list-unstyled">
                        <li>
                            <a href="javascript:void(0);">
                                <div class="media">
                                     <div class="media-body">
                                         <span class="message">You have a new order</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="footer"> <a href="javascript:void(0);">View All</a> </li>
            </ul>
        </li>

        <li class="hidden-sm-down">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search...">
                <span class="input-group-addon"><i class="zmdi zmdi-search"></i></span>
            </div>
        </li>
        <li class="float-right">
      <a href="{{ route('logout') }}"
               onclick="event.preventDefault();document.getElementById('logout-form').submit();"  class="mega-menu" data-close="true"><i class="zmdi zmdi-power"></i>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form></a>
         </li>
    </ul>
</nav>
