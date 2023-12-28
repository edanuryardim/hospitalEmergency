<!doctype html>
<html lang="en">

<head>
    <title>:: Hospital</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="eda">
    <meta name="author" content="eda">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/fullcalendar/fullcalendar.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/vendor/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}">
    <!-- MAIN Project CSS file -->
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/metisMenu/metisMenu.css')}}">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="{{asset('assets/css/chatapp.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">





    <link rel="stylesheet" href="{{asset('assets/vendor/sweetalert/sweetalert.css')}}" />


</head>

<body data-theme="light" class="font-nunito">
    <div id="wrapper" class="theme-cyan">

        <!-- Page Loader -->
        <div class="page-loader-wrapper">
            <div class="loader">
                <div class="m-t-30"><img src="{{asset('assets/images/logo-icon.svg')}}" width="48" height="48" alt="Iconic"></div>
                <p>Please wait...</p>
            </div>
        </div>

        <!-- Top navbar div start -->
        <nav class="navbar navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-brand">
                    <button type="button" class="btn-toggle-offcanvas"><i class="fa fa-bars"></i></button>
                    <button type="button" class="btn-toggle-fullwidth"><i class="fa fa-bars"></i></button>
                    <a href="index.html">Hospital</a>
                </div>

                <div class="navbar-right">


                    <div id="navbar-menu">
                        <ul class="nav navbar-nav">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                                    <i class="fa fa-bell"></i>
                                    <span class="notification-dot"></span>
                                </a>
                                <ul class="dropdown-menu notifications">
                                    <li class="header"><strong>You have 4 new Notifications</strong></li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="media">
                                                <div class="media-left">
                                                    <i class="icon-info text-warning"></i>
                                                </div>
                                                <div class="media-body">
                                                    <p class="text">Campaign <strong>Holiday Sale</strong> is nearly reach budget limit.</p>
                                                    <span class="timestamp">10:00 AM Today</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="media">
                                                <div class="media-left">
                                                    <i class="icon-like text-success"></i>
                                                </div>
                                                <div class="media-body">
                                                    <p class="text">Your New Campaign <strong>Holiday Sale</strong> is approved.</p>
                                                    <span class="timestamp">11:30 AM Today</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="media">
                                                <div class="media-left">
                                                    <i class="icon-pie-chart text-info"></i>
                                                </div>
                                                <div class="media-body">
                                                    <p class="text">Website visits from Twitter is 27% higher than last week.</p>
                                                    <span class="timestamp">04:00 PM Today</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="media">
                                                <div class="media-left">
                                                    <i class="icon-info text-danger"></i>
                                                </div>
                                                <div class="media-body">
                                                    <p class="text">Error on website analytics configurations</p>
                                                    <span class="timestamp">Yesterday</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="footer"><a href="javascript:void(0);" class="more">See all notifications</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="{{route('logout')}}" class="icon-menu"><i class="fa fa-power-off"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <!-- main left menu -->
        <div id="left-sidebar" class="sidebar">
            <button type="button" class="btn-toggle-offcanvas"><i class="fa fa-arrow-left"></i></button>
            <div class="sidebar-scroll">
                <div class="user-account">
                    <img src="../assets/images/user.png" class="rounded-circle user-photo" alt="User Profile Picture">
                    <div class="dropdown">
                        <span>Welcome

                            @if (auth()->user()->role=="admin")
                            Admin Panel
                            @elseif (auth()->user()->role=="secretary")
                            Secretary Panel

                            @endif
                            ,</span>
                        <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong>
                                @if (Auth::check())
                                {{ Auth::user()->name }} {{ Auth::user()->surname }}
                                @endif
                            </strong></a>
                        <ul class="dropdown-menu dropdown-menu-right account">
                            <li><a href="doctor-profile.html"><i class="icon-user"></i>My Profile</a></li>
                            <li><a href="app-inbox.html"><i class="icon-envelope-open"></i>Messages</a></li>
                            <li><a href="javascript:void(0);"><i class="icon-settings"></i>Settings</a></li>
                            <li class="divider"></li>
                            <li><a href="page-login.html"><i class="icon-power"></i>Logout</a></li>
                        </ul>
                    </div>
                    <hr>
                    <ul class="row list-unstyled">
                        <li class="col-4">
                            <small>Patients</small>
                            <h6>{{$patients->Count()}}</h6>
                        </li>
                        <li class="col-4">
                            <small>Available Beds</small>
                            <h6>{{$beds->where('is_occupied','0')->count()}}</h6>
                        </li>
                        <li class="col-4">
                            <small>Doctors</small>
                            <h6>{{$doctors->count()}}</h6>
                        </li>
                    </ul>
                </div>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs">
                    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#menu">Menu</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Chat"><i class="icon-book-open"></i></a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#setting"><i class="icon-settings"></i></a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#question"><i class="icon-question"></i></a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content padding-0">
                    <div class="tab-pane active" id="menu">
                        <nav id="left-sidebar-nav" class="sidebar-nav">
                            <ul class="metismenu li_animation_delay">
                                <li class="active"><a href="javascript:void(0);" class="has-arrow"><i class="fa fa-dashboard"></i><span>Dashboard</span></a>
                                    <ul>
                                        <li class="active"><a href="{{route('dashboard')}}">Hospital Analytics</a></li>

                                    </ul>
                                </li>

                                <li><a href="javascript:void(0);" class="has-arrow"><i class="fa fa-user"></i><span>Patients</span></a>
                                    <ul>

                                        <li><a href="{{route('patients')}}">All Patients</a></li>
                                        <li><a href="{{route('addpatientIndex')}}">Add Patient</a></li>



                                    </ul>
                                </li>
                                <li><a href="javascript:void(0);" class="has-arrow"><i class="fa fa-user-md"></i><span>Doctors</span></a>
                                    <ul>

                                        <li><a href="{{route('doctors')}}">All Doctors</a></li>

                                    </ul>
                                </li>
                                <li><a href="javascript:void(0);" class="has-arrow"><i class="fa fa-user-md"></i><span>Nurses</span></a>
                                    <ul>

                                        <li><a href="{{route('nurses')}}">All Nurses</a></li>

                                    </ul>
                                </li>
                                <li><a href="javascript:void(0);" class="has-arrow"><i class="fa fa-tag"></i><span>Daily Work</span></a>
                                    <ul>
                                        <li><a href="{{route('dailywork')}}">View all </a></li>


                                    </ul>
                                </li>
                                <li><a href="javascript:void(0);" class="has-arrow"><i class="fa fa-building"></i><span>Room Allotment</span></a>
                                    <ul>
                                        <li><a href="{{route('rooms')}}">View Rooms</a></li>

                                    </ul>
                                </li>
                                @if(Auth::user()->role == "admin")
                                <li><a href="javascript:void(0);" class="has-arrow"><i class="fa fa-user"></i><span>User Settings</span></a>
                                    <ul>
                                        <li><a href="{{route('users')}}">All Users</a></li>

                                    </ul>
                                </li>
                                @endif
                                <li><a href="javascript:void(0);" class="has-arrow"><i class="fa fa-paper-plane"></i><span>Chat</span></a>
                                    <ul>

                                        <li><a href="{{route('chat')}}">Chatbox</a></li>

                                    </ul>
                                </li>

                            </ul>
                        </nav>
                    </div>
                    <div class="tab-pane" id="Chat">
                        <form>
                            <div class="input-group m-b-20">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-magnifier"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Search...">
                            </div>
                        </form>
                        <ul class="right_chat list-unstyled li_animation_delay">
                            @foreach ($doctors as $key => $doctor)
                            @if ($key < 6) <li>
                                <a href="javascript:void(0);" class="media">
                                    <img class="media-object" src="{{$doctor->image}}" alt="">
                                    <div class="media-body">
                                        <span class="name d-flex justify-content-between">{{ $doctor->name }} </span>
                                        <span class="message">{{ $doctor->email }}</span>
                                    </div>
                                </a>
                                </li>
                                @else
                                @break
                                @endif
                                @endforeach





                                <li>
                                    <a href="{{route('doctors')}}" class="btn btn-block btn-primary">View all Doctors</a>
                                </li>
                        </ul>
                    </div>
                    <div class="tab-pane" id="setting">
                        <h6>Choose Skin</h6>
                        <ul class="choose-skin list-unstyled">
                            <li data-theme="purple">
                                <div class="purple"></div>
                            </li>
                            <li data-theme="blue">
                                <div class="blue"></div>
                            </li>
                            <li data-theme="cyan" class="active">
                                <div class="cyan"></div>
                            </li>
                            <li data-theme="green">
                                <div class="green"></div>
                            </li>
                            <li data-theme="orange">
                                <div class="orange"></div>
                            </li>
                            <li data-theme="blush">
                                <div class="blush"></div>
                            </li>
                            <li data-theme="red">
                                <div class="red"></div>
                            </li>
                        </ul>

                        <ul class="list-unstyled font_setting mt-3">
                            <li>
                                <label class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" name="font" value="font-nunito" checked="">
                                    <span class="custom-control-label">Nunito Google Font</span>
                                </label>
                            </li>
                            <li>
                                <label class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" name="font" value="font-ubuntu">
                                    <span class="custom-control-label">Ubuntu Font</span>
                                </label>
                            </li>
                            <li>
                                <label class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" name="font" value="font-raleway">
                                    <span class="custom-control-label">Raleway Google Font</span>
                                </label>
                            </li>
                            <li>
                                <label class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" name="font" value="font-IBMplex">
                                    <span class="custom-control-label">IBM Plex Google Font</span>
                                </label>
                            </li>
                        </ul>

                        <ul class="list-unstyled mt-3">
                            <li class="d-flex align-items-center mb-2">
                                <label class="toggle-switch theme-switch">
                                    <input type="checkbox">
                                    <span class="toggle-switch-slider"></span>
                                </label>
                                <span class="ml-3">Enable Dark Mode!</span>
                            </li>
                            <li class="d-flex align-items-center mb-2">
                                <label class="toggle-switch theme-rtl">
                                    <input type="checkbox">
                                    <span class="toggle-switch-slider"></span>
                                </label>
                                <span class="ml-3">Enable RTL Mode!</span>
                            </li>
                            <li class="d-flex align-items-center mb-2">
                                <label class="toggle-switch theme-high-contrast">
                                    <input type="checkbox">
                                    <span class="toggle-switch-slider"></span>
                                </label>
                                <span class="ml-3">Enable High Contrast Mode!</span>
                            </li>
                        </ul>

                        <hr>



                    </div>
                    <div class="tab-pane" id="question">
                        <form>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-magnifier"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Search...">
                            </div>
                        </form>
                        <ul class="list-unstyled question">
                            <li class="menu-heading">HOW-TO</li>
                            <li><a href="javascript:void(0);">How to Create Campaign</a></li>
                            <li><a href="javascript:void(0);">Boost Your Sales</a></li>
                            <li><a href="javascript:void(0);">Website Analytics</a></li>
                            <li class="menu-heading">ACCOUNT</li>
                            <li><a href="javascript:void(0);">Cearet New Account</a></li>
                            <li><a href="javascript:void(0);">Change Password?</a></li>
                            <li><a href="javascript:void(0);">Privacy &amp; Policy</a></li>
                            <li class="menu-heading">BILLING</li>
                            <li><a href="javascript:void(0);">Payment info</a></li>
                            <li><a href="javascript:void(0);">Auto-Renewal</a></li>
                            <li class="menu-button mt-3">
                                <a href="../docs/index.html" class="btn btn-primary btn-block">Documentation</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
