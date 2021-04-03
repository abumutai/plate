<!-- Left Sidebar -->

<?php
use App\Helpers\Helper;$configData = Helper::applClasses();
?>

<aside id="leftsidebar" class="sidebar">
    
    <div class="tab-content" >
        <div class="tab-pane stretchRight active" id="dashboard">
            <div class="menu">
                <ul class="list">
                    <li>
                        <div class="user-info">
                           
                              @if(isset($restaurant))
                            <div class="image"><a href="{{route('profile')}}"><img src="{{$restaurant->logo ?? asset('images/restaurants/logo/rest_default.png')}}" alt="User"></a></div>

                            @else
                            <div class="image"><a href="{{route('user.profile')}}"><img src="{{$user->avatar ?? asset('images/logo/SVG/chef2.svg')}}" alt="User"></a></div>

                            @endif

                         

                            <div class="detail">
                                <h4>{{$restaurant->title ?? $user->name ?? '' }}</h4>
                                <small>{{$restaurant->headline  ??  $user->role->title ?? ''}}</small>
                            </div>
                            <a title="facebook" href="javascript:void(0);"><i class="zmdi zmdi-facebook"></i></a>
                            <a title="twitter" href="javascript:void(0);"><i class="zmdi zmdi-twitter"></i></a>
                            <a title="instagram" href="javascript:void(0);"><i class="zmdi zmdi-instagram"></i></a>
                        </div>
                    </li>
                    @if(isset($menuData[0]))

                    @foreach($menuData[0]->menu as $menu)

                    @if(isset($menu->navheader))
                    <li class="header text-uppercase">
                        @can($menu->policy, $user)
                        {{ $menu->navheader }}
                        @endcan
                    </li>
                    @else

                    @php

                    $custom_classes = "";
                    if(isset($menu->classlist)) {
                    $custom_classes = $menu->classlist;
                    }

                    @endphp
                    @can($menu->policy, $user)
                    <li class="{{ (request()->is('portal/'.$menu->url)) ? 'active open' : '' }} {{ $custom_classes }}">
                        <a href="@if(isset($menu->uri)){{route($menu->uri)}}@else{{'javascript:void(0)'}}@endif" class="menu-toggle">
                            <i class="{{ $menu->icon }}"></i>
                            <span class="menu-title">{{$menu->name}}</span>
                        </a>
                        @if(isset($menu->submenu))
                        @include('portal.panels.submenu', ['menu' => $menu->submenu])
                        @endif
                    </li>
                    @endcan
                    @endif
                    @endforeach
                    @endif
                </ul>
            </div>
        </div>
        <div class="tab-pane stretchLeft" id="user">
            <div class="menu">
                <ul class="list">
                    <li>
                        <div class="user-info m-b-20 p-b-15">
                            <div class="image"><a href="profile.html"><img src="{{asset('images/restaurants/logo/logo2.png')}}" alt="User"></a></div>
                            <div class="detail">
                                <h4>{{$restaurant->title ?? $user->name}}</h4>
                                <small>{{$restaurant->headline ?? $user->phone}}</small>
                            </div>
                            <a title="facebook" href="javascript:void(0);"><i class="zmdi zmdi-facebook"></i></a>
                            <a title="twitter" href="javascript:void(0);"><i class="zmdi zmdi-twitter"></i></a>
                            <a title="instagram" href="javascript:void(0);"><i class="zmdi zmdi-instagram"></i></a>
                            <p class="text-muted">Restaurant Admin</p>
                
                        </div>
                    </li>
                    <li>
                        <small class="text-muted">Email address: </small>
                        <p>{{$restaurant->email ?? $user->email}}</p>
                     
                        <hr>
                        <small class="text-muted">Phone: </small>
                        <p>{{$restaurant->phone ?? ''}}</p>
                        <hr>
                        <!-- <ul class="list-unstyled">
                            <li>
                                <div>Photoshop</div>
                                <div class="progress m-b-20">
                                    <div class="progress-bar l-blue " role="progressbar" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100" style="width: 89%"><span class="sr-only">62% Complete</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div>Wordpress</div>
                                <div class="progress m-b-20">
                                    <div class="progress-bar l-green " role="progressbar" aria-valuenow="56" aria-valuemin="0" aria-valuemax="100" style="width: 56%"><span class="sr-only">87% Complete</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div>HTML 5</div>
                                <div class="progress m-b-20">
                                    <div class="progress-bar l-amber" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100" style="width: 78%"><span class="sr-only">32% Complete</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div>Angular</div>
                                <div class="progress m-b-20">
                                    <div class="progress-bar l-blush" role="progressbar" aria-valuenow="43" aria-valuemin="0" aria-valuemax="100" style="width: 43%"><span class="sr-only">56% Complete</span>
                                    </div>
                                </div>
                            </li>
                        </ul> -->
                    </li>
                </ul>
            </div>
        </div>
    </div>



</aside>