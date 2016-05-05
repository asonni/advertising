<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en" ng-app="ads">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>عرض اعلانات مصلحة الطيران المدني</title>
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="bower_components/angular-motion/dist/angular-motion.min.css">
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="bower_components/bootstrap-rtl/dist/css/bootstrap-rtl.min.css">
    <link rel='stylesheet' href='bower_components/textAngular/dist/textAngular.css'>
    <link rel="stylesheet" href="bower_components/angular-toastr/dist/angular-toastr.min.css">
    <link rel="stylesheet" href="assets/css/navbar-rtl.css">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" ui-sref="home">
                  <img src="assets/img/logo.png" alt="Responsive image" width="50">
                </a>
              </div>
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <h4 class="navbar-left">مصلحة الطيران المدني الليبي</h4>
                <ul class="nav navbar-nav navbar-right">
                  <li class="dropdown">
                    <a data-animation="am-flip-x" bs-dropdown class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                      <i class="fa fa-user fa-fw"></i>
                      اسم المستخدم
                      <i class="fa fa-caret-down fa-fw"></i>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="#"><i class="fa fa-cog fa-fw"></i>&nbsp;الملف الشخصي</a></li>
                      <li><a href="#"><i class="fa fa-sign-out fa-fw"></i>&nbsp;خروج</a></li>
                    </ul>
                  </li>
                  <!-- <li ui-sref-active="active"><a ui-sref="auth"><i class="fa fa-sign-in fa-fw"></i>&nbsp;تسجيل الدخول</a></li> -->
                </ul>
              </div>
            </div>
          </nav>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <br><br><br>
          <div ui-view></div>
        </div>
      </div>
    </div>
    <script src="bower_components/angular/angular.min.js"></script>
    <script src="bower_components/angular-ui-router/release/angular-ui-router.min.js"></script>
    <script src="bower_components/angular-sanitize/angular-sanitize.js"></script>
    <script src="bower_components/angular-animate/angular-animate.min.js"></script>
    <script src='bower_components/textAngular/dist/textAngular-rangy.min.js'></script>
    <script src='bower_components/textAngular/dist/textAngular-sanitize.min.js'></script>
    <script src='bower_components/textAngular/dist/textAngular.min.js'></script>
    <script src="bower_components/angular-toastr/dist/angular-toastr.min.js"></script>
    <script src="bower_components/angular-toastr/dist/angular-toastr.tpls.min.js"></script>
    <script src="bower_components/angular-strap/dist/angular-strap.min.js"></script>
    <script src="bower_components/angular-strap/dist/angular-strap.tpl.min.js"></script>
    <script src="assets/js/ui-bootstrap/ui-bootstrap-tpls-1.2.5.min.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="assets/js/services.js"></script>
    <script src="assets/js/controllers.js"></script>
  </body>
</html>