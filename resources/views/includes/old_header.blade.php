<!DOCTYPE html>
<html lang="en">
<head>
<title>Khelo India Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" id="csrf" content="{{ csrf_token() }}">
<meta charset="utf-8">
<!--[if IE 7 ]>    <html class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie9"> <![endif]-->
<!--[if !IE]><!--><script>if(/*@cc_on!@*/false){document.documentElement.className='ie10';}</script><!--<![endif]-->
<link rel="shortcut icon" href="{{ asset('public/front/assets/images/favicon.png')}}" type="image/x-icon">
<link rel="icon" href="{{ asset('public/front/assets/images/favicon.png')}}" type="image/x-icon">

<link rel="stylesheet" href="{{ asset('public/front/assets/css/bootstrap.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/front/assets/css/style.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/front/assets/css/style2.css')}}">
<link rel="stylesheet" href="{{ asset('public/front/assets/css/bootstrap-icons.css')}}">
<link rel="stylesheet" href="{{ asset('public/front/assets/css/aos.css')}}">
<link rel="stylesheet" href="{{ asset('public/front/assets/css/fontawesome-all.min.css')}}" type="text/css">
<link rel="stylesheet" href="{{ asset('public/front/assets/css/jquery-ui.css')}}" type="text/css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css" type="text/css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css" type="text/css">
<script src="{{asset('public/front/assets/js/jquery.min.js')}}"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="https://rawgit.com/highcharts/rounded-corners/master/rounded-corners.js"></script>
<script src="{{ asset('public/front/assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('public/front/assets/js/owl.carousel.js')}}"></script>
<script src="{{ asset('public/front/assets/js/jquery.fancybox.pack.js')}}"></script>
<script src="{{ asset('public/front/assets/js/aos.js')}}"></script>
<script src="{{ asset('public/front/assets/js/custom.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
</head>
<body>

<header id="header">
	<nav class="navbar navbar-expand-md navbar-dark">
	  <div class="container-fluid">
	    <a class="navbar-brand" href="{{url('/')}}"><img src="{{ asset('public/front/assets/images/group-logo.svg')}}" alt=""></a>
	    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
	      <span class="fa fa-bars"></span>
	    </button>
	    <div class="collapse navbar-collapse" id="collapsibleNavbar">
	      <ul class="navbar-nav ms-auto">
				<li><a href="{{url('/')}}"><i class="fas fa-home"></i> Home</a></li>
				@guest 
				@else
				@if(Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
				<li><a href="{{route('admin.dashboard')}}"><i class="fas fa-th-large"></i> Dashboard</a></li>
				@endif
				@endguest
				<li><a href="{{url('overview')}}"><i class="fas fa-eye"></i> Scheme Overview</a></li>
				<li><a href="{{url('vertical')}}"><i class="fas fa-th-large"></i> Vertical Wise Dashboard</a></li>
				@guest
				{{-- <li><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#login"><i class="fas fa-sign-in-alt"></i> LogIn</a></li>
				@else 
				<li><a href="{{ route('user.logout') }}" onclick="event.preventDefault();
					document.getElementById('logout-form').submit();"><i class="fas fa-power-off"></i> LogOut</a></li>
					<form id="logout-form" action="{{ route('user.logout') }}" method="POST" class="d-none">
						@csrf
					</form> --}}
				@endguest
			</ul>
	    </div>
	  </div>
	</nav>
</header>
<div></div>
