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
{{-- <script src="{{ asset('public/front/assets/js/custom.js')}}"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>

    <style>
        .dropdown:hover .dropdown-menu {
            display: block;
        }

        .dropdown-menu {
            margin-top: 0;
        }
    </style>
    <script>
        $(document).ready(function () {
            $(".dropdown").hover(function () {
                var dropdownMenu = $(this).children(".dropdown-menu");
                if (dropdownMenu.is(":visible")) {
                    dropdownMenu.parent().toggleClass("open");
                }
            });
        });
    </script>

</head>

<body>
    <div class="landing-page">
        <div class="landing-page-header">
            <div class="logo  p-01 py-1">
                <a href="{{url('/')}}" class="text-decoration-none">   <img src="{{asset('public/front/assets/images/landing-page-logo.png')}}" class="img-fluid d-block mx-auto" alt="">
                </a>
                   </div>

        </div>
        <div class="landing-cover">
            <div class="landing-navbar">
                <nav class="navbar navbar-expand-lg navbar-dark  pt-0 pb-0 " id="nav-bar-position">
                    <div class="container-fluid" id="landing-page-navbar-bg">

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-lg-center justify-content-md-start justify-content-start align-items-center "
                            id="navbarNavAltMarkup">
                            <ul class="navbar-nav ">

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src="{{asset('public/front/assets/images/svg/dropdown-1.svg')}}" class="img-fluid mx-1 nav-img" alt="">
                                        INFRASTRUCTURE
                                    </a>
                                    <ul class="dropdown-menu  " aria-labelledby="navbarDropdownMenuLink">
                                        <li ><a class="dropdown-item" href="https://mdsd.kheloindia.gov.in/" target="_blank">Utilization of Sports Infrastructure</a></li>
                                        <li ><a class="dropdown-item" href="https://dashboard.kheloindia.gov.in/" target="_blank">Playfields Development</a></li>

                                    </ul>
                                </li>
                                   <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src="{{asset('public/front/assets/images/svg/dropdown-3.svg')}}" class="img-fluid mx-1 nav-img" alt="">
                                        INCLUSIVENESS
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <li><a class="dropdown-item" href="{{url('promotion-of-rural-and-indigenous-or-tribal-games')}}">Rural and Indigenous/Tribal Games</a></li>
                                        <li><a class="dropdown-item" href="{{url('sport-for-peace-and-devlopment')}}">Sports for Peace and Development</a></li>
                                        {{-- <li><a class="dropdown-item" href="{{url('promotion-of-sports-among-persons-with-disabilities')}}">Sports among Person with Disabilities</a></li> --}}
                                        <li><a class="dropdown-item" href="{{url('sports-for-women')}}">Sports for Women</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src="{{asset('public/front/assets/images/svg/dropdown-2.svg')}}" class="img-fluid mx-1 nav-img" alt="">
                                        COMPETITIONS
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <li><a class="dropdown-item" href="{{url('annual-sport')}}">Sports Competition</a></li>
                                        <li><a class="dropdown-item" href="{{url('talent-search-development')}}">Talent Search & Development</a></li>
                                        {{-- <li><a class="dropdown-item" href="{{url('community-coaching')}}">Community Coaching</a></li> --}}
                                    </ul>
                                </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src="{{asset('public/front/assets/images/svg/dropdown-4.svg')}}" class="img-fluid mx-1 nav-img" alt="">
                                        ACADEMIES
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <li><a class="dropdown-item" href="{{url('khelo-india-center-dashboard')}}">State Level Khelo India Centres</a></li>
                                        <li><a class="dropdown-item" href="{{url('support-to-national')}}">Support to Academies</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle dropstart" href="#" id="navbarDropdownMenuLink"
                                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src="{{asset('public/front/assets/images/svg/dropdown-5.svg')}}" class="img-fluid mx-1 nav-img" alt="">
                                        FIT INDIA
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <li><a class="dropdown-item" href="{{url('physical-fitness-fo-school-onging-children')}}">Physical Fitness of School Going Children</a></li>
                                        <li><a class="dropdown-item" href="https://fitindia.gov.in/schooldashboard" target="_blank">FIT India</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>