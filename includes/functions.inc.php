<?php

function emptyInputSignup($name,$email,$username,$pwd,$pwdRepeat){
    $result;
    if (empty($name) || empty($username) || empty($username) || empty($pwd) || empty($pwdRepeat)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
function invalidUid($username){
    $result;
    if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        $result = true; // there is a mistake
    }
    else{
        $result = false;
    }
    return $result;
}

function invalidEmail($email){
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true; //WAS NOT AN EMAIL
    }
    else{
        $result = false;
    }
    return $result;
}
function pwdMatch($pwd, $pwdRepeat){
    $result;
    if ($pwd !== $pwdRepeat){
        $result = true; //they didnt match
    }
    else{
        $result = false;
    }
    return $result;
}
function uidExists($conn, $username, $email){
    $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEMail = ?;"; 
    // question mark is placeholder bc were gonna be
    //using prepared data instead of what the user inputted directly cause thats not good

    //PREPARE STATEMENT -- initilizing a new prepared statement -- tell it the connection
    $stmt = mysqli_stmt_init($conn); // this makes it secure so people dont write code into inputs
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=stmtfailed");
        exit(); //stop the script
    }
    //where is the preapred statmetent? ss -- two strings 
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row; //then we can use for login if it already exists

    }
    else{
        $result = false;
        return $result;

    }
    mysqli_stmt_close($stmt);
}
//okay now actually create the user
function createUser($conn, $name, $email, $username, $pwd){
    $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd) VALUES(?,?,?,?);"; 
    // question mark is placeholder bc were gonna be
    //using prepared data instead of what the user inputted directly cause thats not good

    //PREPARE STATEMENT -- initilizing a new prepared statement -- tell it the connection
    $stmt = mysqli_stmt_init($conn); // this makes it secure so people dont write code into inputs
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=stmtfailed");
        exit(); //stop the script
    }
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    //where is the preapred statmetent? ss -- two strings 
    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signup.php?error=none");
    exit(); //stop the script
}