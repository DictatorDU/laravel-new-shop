@extends("front-end.master")
@section("title")
Signup-Infinity.com
@endsection
@section('body')
<style>
	.week{width:20px;height: 5px;background: red;}
</style>
<!--banner-->
<div class="banner1">
	<div class="container">
		<h3><a href="{{ route('/index') }}">Home</a> / <span>Registered</span></h3>
	</div>
</div>
<!--banner-->

<!--content-->
<div class="content">
		<!--login-->
	<div class="login">
<div class="main-agileits">
		<div class="form-w3agile form1">
			<h3>Register</h3>
			<form action="{{ route('register') }}" method="post" id="register-form">
				{{ csrf_field() }}
				@if ($errors->has('name'))
                <span class="invalid-feedback error" class="text-danger" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
				<div class="key">
					<i class="fa fa-user" aria-hidden="true"></i>
					<input  type="text" value="Username" name="name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Username';}" required="">
					<div class="clearfix"></div>
				</div>
				<strong><span id="emailMsg" style="color:#E80835"></span></strong>
                @if ($errors->has('email'))
                <span class="invalid-feedback error" class="text-danger" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
				<div class="key">
					<i class="fa fa-envelope" aria-hidden="true"></i>
					<input  type="text" value="Email" onkeyup="" id="signupEmail" name="email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
					<div class="clearfix"></div>
				</div>	
				<strong><span id="phoneMsg" style="color:#E80835"></span></strong>
			    @if ($errors->has('phone'))
                <span class="invalid-feedback error" class="text-danger" role="alert">
                    <strong>{{ $errors->first('phone') }}</strong>
                </span>
                @endif			
				<div class="key">
					<i class="fa fa-phone" aria-hidden="true"></i>
					<input  type="text" placeholder="Phone Number" id="phoneNum" name="phone">
					<div class="clearfix"></div>
				</div>
			    @if ($errors->has('password_confirmation'))
                <span class="invalid-feedback error" class="text-danger" role="alert">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
                @endif
				<div class="key">
					<i class="fa fa-lock" aria-hidden="true"></i>
					<input  type="password" name="password_confirmation" placeholder="Password">
					<div class="clearfix"></div>
				</div>
			    @if ($errors->has('password'))
                <span class="invalid-feedback error" class="text-danger" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
				<div class="key">
					<i class="fa fa-lock" aria-hidden="true"></i>
					<input  type="password" name="password"  placeholder="Confirm Password">
					<div class="clearfix"></div>
				</div>	
				@if ($errors->has('address'))
                <span class="invalid-feedback error" class="text-danger" role="alert">
                    <strong>{{ $errors->first('address') }}</strong>
                </span>
                @endif				
				<div class="key">
					<i class="fa fa-home" aria-hidden="true"></i>
					<input  type="text" value="Address" name="address" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Address';}">
					<div class="clearfix"></div>
				</div>
				<div class="g-recaptcha" data-sitekey="6LdBgYQUAAAAAMiA7CsWovqmdLquKvGki6nLkwAx"></div>
				<br>	
				<input type="submit" value="Save">			
			</form>
		</div>		
	</div>
</div>
<?php include('front-end/ajax/signupJs.php') ?>
</div>
<!--content-->
@endsection