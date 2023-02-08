<?php 
function dbconnect() {
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $database = "mySocial";

    $conn = mysqli_connect($servername,$username,$password,$database);

    return $conn;

}