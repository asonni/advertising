var app = angular.module('ads', ['ui.router','ngSanitize','textAngular','ui.bootstrap','toastr']);
app.config(['$stateProvider','$urlRouterProvider','$locationProvider','toastrConfig',function($stateProvider,$urlRouterProvider,$locationProvider,toastrConfig){
  $stateProvider.state('adsList', {
    url:'/',
    templateUrl:'home/adsList',
    controller: 'AdsListCtl'
  }).state('newAd', {
    url:'/newAdvertising',
    templateUrl: 'home/newAd',
    controller: 'NewAdCtl'
  }).state('readMore', {
    url:'/readMore/:id',
    templateUrl: 'home/readMore',
    controller: 'ReadMoreCtl'
  }).state('editAd', {
    url:'/edit/:id',
    templateUrl: 'home/editAd',
    controller: 'EditAdCtl'
  });
  angular.extend(toastrConfig, {
    positionClass: 'toast-top-left',
    progressBar: true,
    tapToDismiss: true
  });
  $urlRouterProvider.otherwise('/');
}]);
app.controller('AdsListCtl',['$scope','$http',function($scope,$http){
  $scope.pageSize = 10;
  $scope.currentPage = 1;
  $scope.total = 12;
  $scope.init = function(){
    $http.post('api/getAllAds/'+$scope.pageSize+'/'+$scope.currentPage).then(function(response){
      $scope.posts = response.data;
    },function(response){
      console.log("Something went wrong");
    });
  };
  $scope.init();
  $scope.searchByName = function(){
    if ($scope.searchName.length  >= 5){
      $http.post('api/searchAdsByName',{
        'ads_name': $scope.searchName
      }).then(function(response){
        console.log(response.data);
        $scope.posts = response.data;
      },function(response){
        console.log(response);
      });
    } else {
      $scope.init();
    }
  };
}]);
app.controller('NewAdCtl',['$scope','$http','$state',function($scope,$http,$state){
  $scope.formAd = {};
  $scope.newAd = function(){
    $http.post('api/addNewAd', {
      'main_data': $scope.formAd
    }).then(function(response){
      console.log(response.data);
      $state.go('adsList');
    },function(response){
      console.log(response);
    });
  };
}]);
app.controller('ReadMoreCtl',['$scope','$http','$state','$stateParams','$sce',function($scope,$http,$state,$stateParams,$sce){
  $http.post('api/getAdByID',{
    'id': $stateParams.id
  }).then(function(response){
    $scope.adName = response.data[0].ads_name;
    $scope.adsDescription = $sce.trustAsHtml(response.data[0].ads_description);
  },function(response){
    console.log(response);
  });
}]);
app.controller('EditAdCtl',['$scope','$http','$state','$stateParams','$sce','toastr',function($scope,$http,$state,$stateParams,$sce,toastr){
  $scope.editAdForm = {};
  $http.post('api/getAdByID',{
    'id': $stateParams.id
  }).then(function(response){
    $scope.editAdForm.ads_name = response.data[0].ads_name;
    $scope.editAdForm.ads_description = $sce.trustAsHtml(response.data[0].ads_description);
   },function(response){
    console.log(response);
  });
  $scope.editAd = function(){
    $http.post('api/editAd/'+$stateParams.id, {
      'editAdForm': $scope.editAdForm
    }).then(function(response){
      if(response.data){
        toastr.info('تم التعديل بنجاح');
        $state.go('adsList');
      } else {
        toastr.error('عفوا يوجد خطأ الرجاء المحاولة لاحقا');
        $state.go('adsList');
      }
    },function(response){
      console.log(response);
    });
  };
}]);







