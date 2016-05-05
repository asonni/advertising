(function(){
  'use strict';
  var app = angular.module('ads');
  app.controller('AdsListCtl',['$scope','$http','$modal','toastr',function($scope,$http,$modal,toastr){
  $scope.pageSize = 10;
  $scope.currentPage = 1;
  $scope.init = function(){
    $http.post('api/getAllAds/'+$scope.pageSize+'/'+$scope.currentPage).then(function(response){
      $scope.posts = response.data;
    },function(response){
      console.log("Something went wrong");
    });
    $http.post('api/getCountAds').then(function(response){
      $scope.total = response.data;
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
  $scope.showDeleteModel = function(id){
    $scope.id = id;
    $scope.deleteName = "هذا الاعلان";
    $scope.deleteModel = $modal({
      scope: $scope,
      templateUrl: 'home/deleteModel',
      show: true
    });
  };
  $scope.confirmDelete = function(id){
    $http.delete('api/deleteAd/'+id).then(function(response){
      if(response.data){
        $scope.deleteModel.hide();
        $scope.init();
        toastr.success('تم الحذف بنجاح');
      } else {
        $scope.deleteModel.hide();
        toastr.error('عفوا يوجد خطأ الرجاء المحاولة لاحقا');
      }
    },function(response){
      $scope.deleteModel.hide();
      console.log(response.data);
      console.log("Something went wrong on confirm delete method");
    });
  };
  $scope.showHideModel = function(id){
    $scope.id = id;
    $scope.hideTitle = "رسالة تأكيد الاخفاء";
    $scope.hideMessage = "هل تريد فعلا اخفاء هذا الاعلان ؟";
    $scope.hideModel = $modal({
      scope: $scope,
      templateUrl: 'home/hideModel',
      show: true
    });
  };
  $scope.confirmHide = function(id){
    $http.post('api/hideAd/'+id).then(function(response){
      if(response.data){
        $scope.hideModel.hide();
        $scope.init();
        toastr.success('تم اخفاء هذا بنجاح');
      } else {
        $scope.hideModel.hide();
        toastr.error('عفوا يوجد خطأ الرجاء المحاولة لاحقا');
      }
    },function(response){
      $scope.hideModel.hide();
      console.log(response.data);
      console.log("Something went wrong on confirm hide method");
    });
  };
}]);
app.controller('NewAdCtl',['$scope','$http','$state','HelperServ',function($scope,$http,$state,HelperServ){
  $scope.formAd = {};
  $scope.formAd.ads_publishing = "1";
  $scope.objects = HelperServ;
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
  $scope.backBtn = function(){
    $state.go('adsList');
  }
}]);
app.controller('EditAdCtl',['$scope','$http','$state','$stateParams','$sce','HelperServ','toastr',function($scope,$http,$state,$stateParams,$sce,HelperServ,toastr){
  $scope.editAdForm = {};
  $scope.objects = HelperServ;
  $http.post('api/getAdByID',{
    'id': $stateParams.id
  }).then(function(response){
    $scope.editAdForm = response.data[0];
   },function(response){
    console.log(response);
  });
  $scope.editAd = function(){
    console.log($scope.editAdForm);
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
  $scope.backBtn = function(){
    $state.go('adsList');
  }
}]);
app.controller('AdsHiddenListCtl',['$scope','$http','$modal','toastr',function($scope,$http,$modal,toastr){
  $scope.pageSize = 10;
  $scope.currentPage = 1;
  $scope.init = function(){
    $http.post('api/getAllHiddenAds/'+$scope.pageSize+'/'+$scope.currentPage).then(function(response){
      $scope.posts = response.data;
    },function(response){
      console.log("Something went wrong");
    });
    $http.post('api/getCountHiddenAds').then(function(response){
      $scope.total = response.data;
    },function(response){
      console.log("Something went wrong");
    });
  };
  $scope.init();
  $scope.showModel = function(id){
    $scope.id = id;
    $scope.showTitle = "رسالة تأكيد الإضهار";
    $scope.showMessage = "هل تريد فعلا إضهار هذا الاعلان ؟";
    $scope.showModel = $modal({
      scope: $scope,
      templateUrl: 'home/showModel',
      show: true
    });
  };
  $scope.confirmShow = function(id){
    $http.post('api/showAd/'+id).then(function(response){
      if(response.data){
        $scope.showModel.hide();
        $scope.init();
        toastr.success('تم إضهار هذا الاعلان بنجاح');
      } else {
        $scope.showModel.hide();
        toastr.error('عفوا يوجد خطأ الرجاء المحاولة لاحقا');
      }
    },function(response){
      $scope.showModel.hide();
      console.log(response.data);
      console.log("Something went wrong on confirm show method");
    });
  };
}]);
app.controller('ReadMoreHideAdCtl',['$scope','$http','$state','$stateParams','$sce',function($scope,$http,$state,$stateParams,$sce){
  $http.post('api/getHiddenAdByID',{
    'id': $stateParams.id
  }).then(function(response){
    $scope.adName = response.data[0].ads_name;
    $scope.adsDescription = $sce.trustAsHtml(response.data[0].ads_description);
  },function(response){
    console.log(response);
  });
  $scope.backBtn = function(){
    $state.go('adsHideList');
  }
}]);
app.controller('EditHideAdCtl',['$scope','$http','$state','$stateParams','$sce','HelperServ','toastr',function($scope,$http,$state,$stateParams,$sce,HelperServ,toastr){
  $scope.editAdForm = {};
  $scope.objects = HelperServ;
  $http.post('api/getAdByID',{
    'id': $stateParams.id
  }).then(function(response){
    $scope.editAdForm = response.data[0];
   },function(response){
    console.log(response);
  });
  $scope.editAd = function(){
    console.log($scope.editAdForm);
    $http.post('api/editAd/'+$stateParams.id, {
      'editAdForm': $scope.editAdForm
    }).then(function(response){
      if(response.data){
        toastr.info('تم التعديل بنجاح');
        $state.go('adsHideList');
      } else {
        toastr.error('عفوا يوجد خطأ الرجاء المحاولة لاحقا');
        $state.go('adsHideList');
      }
    },function(response){
      console.log(response);
    });
  };
  $scope.backBtn = function(){
    $state.go('adsHideList');
  }
}]);
app.controller('AdsDeletedListCtl',['$scope','$http','$modal','toastr',function($scope,$http,$modal,toastr){
  $scope.pageSize = 10;
  $scope.currentPage = 1;
  $scope.init = function(){
    $http.post('api/getAllDeletedAds/'+$scope.pageSize+'/'+$scope.currentPage).then(function(response){
      $scope.posts = response.data;
    },function(response){
      console.log("Something went wrong");
    });
    $http.post('api/getCountDeletedAds').then(function(response){
      $scope.total = response.data;
    },function(response){
      console.log("Something went wrong");
    });
  };
  $scope.init();
}]);
app.controller('ReadMoreDeleteAdCtl',['$scope','$http','$state','$stateParams','$sce',function($scope,$http,$state,$stateParams,$sce){
  $http.post('api/getDeletedAdByID',{
    'id': $stateParams.id
  }).then(function(response){
    $scope.adName = response.data[0].ads_name;
    $scope.adsDescription = $sce.trustAsHtml(response.data[0].ads_description);
  },function(response){
    console.log(response);
  });
  $scope.backBtn = function(){
    $state.go('adsDeleteList');
  }
}]);
}());