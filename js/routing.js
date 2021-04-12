var app = angular.module("myApp", ["ngRoute"]);
app.config(function($routeProvider) {
    $routeProvider
    .when("/", {
        templateUrl : "index.php"
    })
    .when("/index", {
        templateUrl : "index.php"
    })
    .when("/rideToDest", {
        templateUrl : "rideToDest.php"
    })
    .when("/rideAndDeliv", {
        templateUrl : "rideAndDeliv.php"
    })
    .when("/aboutUs", {
        templateUrl : "aboutUs.php"
    })
    .when("/contactUs", {
        templateUrl : "contactUs.php"
    })
    .when("/signUp", {
        templateUrl : "signup.php"
    })
    .when("/login", {
        templateUrl : "login.php"
    })
    .when("/payment", {
        templateUrl : "payment.php"
    })
    .when("/driverSignup", {
        templateUrl : "driverSignup.php"
    })
    .when("/doublePayment", {
        templateUrl : "doublePayment.php"
    });
});