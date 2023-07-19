<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('backend/auth/vendor/bootstrap/css/bootstrap.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('backend_assets/auth/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('backend_assets/auth/vendor/animate/animate.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('backend_assets/auth/vendor/css-hamburgers/hamburgers.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('backend_assets/auth/vendor/select2/select2.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('backend_assets/auth/css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('backend_assets/auth/css/main.css') }}">
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="{{ asset('backend_assets/auth/images/img-01.png')}}" alt="IMG">
				</div>

				<form class="login100-form validate-form" action= "{{ route('admin.Dologin') }}" method = "post">
					@csrf
                    <span class="login100-form-title">
						Admin Login
					</span>
             <!--Success or Error Msg -->
              <div class="row">
                <div class="col-md-8 offset-2">
                  @if(session('message'))
                  <div class="alert alert-{{ session('type') }}">
                       <p class="text-center font-weight-bolder text-dark">{{ session('message') }}</p>
                  </div>
                @endif

                </div>

            </div>

					<div class="wrap-input100 form-group" >
						<input class="input100" type="text" name="email" placeholder="Email">
                        @error('email') <span class="text-danger font-italic">{{ $message }}</span> @enderror

					</div>

					<div class="wrap-input100 form-group" >
						<input class="input100 form-control" type="password" name="password" placeholder="Password">
                        @error('password') <span class="text-danger font-italic">{{ $message }}</span> @enderror

					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit">
							Login
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>




<!--===============================================================================================-->
	<script src="{{ asset('backend_assets/auth/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('backend_assets/auth/vendor/bootstrap/js/popper.js') }}"></script>
	<script src="{{ asset('backend_assets/auth/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('backend_assets/auth/vendor/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('backend/auth/vendor/tilt/tilt.jquery.min.js') }}"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="{{ asset('backend_assets/auth/js/main.js') }}"></script>

</body>
</html>
