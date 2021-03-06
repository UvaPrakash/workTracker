(function () {

    app.controller('userController', ['$scope', '$location', 'userService', '$state', userController]);

    function userController($scope, $location, userService, $state) {
        //login submit is handled here 
        $scope.loginSubmit = function () {
            var data = {"login_id":$scope.login_data.email,"password":$scope.login_data.password}
            userService.userLogin(data).then(function (response) {
                if(response.status === "Success")
                {
                    window.localStorage.setItem("userDetails",JSON.stringify(response));
                    $state.go('home');
                }
                else
                {
                    $scope.errormessage = response.message;
                }
            });
        }
        
        //changePassword submit is handled here 
        $scope.changePassword = function () {
            var data = {"old_password":$scope.changepwd_data.oldPassword, "new_password":$scope.changepwd_data.newPassword, "re_password":$scope.changepwd_data.rePassword}
            userService.changePassword(data).then(function (response) {
                if(response.status === "Success")
                {
                    window.localStorage.setItem("userDetails",JSON.stringify(response));
                    $state.go('login');
                }
                else
                {
                    $scope.errormessage = response.message;
                }
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