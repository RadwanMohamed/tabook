<!DOCTYPE html>
<html lang="en" data-textdirection="rtl" class="loading">

<!-- Mirrored from pixinvent.com/stack-responsive-bootstrap-4-admin-template/html/rtl/vertical-modern-menu-template/login-simple.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 27 Aug 2017 13:03:13 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Stack admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, stack admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Login Page - Stack Responsive Bootstrap 4 Admin Template</title>
    <link rel="apple-touch-icon" href="{{asset("backend/app-assets/images/ico/apple-icon-120.png")}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset("backend/app-assets/images/ico/favicon.ico")}}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset("backend/app-assets/css-rtl/bootstrap.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("backend/app-assets/fonts/feather/style.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("backend/app-assets/fonts/font-awesome/css/font-awesome.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("backend/app-assets/fonts/flag-icon-css/css/flag-icon.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("backend/app-assets/vendors/css/extensions/pace.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("backend/app-assets/vendors/css/forms/icheck/icheck.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("backend/app-assets/vendors/css/forms/icheck/custom.css")}}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN STACK CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset("backend/app-assets/css-rtl/bootstrap-extended.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("backend/app-assets/css-rtl/app.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("backend/app-assets/css-rtl/colors.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("backend/app-assets/css-rtl/custom-rtl.min.css")}}">
    <!-- END STACK CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset("backend/app-assets/css-rtl/core/menu/menu-types/vertical-menu-modern.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("backend/app-assets/css-rtl/core/menu/menu-types/vertical-overlay-menu.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("backend/app-assets/css-rtl/core/colors/palette-gradient.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("backend/app-assets/css-rtl/pages/login-register.min.css")}}">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset("backend/assets/css/style-rtl.css")}}">
    <!-- END Custom CSS-->
</head>
<body data-open="click" data-menu="vertical-menu-modern" data-col="1-column" class="vertical-layout vertical-menu-modern 1-column   menu-expanded blank-page blank-page">
<!-- ////////////////////////////////////////////////////////////////////////////-->
<div class="app-content content container-fluid">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><section class="flexbox-container">
                <div class="col-md-4 offset-md-4 col-xs-10 offset-xs-1  box-shadow-2 p-0">
                    <div class="card border-grey border-lighten-3 m-0">
                        <div class="card-header no-border">
                            <div class="card-title text-xs-center">
{{--                                <div class="p-1"><img src="{{asset("backend/app-assets/images/logo/stack-logo-dark.png")}}" alt="branding logo"></div>--}}
                            </div>
                            <h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2"><span>سجيل الدخول</span></h6>
                        </div>
                        <div class="card-body collapse in">
                            <div class="card-block">
                                <form class="form-horizontal form-simple" action="{{url("login")}}"  method="post" novalidate>
                                    @csrf
                                    <fieldset class="form-group position-relative has-icon-left mb-0">
                                        <input type="text" class="form-control form-control-lg input-lg" id="user-name" placeholder="رقم الجوال" name="phone" required>
                                        <div class="form-control-position">
                                            <i class="ft-user"></i>
                                        </div>
                                    </fieldset>
                                    <fieldset class="form-group position-relative has-icon-left">
                                        <input type="password" class="form-control form-control-lg input-lg" id="user-password" placeholder="كلمة المرور" required name="password">
                                        <div class="form-control-position">
                                            <i class="fa fa-key"></i>
                                        </div>
                                    </fieldset>
                                    <fieldset class="form-group row">
                                        <div class="col-md-6 col-xs-12 text-xs-center text-md-left">
                                            <fieldset>
                                                <input type="checkbox" id="remember-me" class="chk-remember">
                                                <label for="remember-me"> تذكرني</label>
                                            </fieldset>
                                        </div>
                                    </fieldset>
                                    <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="ft-unlock"></i> Login</button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

        </div>
    </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->

</div>
<!-- BEGIN VENDOR JS-->
<script src="{{asset("backend/app-assets/vendors/js/vendors.min.js")}}" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script src="{{asset("backend/app-assets/vendors/js/forms/icheck/icheck.min.js")}}" type="text/javascript"></script>
<script src="{{asset("backend/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js")}}" type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN STACK JS-->
<script src="{{asset("backend/app-assets/js/core/app-menu.min.js")}}" type="text/javascript"></script>
<script src="{{asset("backend/app-assets/js/core/app.min.js")}}" type="text/javascript"></script>
<script src="{{asset("backend/app-assets/js/scripts/customizer.min.js")}}" type="text/javascript"></script>
<!-- END STACK JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script src="{{asset("backend/app-assets/js/scripts/forms/form-login-register.min.js")}}" type="text/javascript"></script>
<!-- END PAGE LEVEL JS-->
</body>

<!-- Mirrored from pixinvent.com/stack-responsive-bootstrap-4-admin-template/html/rtl/vertical-modern-menu-template/login-simple.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 27 Aug 2017 13:03:14 GMT -->
</html>
