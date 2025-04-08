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
      <link rel="icon" type="image/png" sizes="16x16" href="{{asset('user/assets/images/favicon.png')}}">
      <link href="{{asset('user/assets/vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>	
      <link href="{{asset('user/assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}" rel="stylesheet" type="text/css"/>
      <link href="{{asset('user/assets/vendor/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet" type="text/css"/>
      <link href="{{asset('user/assets/vendor/swiper/css/swiper-bundle.min.css')}}" rel="stylesheet" type="text/css"/>
      <link href="{{asset('user/assets/css/style.css')}}" rel="stylesheet" type="text/css"/>
            <link href="{{asset('user/assets/vendor/toastr/css/toastr.min.css')}}" rel="stylesheet" type="text/css"/>	
	@livewireStyles
   </head>