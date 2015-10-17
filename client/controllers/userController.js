(function(){
    
    app.controller('userController',['$scope','$location','userService','$state',userController]);
    
    function userController($scope,$location,userService,$state)
    {
        //login submit is handled here 
        $scope.loginSubmit = function()
        {
            
        }
        
        //registration submit is handled here
        $scope.registrationSubmit = function()
        {
            
        }
    }
    
}());