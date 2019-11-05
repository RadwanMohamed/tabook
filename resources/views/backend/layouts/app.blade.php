<!DOCTYPE html>
<html lang="en" data-textdirection="rtl" class="loading">

<!-- Mirrored from pixinvent.com/stack-responsive-bootstrap-4-admin-template/html/rtl/vertical-menu-template-semi-dark/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 27 Aug 2017 12:39:52 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
          content="Stack admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
          content="admin template, stack admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Tabook - @yield("title")</title>
    <link rel="apple-touch-icon" href="{{asset("backend/app-assets/images/ico/apple-icon-120.png")}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset("backend/app-assets/images/ico/favicon.ico")}}">
    <link
        href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i"
        rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset("backend/app-assets/css-rtl/bootstrap.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("backend/app-assets/fonts/feather/style.min.css")}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset("backend/app-assets/fonts/font-awesome/css/font-awesome.min.css")}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset("backend/app-assets/fonts/flag-icon-css/css/flag-icon.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("backend/app-assets/vendors/css/extensions/pace.css")}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset("backend/app-assets/vendors/css/charts/jquery-jvectormap-2.0.3.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("backend/app-assets/vendors/css/charts/morris.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("backend/app-assets/vendors/css/extensions/unslider.css")}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset("backend/app-assets/vendors/css/weather-icons/climacons.min.css")}}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN STACK CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset("backend/app-assets/css-rtl/bootstrap-extended.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("backend/app-assets/css-rtl/app.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("backend/app-assets/css-rtl/colors.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("backend/app-assets/css-rtl/custom-rtl.min.css")}}">
    <!-- END STACK CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css"
          href="{{asset("backend/app-assets/css-rtl/core/menu/menu-types/vertical-menu.min.css")}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset("backend/app-assets/css-rtl/core/menu/menu-types/vertical-overlay-menu.min.css")}}">
{{--    <!-- link(rel='stylesheet', type='text/css', href='{{asset("backend/app-assets/css#{rtl}/pages/users.css')-->--}}
<!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset("backend/assets/css/style-rtl.css")}}">
    <!-- END Custom CSS-->

    <link rel="stylesheet" type="text/css" href="{{asset("backend/app-assets/css-rtl/core/menu/menu-types/vertical-menu-modern.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("backend/app-assets/css-rtl/core/menu/menu-types/vertical-overlay-menu.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("backend/app-assets/css-rtl/core/colors/palette-gradient.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("backend/app-assets/fonts/simple-line-icons/style.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("backend/app-assets/css-rtl/core/colors/palette-gradient.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("backend/app-assets/css-rtl/pages/timeline.min.css")}}">

    @yield("css")
</head>
<body data-open="click" data-menu="vertical-menu" data-col="2-columns"
      class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar">

<!-- navbar-fixed-top-->
<nav class="header-navbar navbar navbar-with-menu navbar-fixed-top navbar-semi-dark navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-header">
            <ul class="nav navbar-nav">
                <li class="nav-item mobile-menu hidden-md-up float-xs-left"><a href="{{url("/")}}"
                                                                               class="nav-link nav-menu-main menu-toggle hidden-xs"><i
                            class="ft-menu font-large-1"></i></a></li>
                <li class="nav-item"><a href="{{url("/")}}" class="navbar-brand">
                        <img alt="stack admin logo"
                             src="{{asset("backend/app-assets/images/logo/stack-logo-light.png")}}" class="brand-logo">
                        <h2 class="brand-text">Tabook</h2></a></li>
                <li class="nav-item hidden-md-up float-xs-right"><a data-toggle="collapse" data-target="#navbar-mobile"
                                                                    class="nav-link open-navbar-container"><i
                            class="fa fa-ellipsis-v"></i></a></li>
            </ul>
        </div>
        <div class="navbar-container content container-fluid">
            <div id="navbar-mobile" class="collapse navbar-toggleable-sm">
                <ul class="nav navbar-nav float-xs-right">

                    <li class="dropdown dropdown-notification nav-item"><a href="#" data-toggle="dropdown"
                                                                           class="nav-link nav-link-label"><i
                                class="ficon ft-bell"></i><span
                                class="tag tag-pill tag-default tag-danger tag-default tag-up">5</span></a>
                        <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                            <li class="dropdown-menu-header">
                                <h6 class="dropdown-header m-0"><span class="grey darken-2">Notifications</span><span
                                        class="notification-tag tag tag-default tag-danger float-xs-right m-0">5 New</span>
                                </h6>
                            </li>
                            <li class="list-group scrollable-container"><a href="javascript:void(0)"
                                                                           class="list-group-item">
                                    <div class="media">
                                        <div class="media-left valign-middle"><i
                                                class="ft-plus-square icon-bg-circle bg-cyan"></i></div>
                                        <div class="media-body">
                                            <h6 class="media-heading">You have new order!</h6>
                                            <p class="notification-text font-small-3 text-muted">Lorem ipsum dolor sit
                                                amet, consectetuer elit.</p>
                                            <small>
                                                <time datetime="2015-06-11T18:29:20+08:00"
                                                      class="media-meta text-muted">30 minutes ago
                                                </time>
                                            </small>
                                        </div>
                                    </div>
                                </a><a href="javascript:void(0)" class="list-group-item">
                                    <div class="media">
                                        <div class="media-left valign-middle"><i
                                                class="ft-download-cloud icon-bg-circle bg-red bg-darken-1"></i></div>
                                        <div class="media-body">
                                            <h6 class="media-heading red darken-1">99% Server load</h6>
                                            <p class="notification-text font-small-3 text-muted">Aliquam tincidunt
                                                mauris eu risus.</p>
                                            <small>
                                                <time datetime="2015-06-11T18:29:20+08:00"
                                                      class="media-meta text-muted">Five hour ago
                                                </time>
                                            </small>
                                        </div>
                                    </div>
                                </a><a href="javascript:void(0)" class="list-group-item">
                                    <div class="media">
                                        <div class="media-left valign-middle"><i
                                                class="ft-alert-triangle icon-bg-circle bg-yellow bg-darken-3"></i>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="media-heading yellow darken-3">Warning notifixation</h6>
                                            <p class="notification-text font-small-3 text-muted">Vestibulum auctor
                                                dapibus neque.</p>
                                            <small>
                                                <time datetime="2015-06-11T18:29:20+08:00"
                                                      class="media-meta text-muted">Today
                                                </time>
                                            </small>
                                        </div>
                                    </div>
                                </a><a href="javascript:void(0)" class="list-group-item">
                                    <div class="media">
                                        <div class="media-left valign-middle"><i
                                                class="ft-check-circle icon-bg-circle bg-cyan"></i></div>
                                        <div class="media-body">
                                            <h6 class="media-heading">Complete the task</h6>
                                            <small>
                                                <time datetime="2015-06-11T18:29:20+08:00"
                                                      class="media-meta text-muted">Last week
                                                </time>
                                            </small>
                                        </div>
                                    </div>
                                </a><a href="javascript:void(0)" class="list-group-item">
                                    <div class="media">
                                        <div class="media-left valign-middle"><i
                                                class="ft-file icon-bg-circle bg-teal"></i></div>
                                        <div class="media-body">
                                            <h6 class="media-heading">Generate monthly report</h6>
                                            <small>
                                                <time datetime="2015-06-11T18:29:20+08:00"
                                                      class="media-meta text-muted">Last month
                                                </time>
                                            </small>
                                        </div>
                                    </div>
                                </a></li>
                            <li class="dropdown-menu-footer"><a href="javascript:void(0)"
                                                                class="dropdown-item text-muted text-xs-center">Read all
                                    notifications</a></li>
                        </ul>
                    </li>
                    <li class="dropdown dropdown-notification nav-item"><a href="#" data-toggle="dropdown"
                                                                           class="nav-link nav-link-label"><i
                                class="ficon ft-mail"></i><span
                                class="tag tag-pill tag-default tag-warning tag-default tag-up">3</span></a>
                        <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                            <li class="dropdown-menu-header">
                                <h6 class="dropdown-header m-0"><span class="grey darken-2">Messages</span><span
                                        class="notification-tag tag tag-default tag-warning float-xs-right m-0">4 New</span>
                                </h6>
                            </li>
                            <li class="list-group scrollable-container"><a href="javascript:void(0)"
                                                                           class="list-group-item">
                                    <div class="media">
                                        <div class="media-left"><span
                                                class="avatar avatar-sm avatar-online rounded-circle"><img
                                                    src="{{asset("backend/app-assets/images/portrait/small/avatar-s-1.png")}}"
                                                    alt="avatar"><i></i></span></div>
                                        <div class="media-body">
                                            <h6 class="media-heading">Margaret Govan</h6>
                                            <p class="notification-text font-small-3 text-muted">I like your portfolio,
                                                let's start the project.</p>
                                            <small>
                                                <time datetime="2015-06-11T18:29:20+08:00"
                                                      class="media-meta text-muted">Today
                                                </time>
                                            </small>
                                        </div>
                                    </div>
                                </a><a href="javascript:void(0)" class="list-group-item">
                                    <div class="media">
                                        <div class="media-left"><span
                                                class="avatar avatar-sm avatar-busy rounded-circle"><img
                                                    src="{{asset("backend/app-assets/images/portrait/small/avatar-s-2.png")}}"
                                                    alt="avatar"><i></i></span></div>
                                        <div class="media-body">
                                            <h6 class="media-heading">Bret Lezama</h6>
                                            <p class="notification-text font-small-3 text-muted">I have seen your work,
                                                there is</p>
                                            <small>
                                                <time datetime="2015-06-11T18:29:20+08:00"
                                                      class="media-meta text-muted">Tuesday
                                                </time>
                                            </small>
                                        </div>
                                    </div>
                                </a><a href="javascript:void(0)" class="list-group-item">
                                    <div class="media">
                                        <div class="media-left"><span
                                                class="avatar avatar-sm avatar-online rounded-circle"><img
                                                    src="{{asset("backend/app-assets/images/portrait/small/avatar-s-3.png")}}"
                                                    alt="avatar"><i></i></span></div>
                                        <div class="media-body">
                                            <h6 class="media-heading">Carie Berra</h6>
                                            <p class="notification-text font-small-3 text-muted">Can we have call in
                                                this week ?</p>
                                            <small>
                                                <time datetime="2015-06-11T18:29:20+08:00"
                                                      class="media-meta text-muted">Friday
                                                </time>
                                            </small>
                                        </div>
                                    </div>
                                </a><a href="javascript:void(0)" class="list-group-item">
                                    <div class="media">
                                        <div class="media-left"><span
                                                class="avatar avatar-sm avatar-away rounded-circle"><img
                                                    src="{{asset("backend/app-assets/images/portrait/small/avatar-s-6.png")}}"
                                                    alt="avatar"><i></i></span></div>
                                        <div class="media-body">
                                            <h6 class="media-heading">Eric Alsobrook</h6>
                                            <p class="notification-text font-small-3 text-muted">We have project party
                                                this saturday night.</p>
                                            <small>
                                                <time datetime="2015-06-11T18:29:20+08:00"
                                                      class="media-meta text-muted">last month
                                                </time>
                                            </small>
                                        </div>
                                    </div>
                                </a></li>
                            <li class="dropdown-menu-footer"><a href="javascript:void(0)"
                                                                class="dropdown-item text-muted text-xs-center">Read all
                                    messages</a></li>
                        </ul>
                    </li>
                    <li class="dropdown dropdown-user nav-item"><a href="#" data-toggle="dropdown"
                                                                   class="dropdown-toggle nav-link dropdown-user-link"><span
                                class="avatar avatar-online"><img
                                    src="{{asset("backend/app-assets/images/portrait/small/avatar-s-1.png")}}"
                                    alt="avatar"><i></i></span><span class="user-name">{{\Illuminate\Support\Facades\Auth::user()->firstName}}</span></a>
                        <div class="dropdown-menu dropdown-menu-right"><a href="{{route("admin.edit",\Illuminate\Support\Facades\Auth::id())}}" class="dropdown-item"><i
                                    class="ft-user"></i> تعديل البروفايل</a>
                            <div class="dropdown-divider"></div>
                            <a href="{{url("logout")}}" class="dropdown-item"><i class="ft-power"></i> تسجيل خروج</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<!-- ////////////////////////////////////////////////////////////////////////////-->


<div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow">
    <div class="main-menu-content">
        @include("backend.partials.nav")
    </div>
</div>

<div class="app-content content container-fluid">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><!-- Analytics spakline & chartjs  -->
            @yield("content")

        </div>
    </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->



<footer class="footer footer-static footer-light navbar-border">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span
            class="float-md-left d-xs-block d-md-inline-block">Copyright  &copy; 2017 <a
                href="https://themeforest.net/user/pixinvent/portfolio?ref=pixinvent" target="_blank"
                class="text-bold-800 grey darken-2">PIXINVENT </a>, All rights reserved. </span><span
            class="float-md-right d-xs-block d-md-inline-block hidden-md-down">Hand-crafted & Made with <i
                class="ft-heart pink"></i></span></p>
</footer>

<!-- BEGIN VENDOR JS-->
<script src="{{asset("backend/app-assets/vendors/js/vendors.min.js")}}" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script src="{{asset("backend/app-assets/vendors/js/extensions/jquery.knob.min.js")}}" type="text/javascript"></script>
<script src="{{asset("backend/app-assets/js/scripts/extensions/knob.min.js")}}" type="text/javascript"></script>
<script src="{{asset("backend/app-assets/vendors/js/charts/raphael-min.js")}}" type="text/javascript"></script>
<script src="{{asset("backend/app-assets/vendors/js/charts/morris.min.js")}}" type="text/javascript"></script>
<script src="{{asset("backend/app-assets/vendors/js/charts/jvector/jquery-jvectormap-2.0.3.min.js")}}"
        type="text/javascript"></script>
<script src="{{asset("backend/app-assets/vendors/js/charts/jvector/jquery-jvectormap-world-mill.js")}}"
        type="text/javascript"></script>
<script src="{{asset("backend/app-assets/data/jvector/visitor-data.js")}}" type="text/javascript"></script>
<script src="{{asset("backend/app-assets/vendors/js/charts/chart.min.js")}}" type="text/javascript"></script>
<script src="{{asset("backend/app-assets/vendors/js/charts/jquery.sparkline.min.js")}}" type="text/javascript"></script>
<script src="{{asset("backend/app-assets/vendors/js/extensions/unslider-min.js")}}" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="{{asset("backend/app-assets/css-rtl/core/colors/palette-climacon.css")}}">
<link rel="stylesheet" type="text/css" href="{{asset("backend/app-assets/fonts/simple-line-icons/style.min.css")}}">
<!-- END PAGE VENDOR JS-->
<!-- BEGIN STACK JS-->
<script src="{{asset("backend/app-assets/js/core/app-menu.min.js")}}" type="text/javascript"></script>
<script src="{{asset("backend/app-assets/js/core/app.min.js")}}" type="text/javascript"></script>
<script src="{{asset("backend/app-assets/js/scripts/customizer.min.js")}}" type="text/javascript"></script>
<!-- END STACK JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script src="{{asset("backend/app-assets/js/scripts/pages/dashboard-analytics.min.js")}}" type="text/javascript"></script>
{{--<script src="{{asset("backend/app-assets/js/scripts/pages/dashboard-ecommerce.min.js")}}" type="text/javascript"></script>--}}
<!-- END PAGE LEVEL JS-->
@yield("js")
</body>

<!-- Mirrored from pixinvent.com/stack-responsive-bootstrap-4-admin-template/html/rtl/vertical-menu-template-semi-dark/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 27 Aug 2017 12:41:00 GMT -->
</html>
