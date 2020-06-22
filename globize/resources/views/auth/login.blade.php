@extends('layouts.app')

@section('content')
<body>
	<div id="container">
		<div id="banner">
			<div class="logo">
				<img src="{{ asset('img/logo.png')}}" style="width: 70px; height:70px" alt="logo" /><span class="bold logo-text">GLOBIZE</span>
			</div>
		</div>
		<div id="globe"></div>
		<div id="options" style="display: none;">
			<input type="checkbox" id="globe-dd" value="0" checked>
		</div>
		<div class="login-content">
			<h2 class="bold text-center">ACCESS TO YOUR PROFILE</h2><br>
			<div class="row">
				<div class="col-sm-2"></div>
				<div class="col-sm-8">
					<div>
						<form class="login-form" action="{{ route('login') }}" method="post">
							@csrf
							@if ($message = Session::get('success'))
								<div class="alert alert-success">
									<p>{{ $message }}</p>
							</div>
							@endif

							@if ($message = Session::get('warning'))
								<div class="alert alert-warning">
									<p>{{ $message }}</p>
								</div>
							@endif
							@if ($errors->has('email'))
								<div class="alert alert-danger">
									{{ $errors->first('email') }}
								</div>
							@endif
							<div class="form-group form-md-line-input form-md-floating-label has-info login-form-input">
								<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}">
								<label for="email">Email</label>
							</div>
							@if ($errors->has('password'))
								<div class="alert alert-danger">
									{{ $errors->first('password') }}
								</div>
							@endif
							<div class="form-group form-md-line-input form-md-floating-label has-info login-form-input">
								<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="{{ old('password') }}">
								<label for="password">Password</label>
							</div>
							<div class="form-actions">
								<button type="submit" class="btn btn-success btn-lg mt-ladda-btn ladda-button btn-circle btn-block">SIGN IN</button>
							</div>
						</form>
					</div>
					<div class="row">
						<label class="sign-with-text col-sm-10">or Sign in With</label>
					</div>
					<div class="row">
						<div class="col-sm-2 text-center">
							<a href="{{ url('login/facebook') }}" class="socicon-btn socicon-btn-circle socicon-lg socicon-solid bg-hover-grey-salsa font-white bg-hover-white socicon-facebook tooltips border-white social-login-btn" data-original-title="Facebook" style="border:1px solid"></a>
						</div>
						<div class="col-sm-2 text-center">
							<a href="{{ url('login/google') }}" class="socicon-btn socicon-btn-circle socicon-lg socicon-solid bg-hover-grey-salsa font-white bg-hover-white socicon-google tooltips" style="border:1px solid" data-original-title="Instagram"></a>
						</div>
						<div class="col-sm-2 text-center">
							<a href="{{ url('login/instagram') }}" class="socicon-btn socicon-btn-circle socicon-lg socicon-solid bg-hover-grey-salsa font-white bg-hover-white socicon-instagram tooltips" style="border:1px solid" data-original-title="Instagram"></a>
						</div>
						<div class="col-sm-2 text-center">
							<a href="{{ url('login/linkedin') }}" class="socicon-btn socicon-btn-circle socicon-lg socicon-solid bg-hover-grey-salsa font-white bg-hover-white socicon-linkedin tooltips" style="border:1px solid" data-original-title="Linkedin"></a>
						</div>
						<div class="col-sm-2 text-center">
							<a href="{{ url('login/twitter') }}" class="socicon-btn socicon-btn-circle socicon-lg socicon-solid  bg-hover-grey-salsa font-white bg-hover-white socicon-twitter tooltips" style="border:1px solid" data-original-title="Twitter"></a>
						</div>
						<div class="col-sm-2 text-center">
							<a href="{{ url('login/pinterest') }}" class="socicon-btn socicon-btn-circle socicon-lg socicon-solid bg-hover-grey-salsa font-white bg-hover-white socicon-pinterest tooltips" style="border:1px solid" data-original-title="Pinterest"></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
@endsection

