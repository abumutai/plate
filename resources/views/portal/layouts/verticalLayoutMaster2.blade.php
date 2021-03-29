<body class="theme-purple" onload="windowLoaded();">

<!-- Page Loader -->
<div class="page-loader-wrapper" id="page-loader-wrapper">
    <div class="sk-spinner sk-spinner-wave" id="status">
        <div class="sk-rect1"></div>
        <div class="sk-rect2"></div>
        <div class="sk-rect3"></div>
        <div class="sk-rect4"></div>
        <div class="sk-rect5"></div>
    </div>
</div>
<!-- Overlay For Sidebars -->
<div class="overlay"></div>

{{-- Include Navbar --}}
@include('portal.panels.navbar')

{{-- Include Sidebar --}}
@include('portal.panels.sidebar_left')
@include('portal.panels.sidebar_right')

<!-- Chat-launcher -->
<div class="chat-launcher"></div>
<div class="chat-wrapper">
    <div class="card">
        <div class="header">
            <ul class="list-unstyled team-info margin-0">
                <li class="m-r-15"><h2>Design Team</h2></li>
                <li><img src="{{asset('port/assets/images/xs/avatar2.jpg')}}" alt="Avatar"></li>
                <li><img src="{{asset('port/assets/images/xs/avatar3.jpg')}}" alt="Avatar"></li>
                <li><img src="{{asset('port/assets/images/xs/avatar4.jpg')}}" alt="Avatar"></li>
                <li><img src="{{asset('port/assets/images/xs/avatar6.jpg')}}" alt="Avatar"></li>
                <li><a href="javascript:void(0);" title="Add Member"><i class="zmdi zmdi-plus-circle"></i></a></li>
            </ul>
        </div>
        <div class="body">
            <div class="chat-widget">
                <ul class="chat-scroll-list clearfix">
                    <li class="left float-left">
                        <img src="{{asset('port/assets/images/xs/avatar3.jpg')}}" class="rounded-circle" alt="">
                        <div class="chat-info">
                            <a class="name" href="javascript:void(0);">Alexander</a>
                            <span class="datetime">6:12</span>
                            <span class="message">Hello, John </span>
                        </div>
                    </li>
                    <li class="right">
                        <div class="chat-info"><span class="datetime">6:15</span> <span class="message">Hi, Alexander<br> How are you!</span> </div>
                    </li>
                    <li class="right">
                        <div class="chat-info"><span class="datetime">6:16</span> <span class="message">There are many variations of passages of Lorem Ipsum available</span> </div>
                    </li>
                    <li class="left float-left"> <img src="{{asset('port/assets/images/xs/avatar2.jpg')}}" class="rounded-circle" alt="">
                        <div class="chat-info"> <a class="name" href="javascript:void(0);">Elizabeth</a> <span class="datetime">6:25</span> <span class="message">Hi, Alexander,<br> John <br> What are you doing?</span> </div>
                    </li>
                    <li class="left float-left"> <img src="{{asset('port/assets/images/xs/avatar1.jpg')}}" class="rounded-circle" alt="">
                        <div class="chat-info"> <a class="name" href="javascript:void(0);">Michael</a> <span class="datetime">6:28</span> <span class="message">I would love to join the team.</span> </div>
                    </li>
                    <li class="right">
                        <div class="chat-info"><span class="datetime">7:02</span> <span class="message">Hello, <br>Michael</span> </div>
                    </li>
                </ul>
            </div>
            <div class="input-group p-t-15">
                <input type="text" class="form-control" placeholder="Enter text here...">
                <span class="input-group-addon">
                    <i class="zmdi zmdi-mail-send"></i>
                </span>
            </div>
        </div>
    </div>
</div>

<!-- Main Content -->
@yield('content')





{{-- include default scripts --}}
@include('portal.panels.scripts2')

</body>

</html>
