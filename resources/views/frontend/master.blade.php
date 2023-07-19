<!doctype html>
<html lang="en">

<!-- Mirrored from themebing.com/html/sayara/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 30 Apr 2021 17:56:54 GMT -->
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>


        @yield('title')

    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" >
	<link rel="icon" href="{{ asset('frontend/assets/images/thumbnail.png')}}">
	<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900&amp;display=swap'>
	<link rel='stylesheet' href="{{ asset('frontend/assets/css/plugins.css')}}">
	<link rel='stylesheet' href="{{ asset('frontend/assets/css/default.css')}}">
	<link rel='stylesheet' href="{{ asset('frontend/assets/css/color.css')}}">
	<link rel='stylesheet' href="{{ asset('frontend/assets/css/style.css')}}">

    <link rel="stylesheet" href="{{ asset('backend_assets/dist/css/theme.min.css') }}">
</head>
<body>

	<!-- <div id="preloader">
		<div class="spinner">
			<img src="assets/images/preloader.gif" alt="Home">
		</div>
	</div> -->

  <div class="container-fluid">
    @include('frontend.partials.header')



    <div class="row">
        <div class="col-12">
          @yield('content')

        </div>

    </div>








  @include('frontend.partials.footer')


  </div>



<div id="backtotop"><i class="fal fa-lg fa-arrow-up"></i>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" ></script>
<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="{{ asset('frontend/assets/js/plugins.js')}}"></script>
<script src="{{ asset('frontend/assets/js/main.js')}}"></script>
</body>

<!-- Mirrored from themebing.com/html/sayara/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 30 Apr 2021 17:57:27 GMT -->
</html>
