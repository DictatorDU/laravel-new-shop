@extends("front-end.master")
@section("title")
Login-Infinity.com
@endsection
@section('body')
<!--banner-->
<div class="banner1">
	<div class="container">
		<h3><a href="index.html">Home</a> / <span>Login</span></h3>
	</div>
</div>
<!--banner-->

<!--content-->
<div class="content">
		<!--login-->
	<div class="login">
		<div class="main-agileits">
			<div class="form-w3agile">
				<h3>Login To New Shop</h3>
				<form action="{{ route('login') }}" method="post">
					{{ csrf_field() }}
		            @if ($errors->has('email'))
                       <span class="invalid-feedback error" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                       </span>
                    @endif
					<div class="key">
						<i class="fa fa-envelope" aria-hidden="true"></i>
						<input  type="text" name="email" placeholder="E-mail">
						<div class="clearfix"></div>
					</div>
		            @if ($errors->has('password'))
                       <span class="invalid-feedback error" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                       </span>
                    @endif
					<div class="key">
						<i class="fa fa-lock" aria-hidden="true"></i>
						<input  type="password" name="password" placeholder="Password">
						<div class="clearfix"></div>
					</div>
					<input type="submit" value="Login" name="submit">
				</form>
			</div>
			<div class="forg">
				<a href="#" class="forg-left">Forgot Password</a>
				<a href="{{ route('register') }}" class="forg-right">Register</a>
			<div class="clearfix"></div>
			</div>
		</div>
	</div>
		<!--login-->
</div>
<!--content-->
@endsection