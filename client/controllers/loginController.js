var loginApp = angular.module('loginApp', ['ngStorage']);

loginApp.controller('loginController', function loginController($scope, loginService, $localStorage, $sessionStorage) {
    $scope.submit = function () {
        loginService.login($scope.login_data);
    };

    $scope.save = function () {
        $localStorage.email = $scope.login_data.email;
        $sessionStorage.email = $scope.login_data.email;
    };
});