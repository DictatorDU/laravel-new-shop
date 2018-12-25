@extends("front-end.master")
@section("title")
Home-Infinity.com
@endsection
@section('body')
<style>
    .container{width:70%;margin:0 auto;height: auto;margin-top:20px;}
	.left{width: 45%;float: left;margin-right: 10px;}
	.left table{}
	.left table tr{}
	.left table tr td{color:#555;font-size: 15px;}	
	.right{width: 50%;float: left;}
	.right table{}
	.right table tr{}
	.right table tr td{color:#555;font-size: 15px;}
	.shopping{width: 25%;height: auto;float: right;margin-right: 35px;margin-bottom:20px;}
	.shopping a{float: right;margin-left: 5px}
	#order{padding-left: 60px;padding-right: 60px;font-size: 35px;}
	.empty-cart{margin-top: 15px;margin-left: 25%;margin-right: 25%;}
</style>
<!--header-->
<!--banner-->
<div class="banner1">
	<div class="container">
		<h3><a href="{{ Route('/index') }}">Home</a> / <span>Checkout</span></h3>
	</div>
</div>
<!--banner-->

<!--content-->
<div class="content">
	<div class="">
		<div class="container">
			@if(isset($allCartData))
			<div class="left">
                @php($totalProduct=0)
                @php($totalPrice=0)
				@foreach($allCartData as $value)
				<?php
				 $totalProduct = $totalProduct+$value->quantity;
				 $perTotal = $value->quantity * $value->price;
				 $totalPrice = $perTotal+$totalPrice;
                ?>
				@endforeach
				<table class="table table-bordered table-responsive table-striped">
					<tr>
						<td>Total Product</td>
						<td>{{ $totalProduct }}</td>
					</tr>					
					<tr>
						<td>Price</td>
						<td>${{ $totalPrice }}</td>
					</tr>					
					<tr>
						<td>Vat</td>
						<td>$0.00</td>
					</tr>					
					<tr>
						<td>Total Price</td>					
						<td>${{ $totalPrice }}</td>
					</tr>
				</table>
			</div>
			<div class="right">
				@foreach($customerInfo as $value)
				<table class="table table-bordered table-responsive table-striped">
					<tr>
						<td>Customer Name</td>
						<td>{{ $value->name }}</td>
					</tr>					
					<tr>
						<td>Phone</td>
						<td>{{ $value->phone }}</td>
					</tr>					
					<tr>
						<td>E-mail</td>
						<td>{{ $value->email }}</td>
					</tr>					
					<tr>
						<td>Address</td>
						<td>{{ $value->address }}</td>
					</tr>
				</table>
				@endforeach
			</div>
			<div class="shopping">
				<a href="{{ route('order_method') }}" class="btn btn-lg btn-danger">Continue</a>
			</div>
			@else
			<img class="empty-cart image-responsive" src="https://www.protectabed.com/wp/wp-content/uploads/2017/07/empty-cart-icon-1.jpg" alt="">
			@endif
		</div>
	</div>
<!-- checkout -->	
</div>
@endsection