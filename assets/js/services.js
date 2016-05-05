(function(){
  'use strict';
  var app = angular.module('ads');
  app.service('HelperServ',['$http',function($http){
    var self = {
      'adTypesObj': [],
      'getAdTypes': function(){
        $http.get('assets/data/adTypes.json').then(function(response) {
          self.adTypesObj = response.data;
        }, function(response) {
          console.log("Something went wrong in getAllCities");
        });
      }
    };
    self.getAdTypes();
    return self;
  }]);
}());