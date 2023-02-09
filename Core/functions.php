<?php

session_start();

include "../dbconn.php";
function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

function isUri($value)
{
    return $_SERVER['REQUEST_URI'] === $value;
}

function base_path($path)
{

    return BASE_PATH . $path;
}
function view($path, $attributes = [])
{
    extract($attributes);
    require base_path('views/' . $path);
}
// ---------Fn to Authorize ------------------
function authorize($conditon, $status = Response::FORBIDDEN)
{
    if (!$conditon) {
        abort($status);
    }
}
// ---------Fn to Authorize END------------------

// ----------------------------------------------------------------------------------
function getUserId()
{
    $conn = dbconnect();
    $email = $_SESSION['email'];
    $sql = "SELECT id FROM users WHERE email = '$email';";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $user_id = $row['id'];
    return $user_id;
}
// ---------------END fn to get USERiD-------------

// ---------Fn to collect all posts for dashboard ------------------
function collectAllPosts()
{
    $conn = dbconnect();
    $sql = "SELECT * FROM posts";
    $result = mysqli_query($conn, $sql);
    return $result;
}
// ---------END Fn to collect all posts for dashboard ------------------

// ---------Fn to collect all posts of a single user ------------------
function collectUserPost($id)
{
    $conn = dbconnect();
    $sql = "SELECT * FROM posts WHERE user_id=$id";
    $result = mysqli_query($conn, $sql);
    return $result;
}

// ---------END Fn to collect all posts of a single user ------------------


//----------------------------------  Fn to input tag to TAG database -----------------------

function inputToTag($tag)
{
    $conn = dbconnect();
    $sql = "SELECT id from tags where tag='$tag'";
    $result = mysqli_query($conn, $sql);
    // dd($result);
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $tag_id = mysqli_fetch_column($result);
            // dd($tag_id);
            return $tag_id;
        } else {
            $sql = "INSERT INTO tags (tag) VALUES('$tag');";
            mysqli_query($conn, $sql);
            $tag_id = $conn->insert_id;
            // dd($tag_id);
            return $tag_id;
        }
        // $tag_id = 
    } else {
        echo "Entry to tag db failed ";
    }
}

//---------------------------------- END  Fn to input tag to TAG database -----------------------



//----------------------------------  Fn to input dataa to database -----------------------

function inputToPosts($data)
{
    // dd($input_array);
    // $user_id = getUserId();
    $conn = dbconnect();
    $key = array_keys($data);
    $val = array_values($data);
    $sql = "INSERT INTO posts (" . implode(', ', $key) . ") "
        . "VALUES ('" . implode("', '", $val) . "')";

    mysqli_query($conn, $sql);
}
 //----------------------------------  END of Fn to input dataa to database -----------------------
 
 
 
 
 //----------------------------------  Fn to get user details -----------------------

 function getUserData() {
    $conn = dbconnect();
    $user_id = getUserId();
    $sql = "SELECT * FROM users WHERE id='$user_id';";
    $result =  mysqli_query($conn,$sql);
    return $result;
 }


 //----------------------------------  Fn to input User info to DB -----------------------

function updateUsers($table, $data, $where)
{
    // dd($input_array);
    // $user_id = getUserId();
    $conn = dbconnect();
    $cols = array();
    foreach($data as $key=>$val) {
        $cols[] = "$key = '$val'";
    }
    $sql = "UPDATE $table SET " . implode(', ', $cols) . " WHERE $where";
    mysqli_query($conn, $sql);
}

 //----------------------------------  END of Fn to input User info to DB -----------------------
 
 
 
 
 
 
 
 //----------------------------------   Fn to update email and passsword -----------------------

 function updateEmailAndPassword($email,$password,$id) {
    $conn = dbconnect();
    $sql = "UPDATE users SET email='$email' , password='$password' WHERE id=$id;";
    mysqli_query($conn,$sql);
 }
 //----------------------------------  END of Fn to update email and passsword -----------------------

 

