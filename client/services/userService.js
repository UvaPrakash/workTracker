(function(){

    app.factory('userService',['$q','$http',userService]);
    
    function userService($q,$http)
    {
        return{
            userRegistration  : userRegistration
        }
        
        function userRegistration()
        {
            return $http({method: 'POST',url:HOST+USER_REGISTRATION}).then(function(response){return response.data;});
        }
    }
}());