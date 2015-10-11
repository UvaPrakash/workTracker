var registrationApp = angular.module('registrationApp', ['ngStorage']);

registrationApp.controller('registrationController', function registrationController($scope, registrationService, $localStorage, $sessionStorage) {
    $scope.submit = function () {
        var data = {
            "firstName": $scope.registration_data.firstName,
            "lastName": $scope.registration_data.lastName,
            "email": $scope.registration_data.email
        };
        registrationService.registration(data);
    };

    $scope.save = function () {
        $localStorage.firstName = $scope.registration_data.firstName;
        $sessionStorage.firstName = $scope.registration_data.firstName;
    };
});