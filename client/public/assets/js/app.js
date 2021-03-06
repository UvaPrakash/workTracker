"use strict";

var app = angular.module("trackerapp", ['ui.router', 'ngAnimate', 'ngTouch']);

app.config(["$stateProvider", "$urlRouterProvider", function (stateProvider, urlRouterProvider) {
        urlRouterProvider
        .when('/dashboard', '/dashboard/home'),

        urlRouterProvider
        .otherwise('/login'),

        stateProvider
        .state("base", {
            "abstract": !0,
            url: "",
            templateUrl: "client/views/base.html"
        })
        .state("login", {
            url: "/login",
            parent: "base",
            templateUrl: "client/views/user/login.html",
            controller: "userController"
        })
        .state("registration", {
            url: "/registration",
            parent: "base",
            templateUrl: "client/views/user/registration.html",
            controller: "userController"
        })
        .state("changePassword", {
            url: "/dashboard/changePassword",
            parent: "base",
            templateUrl: "client/views/user/changePassword.html",
            controller: "userController"
        })
        .state("dashboard", {
            url: "/dashboard",
            templateUrl: "client/views/dashboard.html",
            parent: "base",
            controller: 'dashboardController'
        })
        .state("home", {
            url: "/home",
            templateUrl: "client/views/dashboard/dashboardhome.html",
            parent: "dashboard",
            controller: 'dashboardController'
        });
       
}]);

app.controller("dashboardController", ["$scope", "$state", function (r, t) {
    r.$state = t;
}]);