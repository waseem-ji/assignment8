<?php
session_start();





// Tocheck if entered exists in the databbase
function isValidEmail($email) {
    $conn = dbconnect();
    $sql = "SELECT email FROM users WHERE email='$email'";
    $queryResult = mysqli_query($conn,$sql);
    $count = mysqli_num_rows($queryResult);
    if($count>0) {
        return true;
    }
    else {
        return false;
    }
}


// -------- Check If login credentials are correct
function checkLoginCred($email,$password) {
    $conn = dbconnect();
    $sql = "SELECT email FROM users WHERE email='$email' AND password='$password'";
    $queryResult = mysqli_query($conn,$sql);
    $count = mysqli_num_rows($queryResult);
    if($count>0) {
        return true;
    }
    else {
        return false;
    }
}

// ---------- Create a new user
function createUser($email,$password) {
    $conn = dbconnect();
    $sql = "INSERT INTO users (email,password) VALUES ('$email','$password')";
    $queryResult = mysqli_query($conn,$sql);
    return $queryResult;
}


?>