
<!--header-->
<div class="header">
<div class="header-top">
	<div class="container">
		 <div class="top-left">
			<a href="#"> Help  <i class="glyphicon glyphicon-phone" aria-hidden="true"></i> +0123-456-789</a>
		</div>
		<div class="top-right">
		<ul>
			@guest
			<li><a href="{{ route('login') }}">Login</a></li>
			<li><a href="{{ route('register') }}"> Create Account </a></li>
	        @else
	        <li><a href="#">{{ Auth::user()->name }}</a></li>
	        <li><a href="{{ route('order_method') }}">Checkout</a></li>
	        <li>
	        	<a class="dropdown-item" href="{{ route('logout') }}"
	                     onclick="event.preventDefault();
	                     document.getElementById('logout-form').submit();">
	               {{ __('Logout') }}
	           </a>
	             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
	             @csrf
	             <input type="hidden" name="logout" value="user">
	             </form>
	        </li>
	        @endguest
	        <li><a href="{{ route('admin.login') }}"> Admin </a></li>
		</ul>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<div class="heder-bottom">
	<div class="container">
		<div class="logo-nav">
			<div class="logo-nav-left">
				<h1><a href="{{ route('/index') }}">New Shop <span>Shop anywhere</span></a></h1>
			</div>
			<div class="logo-nav-left1">
				<nav class="navbar navbar-default">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header nav_2">
					<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div> 
				<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
					<ul class="nav navbar-nav">
						<li class="active"><a href="{{ route('/index') }}" class="act">Home</a></li>	
						<!-- Mega Menu -->
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Catagories<b class="caret"></b></a>
							<ul class="dropdown-menu multi-column columns-3">
								<div class="row">
									<div class="col-sm-3  multi-gd-img">
									  <ul class="multi-column-dropdown">
										 <li>
										 	<h3>Submenu</h3>
						 	@foreach($catagories as $value)
						    <a href="{{ route('/front_catagory_product',$value->id) }}">{{ $value->cat_name }}</a>
						    @endforeach
										 </li>
									  </ul>
									</div>
									<div class="clearfix"></div>
								</div>
							</ul>
						</li>					
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Brands<b class="caret"></b></a>
							<ul class="dropdown-menu multi-column columns-3">
								<div class="row">
									<div class="col-sm-3  multi-gd-img">
									  <ul class="multi-column-dropdown">
										 <li>
										 	<h3>Submenu</h3>
						 	@foreach($brands as $value)
						    <a href="{{ route('/front_brand_product',$value->id) }}">{{ $value->brand_name }}</a>
						    @endforeach
										 </li>
									  </ul>
									</div>
									<div class="clearfix"></div>
								</div>
							</ul>
						</li>
						
						<li><a href="{{ route('/contact') }}">Contact Us</a></li>
					</ul>
				</div>
				</nav>
			</div>
			<div class="logo-nav-right">
				<ul class="cd-header-buttons">
					<li><a class="cd-search-trigger" href="#cd-search"> <span></span></a></li>
				</ul> <!-- cd-header-buttons -->
				<div id="cd-search" class="cd-search">
					<form action="#" method="post">
						<input name="Search" type="search" placeholder="Search...">
					</form>
				</div>	
			</div>
			<div class="header-right2">
				<div class="cart box_1">
					@php($price=0)
					@php($totalProduct=0)
					@foreach($cartPrice as $value)
                    <?php $price = $price+$value->price*$value->quantity ?>
                    <?php $totalProduct = $totalProduct+$value->quantity ?>
					@endforeach
					@if($cartCount >= 1)
					<a href="{{ route("/user-checkout") }}">
						<h3 class="btn btn-success"> <div class="total">
							<span class="">$ {{ $price }}</span> (<span class=""></span>{{ $totalProduct }} items)</div>
							<img src="{{ asset('/') }}front-end/images/bag.png" alt="" />
						</h3>
					</a>
					@else
					<p><a href="javascript:;" class="simpleCart_empty btn btn-danger">Empty Cart</a></p>
					@endif
					<div class="clearfix"> </div>
				</div>	
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
</div>
<!--header-->