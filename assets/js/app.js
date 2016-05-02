var app = angular.module('ads', ['ui.router','ngSanitize','textAngular','ui.bootstrap']);
app.config(function($stateProvider,$urlRouterProvider,$locationProvider){

    $stateProvider.state('adsList', {
      url:'/',
      templateUrl:'home/adsList',
      controller: 'AdsListCtl'
    }).state('addAd', {
      url:'/newAdvertising',
      templateUrl: 'home/newAd',
      controller: 'NewAdCtl'
    }).state('readMore', {
      url:'/readMore/:id',
      templateUrl: 'home/readMore',
      controller: 'ReadMoreCtl'
    });
    $urlRouterProvider.otherwise('/')
});
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
  $scope.orightml = '<h2>Try me!</h2><p>textAngular is a super cool WYSIWYG Text Editor directive for AngularJS</p><p><b>Features:</b></p><ol><li>Automatic Seamless Two-Way-Binding</li><li>Super Easy <b>Theming</b> Options</li><li style="color: green;">Simple Editor Instance Creation</li><li>Safely Parses Html for Custom Toolbar Icons</li><li class="text-danger">Doesn&apos;t Use an iFrame</li><li>Works with Firefox, Chrome, and IE8+</li></ol><p><b>Code at GitHub:</b> <a href="https://github.com/fraywing/textAngular">Here</a> </p>';
  $scope.disabled = false;
  $scope.newAd = function(){
    $http.post('api/addNewAd', {
      'main_data': $scope.formAd
    }).then(function(response){
      console.log(response.data);
      $state.go('home');
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







