@extends("admin.master")
@section("title")
{{ 'Orders-infinity.com' }}
@endsection
@section("headline")
{{ "Order Preview" }}
@endsection
<style>
	.div-1{float:left;width: 32%;height: auto;overflow: hidden;}
	.div-2{float:left;width: 65%;height: auto;margin-left:5px;overflow: hidden;}
	.div-2 .sub-div{width: 50%;float: left;}
</style>
@section("body")
<div class="border border-primary p-2">
	@foreach($singleOrders as $value)
	<div class="div-1">
    <table class="table">
		<tr>
			<td>Customer Name</td>
			<td>{{ $value->name }}</td>
		</tr>
		<tr>
			<td>E-mail</td>
			<td>{{ $value->email }}</td>
		</tr>
		<tr>
			<td>Phone</td>
			<td>{{ $value->phone }}</td>
		</tr>
		<tr>
			<td>Address</td>
			<td>{{ $value->address }}</td>
		</tr>
    </table>
    </div>
    <div class="div-2">
    	<div class="sub-div">
		<table class="table">
			<tr>
				<td>Product Name</td>
				<td>{{ $value->product_name }}</td>
			</tr>
			<tr>
				<td>Price</td>
				<td>{{ $value->product_price }}</td>
			</tr>
			<tr>
				<td>Quantity</td>
				<td>{{ $value->product_quantity }}</td>
			</tr>
			<tr>
				<td>Total Price</td>
				<td>{{ $value->product_quantity*$value->product_price }}</td>
			</tr>
			<tr>
				<td>Brand</td>
				<td>{{ $value->product_name }}</td>
			</tr>
			<tr>
				<td><p class="btn btn-info btn-sm">Payment Status</p></td>
				<td>
					@if($value->payment_status == "pending")
					<p class="btn btn-danger btn-sm">{{ $value->payment_status }}</p>
					@endif
				</td>
			</tr>
		</table>
		</div>
		<div class="sub-div">
	      <img src="{{ asset($value->img) }}" alt="{{ $value->img }}">
	    </div>
    </div>
    <a href="" class="btn btn-info btn-lg">Order From Customer</a>
    <a href="{{ route('shipt_product',['id'=>$value->id]) }}" class="btn btn-Danger btn-lg">Shipt</a>
    @endforeach
</div>
@endsection
