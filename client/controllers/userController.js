(function () {

    app.controller('userController', ['$scope', '$location', 'userService', '$state', userController]);

    function userController($scope, $location, userService, $state) {
        //login submit is handled here 
        $scope.loginSubmit = function () {
            userService.userLogin($scope.login_data).then(function (response) {
                console.log(response);
            });

        }

        //registration submit is handled here
        $scope.registrationSubmit = function () {
            userService.userRegistration($scope.registration_data).then(function (response) {
                console.log(response);
            });

        }
    }

}());

