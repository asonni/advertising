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
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="bower_components/bootstrap-rtl/dist/css/bootstrap-rtl.min.css">
    <link rel='stylesheet' href='bower_components/textAngular/dist/textAngular.css'>
    <link rel="stylesheet" href="bower_components/css/style.css">
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="text-center">
            <img src="bower_components/img/logo.png" alt="Responsive image" width="140">
            <h3>مصلحة الطيران المدني الليبي</h3>
          </div>
          <br>
          <div ui-view></div>
        </div>
      </div>
    </div>
    <script src="bower_components/angular/angular.min.js"></script>
    <script src="bower_components/angular-ui-router/release/angular-ui-router.min.js"></script>
    <script src="bower_components/angular-sanitize/angular-sanitize.js"></script>
    <script src='bower_components/textAngular/dist/textAngular-rangy.min.js'></script>
    <script src='bower_components/textAngular/dist/textAngular-sanitize.min.js'></script>
    <script src='bower_components/textAngular/dist/textAngular.min.js'></script>
    <script src="bower_components/js/app.js"></script>
  </body>
</html>