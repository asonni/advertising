var app = angular.module('ads', ['ui.router','ngSanitize','ngAnimate','textAngular','ui.bootstrap','toastr','mgcrea.ngStrap']);
app.config(['$stateProvider','$urlRouterProvider','$locationProvider','toastrConfig','$modalProvider',function($stateProvider,$urlRouterProvider,$locationProvider,toastrConfig,$modalProvider){
  $stateProvider.state('adsList', {
    url:'/',
    templateUrl:'home/adsList',
    controller: 'AdsListCtl'
  }).state('newAd', {
    url:'/newAdvertising',
    templateUrl: 'home/newAd',
    controller: 'NewAdCtl',
    // resolve: { 
    //   authenticate: authenticate
    // }
  }).state('readMore', {
    url:'/readMore/:id',
    templateUrl: 'home/readMore',
    controller: 'ReadMoreCtl'
  }).state('editAd', {
    url:'/edit/:id',
    templateUrl: 'home/editAd',
    controller: 'EditAdCtl'
  }).state('adsHideList', {
    url:'/adsHiddenList',
    templateUrl: 'home/adsHiddenList',
    controller: 'AdsHiddenListCtl'
  }).state('readMoreHideAd', {
    url:'/adsHiddenList/readMore/:id',
    templateUrl: 'home/readMore',
    controller: 'ReadMoreHideAdCtl'
  }).state('editHideAd', {
    url:'/adsHiddenList/edit/:id',
    templateUrl: 'home/editAd',
    controller: 'EditHideAdCtl'
  }).state('adsDeleteList', {
    url:'/adsDeletedList',
    templateUrl: 'home/adsDeletedList',
    controller: 'AdsDeletedListCtl'
  }).state('readMoreDeleteAd', {
    url:'/adsDeletedList/readMore/:id',
    templateUrl: 'home/readMore',
    controller: 'ReadMoreDeleteAdCtl'
  });
  angular.extend(toastrConfig, {
    positionClass: 'toast-top-left',
    progressBar: true,
    tapToDismiss: true
  });
  angular.extend($modalProvider.defaults, {
    animation: 'am-fade-and-scale',
    placement: 'center'
  });
  $urlRouterProvider.otherwise('/');
  function authenticate($q,$state){
    if (false) {
      return $q.when();
    } else {
      $state.go('adsList');
      return $q.reject();
    }
  }
}]);






