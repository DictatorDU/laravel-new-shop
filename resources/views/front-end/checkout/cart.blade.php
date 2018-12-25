@extends("front-end.master")
@section("title")
Home-Infinity.com
@endsection
@section('body')
<style>
	select{padding:5px;}
	img{margin-top:-15px;}
      .content{overflow: scroll;}
      .empty-cart{margin-top: 15px;margin-left: 25%;margin-right: 25%;}
      .phurche .left{display:inline;float:left;}
      .phurche .right{display: inline;}
      .phurche .center{display: inline;float:left;margin-left: 20%;margin-right: 20%;}
      .phurche .right img{float: right;}
</style>
<!--header-->
<!--banner-->
<div class="banner1">
	<div class="container">
		<h3><a href="{{ Route('/index') }}">Home</a> / <span>Cart</span></h3>
	</div>
</div>
<!--banner-->

<!--content-->
<div class="content">
	<div class="">
		<div class="container">
            @if(isset($allCartData))
            <table class="table">
            	<thead>
            	<tr>
            		<th>No.</th>
                <th>Name</th>
            		<th>Per Price</th>
            		<th>Brand</th>
            		<th>Image</th>
                <th>Quantity</th>
            		<th>Total Price</th>
            		<th>Action</th>
            	</tr>
            	</thead>
            	<tbody>
                  @php($i=1)
                  @php($totalProduct=0)
                  @php($totalPrice=0)
                  @foreach($allCartData as $value)
                  <?php 
                  $totalProduct = $totalProduct+$value->quantity;
                  ?>
            	<tr>
            		<td>{!! $i++ !!}</td>
                <td>{{ $value->name }}</td>
                <td>($) {{ $value->price }}</td>
            		<td>{{ $value->attributes->brand }}</td>
            		<td><img width="50px" src="{{ asset($value->attributes->img) }}" alt="Img"></td>
            		<td>
            			{{ Form::open(['route'=>'/productQuantityUpCart','id'=>'cart-id']) }}
                      <input type="hidden" name="id" value="{{ $value->id }}">
            			 <select name="quantity" id="">
                    <option value="{{ $value->quantity }}">{{ $value->quantity }}</option>
            			  <option value="1">1</option>
            			  <option value="2">2</option>
            			  <option value="3">3</option>
                    <option value="4">4</option>
            			  <option value="5">5</option>
            			 </select>
            			  <input type="submit" name="submit" value="Change" class="btn btn-sm btn-success">
            			{{ Form::close() }}
            		</td>
                        <td>
                           ($) {!! $value->quantity * $value->price !!}
                           <?php 
                           $perTotal = $value->quantity * $value->price;
                           $totalPrice = $perTotal+$totalPrice;
                           ?>
                        </td>
            		<td>
                        <a href="{{ route('/front_single_product',['id' => $value->id]) }}">
                        <span class="glyphicon glyphicon-eye-open btn btn-success"></span>
                        </a>
                         <a href="{{ route('/removeCart',['id' => $value->id]) }}">
                        <span class="glyphicon glyphicon-trash btn btn-danger"></span>
                        </a>                         
            		</td>
            	</tr>
                  @endforeach
            	</tbody>
            </table>
            <div class="phurche" width='100%'>
             <div class="left">
                <a href="{{ route('/index') }}"><img src="{{ asset('/') }}front-end/images/Continue-Shopping-Button.png" alt=""></a>
             </div>
             <div class="center">
                   <table>
                         <tr>
                            <td>Total Product</td>
                            <td> : </td>
                            <td> {{ $totalProduct }}</td>
                         </tr>
                         <tr>
                            <td>Total VAT</td>
                            <td> : </td>
                            <td> $0.00(5%)</td>
                         </tr>                   
                          <tr>
                            <td class="text-success h4"><strong>Total Price <strong></td>
                            <td> : </td>
                            <td><strong> ${{ $totalPrice }}</strong></td>
                         </tr>
                   </table>
             </div>
             <div class="right">
                <a href="{{ route('order_preview') }}"><img src="{{ asset('/') }}front-end/images/check.png" alt="" width="250px" height="85px"></a>
              </div>
            </div>
            @else
            <img class="empty-cart image-responsive" src="https://www.protectabed.com/wp/wp-content/uploads/2017/07/empty-cart-icon-1.jpg" alt="">
            @endif
		</div>
	</div>
<!-- checkout -->	
</div>
<?php include('front-end/ajax/checkoutJs.php') ?>
@endsection