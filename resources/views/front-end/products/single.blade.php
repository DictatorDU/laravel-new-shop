@extends("front-end.master")
@section("title")
Review Product-Infinity.com
@endsection
@section('body')
<script>
// Can also be used with $(document).ready()
$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide",
    controlNav: "thumbnails"
  });
});
</script>

  <!--mycart-->
  <!--start-rate-->
<script type="text/javascript">
			jQuery(function() {
			jQuery('.starbox').each(function() {
				var starbox = jQuery(this);
					starbox.starbox({
					average: starbox.attr('data-start-value'),
					changeable: starbox.hasClass('unchangeable') ? false : starbox.hasClass('clickonce') ? 'once' : true,
					ghosting: starbox.hasClass('ghosting'),
					autoUpdateAverage: starbox.hasClass('autoupdate'),
					buttons: starbox.hasClass('smooth') ? false : starbox.attr('data-button-count') || 5,
					stars: starbox.attr('data-star-count') || 5
					}).bind('starbox-value-changed', function(event, value) {
					if(starbox.hasClass('random')) {
					var val = Math.random();
					starbox.next().text(' '+val);
					return val;
					} 
				})
			});
		});
</script>
<!--//End-rate-->
<link href="css/owl.carousel.css" rel="stylesheet">
<script src="js/owl.carousel.js"></script>
	<script>
		$(document).ready(function() {
		$("#owl-demo").owlCarousel({
			items : 1,
			lazyLoad : true,
			autoPlay : true,
			navigation : false,
			navigationText :  false,
			pagination : true,
		});
		});
</script>
<!--banner-->
<div class="banner1">
	<div class="container">
		<h3><a href="index.html">Home</a> / <span>Single</span></h3>
	</div>
</div>
<!--banner-->

<!--content-->
<div class="content">
	<!--single-->
	<div class="single-wl3">
		<div class="container">
			<div class="single-grids">
				<div class="col-md-9 single-grid">
					@foreach($productDetials as $productDetials)
					<div clas="single-top">
						<div class="single-left">
							<div class="flexslider">
								<ul class="slides">
									<li data-thumb="{{ asset($productDetials->secondImg) }}">
										<div class="thumb-image"> <img src="{{ asset($productDetials->secondImg) }}" data-imagezoom="true" class="img-responsive"> </div>
									</li>
									<li data-thumb="{{ asset($productDetials->img) }}">
										 <div class="thumb-image"> <img src="{{ asset($productDetials->img) }}" data-imagezoom="true" class="img-responsive"> </div>
									</li>
								 </ul>
							</div>
						</div>
						<div class="single-right simpleCart_shelfItem">
							<h4>{{ $productDetials->product_name }}</h4>
							<div class="block">
								<div class="starbox small ghosting"> </div>
							</div>
							<p class="price item_price">$ {{ $productDetials->product_price }}</p>
							<div class="description">
								<p><span>Quick Overview : </span>{{ $productDetials->product_description }}</p>
							</div>
							{{ Form::open(['route'=>'/add_to_cart',"id"=>"add-cartSubmit","class"=>'form-group']) }}
							<div class="color-quality">
							  <h6>Quantity : {{ $productDetials->product_quantity }}</h6>
								<div class="quantity"> 
								  <div class="quantity-select">          
								  <input type="hidden" value="{{ $productDetials->id }}" name="id">          
								  <input type="hidden" value="{{ $productDetials->product_name }}" name="product_name">          
								  <input type="hidden" value="{{ $productDetials->product_price }}" name="product_price">          
								  <input type="hidden" value="{{ $productDetials->img }}" name="product_img">          
								  <input type="hidden" value="{{ $productDetials->brand_name }}" name="product_brand">          
                                   <select name="product_quantity" class="form-control" id="">
                                   	<option value="1">1</option>
                                   	<option value="2">2</option>
                                   	<option value="3">3</option>
                                   	<option value="4">4</option>
                                   	<option value="5">5</option>
                                   </select>
								  </div>
								</div>
							</div>
							{{ Form::close() }}
							<div class="women">
								<span class="size">XL / XXL / S </span>
								<a href="{{ route('/add_to_cart') }}"
								  onclick="event.preventDefault();
                                   document.getElementById('add-cartSubmit').submit();"
								 data-text="Add To Cart"  class="my-cart-b item_add">Add To Cart</a>
							</div>
							<div class="social-icon">
								<a href="#"><i class="icon"></i></a>
								<a href="#"><i class="icon1"></i></a>
								<a href="#"><i class="icon2"></i></a>
								<a href="#"><i class="icon3"></i></a>
							</div>
						</div>
						<div class="clearfix"> </div>
					</div>
					@endforeach
				</div>
				<div class="col-md-3 single-grid1">
					<h3>Recent Products</h3>
					@foreach($recentProduct as $value)
					<div class="recent-grids">
						<div class="recent-left">
							<a href="{{ route("/front_single_product",$value->id) }}"><img class="img-responsive " src="{{ asset($value->secondImg) }}" alt=""></a>	
						</div>
						<div class="recent-right">
							<h6 class="best2"><a href="{{ route("/front_single_product",$value->id) }}">{{ $value->product_name }}</a></h6>
							<div class="block">
								<div class="starbox small ghosting"> </div>
							</div>
							<span class=" price-in1"> $ {{ $value->product_price }}</span>
						</div>	
						<div class="clearfix"> </div>
					</div>
					@endforeach
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!--single-->
	<div class="new-arrivals-w3agile">
			<div class="container">
				<h3 class="tittle1">Releted Products</h3>
				<div class="arrivals-grids">
					@foreach($reletedProduct as $value)
					<div class="col-md-3 arrival-grid simpleCart_shelfItem">
						<div class="grid-arr">
							<div  class="grid-arrival">
								<figure>		
									<a href="{{ route("/front_single_product",$value->id) }}">
										<div class="grid-img">
											<img  src="{{ asset($value->secondImg) }}" class="img-responsive" alt="">
										</div>
										<div class="grid-img">
											<img  src="{{ asset($value->img) }}" class="img-responsive"  alt="">
										</div>			
									</a>		
								</figure>	
							</div>
							<div class="ribben">
								<p>NEW</p>
							</div>
							<div class="ribben1">
								<p>SALE</p>
							</div>
							<div class="block">
								<div class="starbox small ghosting"> </div>
							</div>
							<div class="women">
								<h6><a href="{{ route("/front_single_product",$value->id) }}">{{ $value->product_name }}</a></h6>
								<span class="size">XL / XXL / S </span>
								<p ><em class="item_price">$ {{ $value->product_price }}</em></p>
								<a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
							</div>
						</div>
					</div>
					@endforeach
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	<!--new-arrivals-->
</div>
<!--content-->
@endsection
