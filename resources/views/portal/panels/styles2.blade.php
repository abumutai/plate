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
        background: black !important;
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
    }
    
   .meter {
    box-sizing: content-box;
    height: 20px; /* Can be anything */
    position: relative;
    margin: 10px 0 20px 0; /* Just for demo spacing */
    background: #555;
    border-radius: 25px;
    padding: 10px;
    box-shadow: inset 0 -1px 1px rgba(255, 255, 255, 0.3);
    }
    .meter > span {
    display: block;
    height: 100%;
    border-top-right-radius: 8px;
    border-bottom-right-radius: 8px;
    border-top-left-radius: 20px;
    border-bottom-left-radius: 20px;
    background-color: rgb(43, 194, 83);
    background-image: linear-gradient(
        center bottom,
        rgb(43, 194, 83) 37%,
        rgb(84, 240, 84) 69%
    );
    box-shadow: inset 0 2px 9px rgba(255, 255, 255, 0.3),
        inset 0 -2px 6px rgba(0, 0, 0, 0.4);
    position: relative;
    overflow: hidden;
    }
    .meter > span:after,
    .animate > span > span {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
    background-image: linear-gradient(
        -45deg,
        rgba(255, 255, 255, 0.2) 25%,
        transparent 25%,
        transparent 50%,
        rgba(255, 255, 255, 0.2) 50%,
        rgba(255, 255, 255, 0.2) 75%,
        transparent 75%,
        transparent
    );
    z-index: 1;
    background-size: 50px 50px;
    animation: move 2s linear infinite;
    border-top-right-radius: 8px;
    border-bottom-right-radius: 8px;
    border-top-left-radius: 20px;
    border-bottom-left-radius: 20px;
    overflow: hidden;
    }

    .animate > span:after {
    display: none;
    }

    @keyframes move {
    0% {
        background-position: 0 0;
    }
    100% {
        background-position: 50px 50px;
    }
    }

    .orange > span {
    background-image: linear-gradient(#f1a165, #f36d0a);
    }

    .red > span {
    background-image: linear-gradient(#f0a3a3, #f42323);
    }

    .nostripes > span > span,
    .nostripes > span::after {
    background-image: none;
    }

    #page-wrap {
    width: 490px;
    margin: 80px auto;
    }
   
    
    pre {
    background: #000;
    text-align: left;
    padding: 20px;
    margin: 0 auto 30px;
    }
    * {
    box-sizing: border-box;
    }
    

    progress {
	display:inline-block;
	width:190px;
	height:20px;
	padding:15px 0 0 0;
	margin-top: 10px;
	background:none;
	border: 0;
	border-radius: 15px;
	text-align: left;
	position:relative;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 0.8em;
}
progress::-webkit-progress-bar {
	height:20px;
	width:200px;
	margin:0 auto;
	background-color: #CCC;
	border-radius: 15px;
	box-shadow:0px 0px 6px #777 inset;
}
progress::-webkit-progress-value {
	display:inline-block;
	float:left;
	height:20px;
	margin:0px -10px 0 0;
	background: #F70;
	border-radius: 15px;
	box-shadow:0px 0px 6px #777 inset;
}
progress:after {
	margin:-26px 0 0 -7px;
	padding:0;
	display:inline-block;
	float:left;
	content: 'Ksh.' attr(value);
}


    </style>
