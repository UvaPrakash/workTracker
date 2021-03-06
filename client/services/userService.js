(function () {

    app.factory('userService', ['$q', '$http', userService]);

    function userService($q, $http) {
        return {
            userRegistration: userRegistration,
            userLogin: userLogin,
            changePassword: changePassword

        }

        function userLogin(data) {
            return $http({
                method: 'POST',
                data: data,
                url: HOST + USER_LOGIN,
            }).then(function (response) {
                return response.data;
            });
        }

        function userRegistration(data) {
            return $http({
                method: 'POST',
                data: data,
                url: HOST + USER_REGISTRATION
            }).then(function (response) {
                return response.data;
            });
        }
        
        function changePassword(data) {
            return $http({
                method: 'POST',
                data: data,
                url: HOST + CHANGE_PASSWORD,
            }).then(function (response) {
                return response.data;
            });
        }

    }
}());