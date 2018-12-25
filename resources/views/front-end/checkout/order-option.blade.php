@extends("front-end.master")
@section("title")
Home-Infinity.com
@endsection
@section('body')
<style>
    .main-content{width:40%;margin:0 auto;height: auto;margin-top:20px;margin-bottom: 50px;}
    .main-content a{padding-left:20px;padding-right: 20px;font-size: 20px;}
	    .chkbox {
	    display: block;
	    position: relative;
	    padding-left: 35px;
	    margin-bottom: 12px;
	    cursor: pointer;
	    font-size: 22px;
	    -webkit-user-select: none;
	    -moz-user-select: none;
	    -ms-user-select: none;
	    user-select: none;
	}

	/* Hide the browser's default radio button */
	.chkbox input {
	    position: absolute;
	    opacity: 0;
	    cursor: pointer;
	}

	/* Create a custom radio button */
	.checkmark {
	    position: absolute;
	    top: 0;
	    left: 0;
	    height: 25px;
	    width: 25px;
	    background-color: #eee;
	    border-radius: 50%;
	}

	/* On mouse-over, add a grey background color */
	.chkbox:hover input ~ .checkmark {
	    background-color: #ccc;
	}

	/* When the radio button is checked, add a blue background */
	.chkbox input:checked ~ .checkmark {
	    background-color: #2196F3;
	}

	/* Create the indicator (the dot/circle - hidden when not checked) */
	.checkmark:after {
	    content: "";
	    position: absolute;
	    display: none;
	}

	/* Show the indicator (dot/circle) when checked */
	.chkbox input:checked ~ .checkmark:after {
	    display: block;
	}

	/* Style the indicator (dot/circle) */
	.chkbox .checkmark:after {
	 	top: 9px;
		left: 9px;
		width: 8px;
		height: 8px;
		border-radius: 50%;
		background: white;
	}
	#submit{
		float: right;
		margin-bottom: 10px;
	}
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
			<div class="main-content">
				{{ Form::open(['route'=>'paymentMethod']) }}
				<table class="table table-striped table-bordered">
					<tr>
						<td>
						<label class="chkbox">Cash in Delivery
						  <input value="cid" type="radio" checked="checked" name="payment">
						  <span class="checkmark"></span>
						</label>
						</td>						
						<td>
							<label class="chkbox">Bkash
							  <input value="bkash" type="radio" name="payment">
							  <span class="checkmark"></span>
							</label>
						</td>			
					  </tr>					
					  <tr>
						<td>
							<label class="chkbox">Datch Bangla
							  <input value="dbl" type="radio" name="payment">
							  <span class="checkmark"></span>
							</label>
						</td>						
						<td>
							<label class="chkbox">Paypal
							  <input value="paypal" type="radio" name="payment">
							  <span class="checkmark"></span>
							</label>
						</td>			
					  </tr>					
					  <tr>
						<td>
							<label class="chkbox">Payoneer
							  <input value="payoneer" type="radio" name="payment">
							  <span class="checkmark"></span>
							</label>
						</td>						
						<td>
							<label class="chkbox">Bank Asia
							  <input value="bankAsia" type="radio" name="payment">
							  <span class="checkmark"></span>
							</label>
						</td>			
					  </tr>
				</table>
				<input type="submit" value="Select & Continue" id="submit" class="btn btn-success btn-lg">
				{{ Form::close() }}
			</div>
		</div>
	</div>
<!-- checkout -->	
</div>
@endsection