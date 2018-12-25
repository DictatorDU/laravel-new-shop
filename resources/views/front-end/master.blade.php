
<!DOCTYPE HTML>
<html>
<head>
<title>@yield("title") </title>
<!--css-->
<meta name="csrf-token" content="{{ csrf_token() }}" >
<link href="{{ asset('/') }}front-end/css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
<link href="{{ asset('/') }}front-end/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="{{ asset('/') }}front-end/css/font-awesome.css" rel="stylesheet">
<!--css-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="New Shop Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="{{ asset('/') }}front-end/js/jquery.min.js"></script>
<link href='{{ asset('/') }}front-end///fonts.googleapis.com/css?family=Cagliostro' rel='stylesheet' type='text/css'>
<link href='{{ asset('/') }}front-end///fonts.googleapis.com/css?family=Open+Sans:400,800italic,800,700italic,700,600italic,600,400italic,300italic,300' rel='stylesheet' type='text/css'>
<!--search jQuery-->
<script src="{{ asset('/') }}front-end/js/main.js"></script>
<link href="{{ asset('/') }}front-end/css/coreSlider.css" rel="stylesheet" type="text/css">
<script src="{{ asset('/') }}front-end/js/coreSlider.js"></script>
<!--search jQuery-->
<script src="{{ asset('/') }}front-end/js/responsiveslides.min.js"></script>
<script type="text/javascript" src="{{ asset('/') }}front-end/js/jquery-ui.js"></script>
<script type="text/javascript" src="{{ asset('/') }}front-end/js/bootstrap-3.1.1.min.js"></script>
<!-- cart -->
<script src="{{ asset('/') }}front-end/js/simpleCart.min.js"></script>
<!-- cart -->
<!--start-rate-->
<script src="{{ asset('/') }}front-end/js/jstarbox.js"></script>
<link rel="stylesheet" href="{{ asset('/') }}front-end/css/jstarbox.css" type="text/css" media="screen" charset="utf-8" />
<script defer src="{{ asset('/') }}front-end/js/jquery.flexslider.js"></script>
<link rel="stylesheet" href="{{ asset('/') }}front-end/css/flexslider.css" type="text/css" media="screen" />
<script src="{{ asset('/') }}front-end/js/imagezoom.js"></script>
<script src="{{ asset('/') }}front-end/js/jstarbox.js"></script>
<link rel="stylesheet" href="{{ asset('/') }}front-end/css/jstarbox.css" type="text/css" media="screen" charset="utf-8" />
<script src='https://www.google.com/recaptcha/api.js'></script>
{{-- <script src='https://www.google.com/recaptcha/api.js?render=6LfjhIQUAAAAANsUKvoh66SqMI5dyRLthIH7coTV'></script> --}}
<!--//End-rate-->
</head>
<body>
{{-- Header --}}
@include("front-end.inc.header")



@yield("body")


{{-- Footer --}}
@include("front-end.inc.footer")
