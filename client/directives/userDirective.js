app.directive('login', function() {
  return {
    templateUrl: 'client/views/user/partials/loginPartial.html'
  };
});

app.directive('registration', function() {
  return {
    templateUrl: 'client/views/user/partials/registrationPartial.html'
  };
});

app.directive('changepassword', function() {
  return {
    templateUrl: 'client/views/user/partials/changePasswordPartial.html'
  };
});