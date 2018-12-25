@extends("admin.master")
@section("title")
{{ 'addvertisement One-infinity.com' }}
@endsection
@section("headline")
{{ "Welcome Slider Info" }}
@endsection
@section("body")
<style>
	input[type='file']{
		display: none;
	} 
	.section-one{
		width: 49%;
		float: left;
	}
	.section-two{
		width: 49%;
		float: right;
	}
	.img-one,.img-two,.img-three,.img-four{
		position:relative;
		margin-bottom: 20px;
		overflow: hidden;
	}
    img{
    	width: 100%;
    }
	.img-one span,.img-two span,.img-three span,.img-four span{
    font-size: 550%;
    color: #fff;
    position: absolute;
    top: 0px;
    left: 0px;
    background: #00000061;
    padding-left: 43%;
    padding-right: 43%;
    padding-top: 11%;
    padding-bottom: 10%;
	}

	label{
		display: inline;
	}
    label>span{
    	cursor: pointer;
    }
    .btn-submit{
    	width:40%;
    	height:auto;
    	margin:0 auto;
    }
</style>
<div class="border border-primary p-2">
    @if(Session::get('msg'))
     <h4 class="alert alert-success">{!! Session::get("msg") !!} </h4>
    @endif   
    @if(Session::get('danger_msg'))
	 <h4 class="alert alert-danger">{!! Session::get("danger_msg") !!} </h4>
    @endif
	<form action="{{ route("/slider_update") }}" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
		@foreach($sliders as $value)
		<input type="hidden" name="id" value="{{ $value->id }}">
		<section class="section-one">
		<div class="img-one">
			<img id="imgOutputOne" onmouseover="mouseInOne()" />
			<img src="{{ asset($value->img_one) }}" id='inputImgOne' alt="" onmouseover="mouseInOne()" >
		   <label>
			  <input type="file" name="img_one" id="slide_one" accept="image/*" onchange="loadSlideOne(event)">
			  <span id="camera-one" onmouseout="mouseOutOne()" class="glyphicon glyphicon-camera"></span>
		   </label>
		</div>	
		<div class="img-two">
			<img id="imgOutputTwo" onmouseover="mouseInTwo()" />
			<img id='inputImgTwo' src="{{ asset($value->img_two) }}" alt="" onmouseover="mouseInTwo()" >
		   <label>
			  <input type="file" name="img_two" id="slide_two" accept="image/*" onchange="loadSlideTwo(event)">
		      <span class="glyphicon glyphicon-camera" id="camera-two" onmouseout="mouseOutTwo()"></span>
		   </label>
		</div>	
		</section>
		<section class="section-two">
		<div class="img-three">
			<img id="imgOutputThree" onmouseover="mouseInThree()" />
			<img id="inputImgThree" src="{{ asset($value->img_three) }}" alt="" onmouseover="mouseInThree()" >
		   <label>
			  <input type="file" name="img_three" id="slide_three" accept="image/*" onchange="loadSlideThree(event)">
			  <span id="camera-three" onmouseout="mouseOutThree()" class="glyphicon glyphicon-camera"></span>
		   </label>
		</div>		
		<div class="img-four">
			<img id="imgOutputFour" onmouseover="mouseInFour()" />
			<img id="inputImgFour" src="{{ asset($value->img_four) }}" alt="" onmouseover="mouseInFour()" >
		   <label>
			  <input type="file" name="img_four" id="slide_four" accept="image/*" onchange="loadSlideFour(event)">
			  <span id="camera-four" onmouseout="mouseOutFour()" class="glyphicon glyphicon-camera"></span>
		   </label>
		</div>
		</section>	
		@endforeach
		<div class="btn-submit">
		<input type="submit" name="submit" value="Save" class="btn btn-info btn-lg btn-block">
		</div>
	</form>
</div>
<script>
	document.getElementById("camera-one").style.display = "none";
	document.getElementById("camera-two").style.display = "none";
	document.getElementById("camera-three").style.display = "none";
	document.getElementById("camera-four").style.display = "none";

	function mouseInOne(){
		document.getElementById("camera-one").style.display = "block";
	}	
	function mouseInTwo(){
		document.getElementById("camera-two").style.display = "block";
	}	
	function mouseInThree(){
		document.getElementById("camera-three").style.display = "block";
	}	
	function mouseInFour(){
		document.getElementById("camera-four").style.display = "block";
	}	

	function mouseOutOne(){
		document.getElementById("camera-one").style.display = "none";
	}	
	function mouseOutTwo(){
		document.getElementById("camera-two").style.display = "none";
	}	
	function mouseOutThree(){
		document.getElementById("camera-three").style.display = "none";
	}	
	function mouseOutFour(){
		document.getElementById("camera-four").style.display = "none";
	}
</script>
<script>
	document.getElementById("imgOutputOne").style.display = "none";
	  var loadSlideOne = function(event) {
	  var imgOutputOne = document.getElementById('imgOutputOne');
	  imgOutputOne.src = URL.createObjectURL(event.target.files[0]);
	  document.getElementById("imgOutputOne").style.display = "block"; 
	  document.getElementById("inputImgOne").style.display = "none";
	};	

	document.getElementById("imgOutputTwo").style.display = "none";
	  var loadSlideTwo = function(event) {
	  var imgOutputTwo = document.getElementById('imgOutputTwo');
	  imgOutputTwo.src = URL.createObjectURL(event.target.files[0]);
	  document.getElementById("imgOutputTwo").style.display = "block"; 
	  document.getElementById("inputImgTwo").style.display = "none";
	};	

	document.getElementById("imgOutputThree").style.display = "none";
	  var loadSlideThree = function(event) {
	  var imgOutputThree = document.getElementById('imgOutputThree');
	  imgOutputThree.src = URL.createObjectURL(event.target.files[0]);
	  document.getElementById("imgOutputThree").style.display = "block"; 
	  document.getElementById("inputImgThree").style.display = "none";
	};

	document.getElementById("imgOutputFour").style.display = "none";
	  var loadSlideFour = function(event) {
	  var imgOutputFour = document.getElementById('imgOutputFour');
	  imgOutputFour.src = URL.createObjectURL(event.target.files[0]);
	  document.getElementById("imgOutputFour").style.display = "block"; 
	  document.getElementById("inputImgFour").style.display = "none";
	};	

</script>
@endsection