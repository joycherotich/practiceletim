<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>LIBERTY INSURANCE PORTAL </title>


    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.png') }}">
<!-- 
    <link href="{{ asset('libs/owl-carousel/owl.carousel.css') }}" rel="stylesheet"> -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">   
    <link href="{{ asset('css/LineIcons.css') }}" rel="stylesheet">

    <link href="{{ asset('css/imports.css') }}" rel="stylesheet">
    <link href="{{ asset('libs/icons/font-awesome-old/css/font-awesome.min.css') }}" rel="stylesheet">
    <script src="{{ asset('js/numeral.min.js') }}"></script>
    <link href="{{ asset('libs/jquery-steps/css/jquery.steps.css') }}" rel="stylesheet">
   



</head>

<body>


<span class="text-center" id="master_loader" style="display:;z-index:99999!important;">
        <!-- <img src="{{asset('images/loading.gif')}}" alt="loader" style="max-height:40px; max-width:40px; top:5%; left:50%;z-index: 9999;position:fixed;" /> -->
    </span>



    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="#" class="brand-logo">
                <img class="logo-compact" src="{{ asset('images/logo.png') }}" alt="">
                <img class="logo-compact" src="{{ asset('images/favicon.png') }}" alt="">
                <img class="brand-title" src="{{ asset('images/logo.png') }}" alt="">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>



        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="dashboard_bar">
                               LIBERTY PORTAL
                            </div>
                        </div>

                        <ul class="navbar-nav header-right">

                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="javascript:;" role="button" data-toggle="dropdown">
                                    <img src="{{ asset('images/user7.jpg') }}" width="20" alt="" />
                                    <div class="header-info">
                                        <!-- <span>{{@session('fname')}}<strong> {{@session('lname')}}</strong></span> -->
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="{{ URL::to('/profile') }}" class="dropdown-item ai-icon">
                                        <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>
                                        <span class="ml-2">Profile </span>
                                       
                                    </a>

                                    <a href="{{ URL::to('/logout') }}" class="dropdown-item ai-icon">
                                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                            <polyline points="16 17 21 12 16 7"></polyline>
                                            <line x1="21" y1="12" x2="9" y2="12"></line>
                                        </svg>
                                        <span class="ml-2">Logout </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end 
        ***********************************-->
    <link href="{{ asset('libs/owl-carousel/owl.carousel.css') }}" rel="stylesheet">