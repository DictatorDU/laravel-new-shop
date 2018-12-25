@extends("admin.master")
@section("title")
{{ 'Manage Product-infinity.com' }}
@endsection
@section("headline")
{{ "Manage Product" }}
@endsection
@section("body")
<style>
	tr td,th{text-align: center;}
	.alert-success{display:block;}
</style>
<div class="form-group border">
	<h3 class="text-success">{{ Session::get("msg") }}</h3>
   <table class="table" id="myTable">
   	   <thead>
   	   	     <tr>
   	   	     	<th>No.</th>
   	   	     	<th>Catagory</th>
   	   	     	<th>Brand</th>
   	   	     	<th>Product Name</th>
   	   	     	<th>Image</th>
   	   	     	<th>Price</th>
   	   	     	<th>Quantity</th>
   	   	     	<th>Publication Status</th>
   	   	     	<th>Action</th>
   	   	     </tr>
   	   </thead>
   	   <tbody>  
   	   @php($i=1)
   	   @foreach ($products as $value)	   	      	   	      
   	   	     <tr>
   	   	     	<td>{{ $i++ }}</td>
   	   	     	<td>{{ $value->cat_name }}</td>
   	   	     	<td>{{ $value->brand_name }}</td>
   	   	     	<td>{{ $value->product_name }}</td>
   	   	     	<td><img height="70px" src="{{ asset( $value->img ) }}" alt="Product Picture"></td>
   	   	     	<td>{{ $value->product_price }}</td>
   	   	     	<td>{{ $value->product_quantity }}</td>
   	   	     	<td>
   	   	     		@if($value->publication_status == 1)
   	   	     		{{ "Published" }}
   	   	     		@elseif($value->publication_status == 2)
   	   	     		{{ "Un-published" }}
   	   	     		@endif
   	   	     	</td>
   	   	     	<td><a class="btn btn-info btn-sm" href="{{ route('/edit_product',['product_id' => $value->id ]) }}"><span class="glyphicon glyphicon-edit"></span></a> <a class="btn btn-danger btn-sm" href="#"><span  class="glyphicon glyphicon-trash"></span></a></td>
   	   	     </tr>
   	   	   @endforeach
   	   </tbody>
   </table>
</div>
@endsection