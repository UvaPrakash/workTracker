var projectCreationApp = angular.module('projectCreationApp', []);

projectCreationApp.controller('projectCreationController', function projectCreationController($scope, projectCreationService) {
    $scope.submit = function () {
        projectCreationService.projectCreation($scope.projectCreation_data);
    };
});