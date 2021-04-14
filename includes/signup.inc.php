<?php

if (isset($_POST["submit"])){
    // echo "it works";
    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdrepeat = $_POST["pwdrepeat"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputSignup($name,$email,$username,$pwd,$pwdrepeat) !== false){
        header("location: ../home.php#!/signUp?error=emptyInput");
        exit(); //stop the script
    }
    if(invalidUid($username) !== false){
        header("location: ../signup.php?error=invaliduid");
        exit(); //stop the script
    }
    if(invalidEmail($email) !== false){
        header("location: ../home.php#!/signUp?error=invalidemail");
        exit(); //stop the script
    }
    if(pwdMatch($pwd, $pwdrepeat) !== false){
        header("location: ../home.php#!/signUp?error=passwordsdontmatch");
        exit(); //stop the script
    }
    if(uidExists($conn, $username, $email) !== false){
        header("location: ../home.php#!/signUp?error=usernametaken");
        exit(); //stop the script
    }
    createUser($conn, $name, $email, $username, $pwd);
}
else{
    header("location: ../home.php#!/signUp");
    exit();
}
