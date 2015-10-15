"use strict";

var app = angular.module("trackerapp",['ui.router','ngAnimate','ngTouch']);

app.config(["$stateProvider","$urlRouterProvider",function(stateProvider,urlRouterProvider){
    urlRouterProvider
    .when('/dashboard','/dashboard/createproject'),
    urlRouterProvider
    .otherwise('/login'),
    stateProvider
    .state("base", {"abstract": !0,url: "",templateUrl: "client/views/base.html"})
    .state("login", {url: "/login",parent: "base",templateUrl: "client/views/login/login.html",controller: "userController"})
    .state("dashboard",{url: "/dashboard",templateUrl : "client/views/dashboard.html", parent: "base",controller  : 'userController'});
}]);

app.controller("dashboardController", ["$scope", "$state", function(r, t) {
    r.$state = t;
}]);
         
 
 