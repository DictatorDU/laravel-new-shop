@extends("admin.master")
@section("title")
{{ 'addvertisement-infinity.com' }}
@endsection
@section("headline")
{{ "Advertisement Managing" }}
@endsection
@section("body")
<style>
	.section-one{
		/*margin-bottom: 10px;*/
	}
	.section-one .advertise-one{
		position:relative;
	}
	.section-one .advertise-one>span{
	    position: absolute;
	    color: #fff;
	    left: 0;
	    top: 0;
	    font-size: 90px;
	    padding-top: 29px;
	    padding-bottom: 42px;
	    padding-left: 205px;
	    padding-right: 205px;
	    background: #0000005c;
	}
	.section-one .advertise-one>span>a:hover{
		color:#999;
	}
	.section-one .advertise-one img {
	width: 50%;
	float: left;
}
	.section-one .advertise-two img {
	width: 50%;
	float: left;
}
    .section-two{
    	/*margin-top:10px;*/
    }
	.section-two .advertise-one img {
	width: 50%;
	float: left;
}
   .section-two .advertise-two img{
   	width: 50%;
   	float: left;
   }
   .mySlides {display:none;}
</style>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<div class="border border-primary p-2">
	<div class="section-one">
       <div class="advertise-one" onmouseover="advertiseOneIn()">
	     <div class="" style="max-width:500px">
	     	@foreach($advertiseOne as $value)
		   <img class="mySlides" src="{{ asset($value->img_one) }}" style="width:100%">
		   <img class="mySlides" src="{{ asset($value->img_two) }}" style="width:100%">
		   <img class="mySlides" src="{{ asset($value->img_three) }}" style="width:100%">
		   <img class="mySlides" src="{{ asset($value->img_four) }}" style="width:100%">
            @endforeach
	     </div>
	     <span onmouseout="advertiseOneOut()" id="advertise-one_icon"><a href="{{ route('/slider_edit') }}">
	     	<span class="glyphicon glyphicon-camera"></span>
	     </a></span>
        </div>
        <div class="advertise-two">
    	  <img src="{{ asset("") }}admin/img/advertise-3.JPG" alt="">
       </div>
    </div>
    <div class="section-two">
    	<div class="advertise-one">
    		<img src="{{ asset("/") }}admin/img/advertise-1.JPG" alt="">
    	</div>
    	<div class="advertise-two">
    		<img src="{{ asset("/") }}admin/img/advertise-2.JPG" alt="">
    	</div>
    </div>
</div>
<script>
document.getElementById("advertise-one_icon").style.display="none";
function advertiseOneIn(){
    document.getElementById("advertise-one_icon").style.display="block";
}
function advertiseOneOut(){
	document.getElementById("advertise-one_icon").style.display="none";
}
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 2000);    
}
</script>
@endsection