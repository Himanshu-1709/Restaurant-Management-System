<!DOCTYPE html>
<html lang="en" class="h-100">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
     <!-- Title -->
	 <title>@yield('page_title')</title>
	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="DexignLab" />
	<meta name="robots" content="" />
	<meta name="description" content="@yield('page_title')"/>
	<meta property="og:title" content="@yield('page_title')" />
	<meta property="og:description" content="@yield('page_title')" />
	<meta property="og:image" content="https://fooddesk.dexignlab.com/xhtml/page-error-404.html" />
	<meta name="format-detection" content="telephone=no">
	
	<!-- Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon icon -->
    <link rel="shortcut icon" type="image/png" sizes="16x16" href="{{asset('user/assets/images/favicon.png')}}">
    <link href="{{asset('user/assets/vendor/swiper/css/swiper-bundle.min.css')}}" rel="stylesheet">
    <link href="{{asset('user/assets/css/style.css')}}" rel="stylesheet">
	@livewireStyles
</head>

<body class="body">
@section('container')
@show
@livewireScripts
<script src="{{asset('user/assets/vendor/swiper/js/swiper-bundle.min.js')}}"></script>
<script src="{{asset('user/assets/js/dlabnav-init.js')}}"></script>
<script src="{{asset('user/assets/js/styleSwitcher.js')}}"></script>
</body>

<!-- Mirrored from fooddesk.dexignlab.com/codeigniter/demo/page_login by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 17 Nov 2023 08:11:12 GMT -->
</html>