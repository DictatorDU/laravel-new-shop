@extends("admin.master")
@section("title")
{{ 'Orders-infinity.com' }}
@endsection
@section("headline")
{{ "New Orders" }}
@endsection
@section("body")
<style>
	table.dataTable thead .sorting:after {
    display: none;
	}	
	table.dataTable thead .sorting_asc:after{
		display: none;
	}
	.pending{
		color:red;
	}
	table tbody tr td{text-align: center;border-top:1px solid #333;}
    a{text-decoration: none;color:#333;}
    a span{text-decoration: none;color:#333;}
	.user-notification {color: #23527C;text-decoration: none;position: relative;display: inline-block;}
    .user-notification:hover {background: #fff;}
    .user-notification .user-badge {top: 2px;right: -3px;padding: 5px 8px;border-radius: 50%;color: white;}
    .user-notification .Red{background: red;}
</style>
<div class="border border-primary p-2">
	@if(Session::get('msg'))
     <h4 class="alert alert-success">{{ Session::get("msg") }} </h4>
    @endif   
    @if(Session::get('danger_msg'))
	 <h4 class="alert alert-danger">{{ Session::get("danger_msg") }} </h4>
    @endif
    <table id="myTable">
    	<thead>
    		<tr>
    			<th>No.</th>
    			<th>Customer</th>
    			<th>Pro. Name</th>
    			<th>Brand</th>
    			<th>Price (Per)</th>
    			<th>Quantity</th>
    			<th>Price</th>
    			<th>Pay. Gatway</th>
    			<th>Pay. Status</th>
    			<th>Date</th>
    			<th>Action</th>
    		</tr>
    	</thead>
    	<tbody>
    		@php($i=1)
    		@foreach($allOrders as $value)
    		<tr>
    			<td>{{ $i++ }}</td>
    			<td>
    			  <a href="#" class="user-notification">
	                <span>{{ $value->name }}</span>
	                <span class="user-badge Red">2</span>
	              </a>
    			</td>
    			<td>{{ $value->product_name }}</td>
    			<td>{{ $value->product_brand }}</td>
    			<td>${{ $value->product_price }}</td>
    			<td>{{ $value->product_quantity }}</td>
    			<td>${{ $value->product_quantity*$value->product_price }}</td>
    			<td>{{ $value->payment_type }}</td>
    			<td class="pending">{{ $value->payment_status }}</td>
    			<td>{{ $value->created_at }}</td>
    			<td>
    				<a href="{{ route('view_order',['id' => $value->id]) }}"><span class="glyphicon glyphicon-eye-open"></span></a>
    				||
    				<a href="{{ route('delete_order',['id' => $value->id]) }}"><span class="glyphicon glyphicon-trash"></span></a>
    			</td>
    		</tr>
    		@endforeach
    	</tbody>
    </table>
</div>
<script>
	$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
@endsection