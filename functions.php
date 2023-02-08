<?php
include "dbconn.php";
function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

function urlIs($value) {
    return $_SERVER['REQUEST_URI'] === $value;
}

// ---------Fn to collect all posts for dashboard ------------------
function collectAllPosts() {
    $conn = dbconnect();
    $sql = "SELECT * FROM posts";
    $result = mysqli_query($conn,$sql);
    return $result;
}