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
// ----------------------------------------------------------------------------------
function getTagId($tag)
{
    $conn = dbconnect();
    $sql = "SELECT id FROM tags WHERE tag = '$tag';";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $user_id = $row['id'];
    return $user_id;
}
// ---------------------------------------------------------------------------------- ----------------------------------------------------------------------------------
// ------------------------ FN To get TAG using tag id----------------------------------------------------------
function getTag($id)
{
    $conn = dbconnect();
    $sql = "SELECT tag FROM tags WHERE id = '$id';";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $tag = $row['tag'];
    return $tag;
}
// ---------------------------------------------------------------------------------- ----------------------------------------------------------------------------------

// ---------Fn to collect all posts for dashboard ------------------
function collectAllPosts($tag=NULL)
{
    $conn = dbconnect();
    $sql = "SELECT * FROM posts";
    if($tag) {
        $sql .=" WHERE tag=$tag";
    }
    $result = mysqli_query($conn, $sql);
    // dd($result);
    return $result;
}
// ---------END Fn to collect all posts for dashboard ------------------

// ---------Fn to collect all posts of a single user ------------------
function collectUserPost($id,$tag=NULL)
{
    $conn = dbconnect();
    $sql = "SELECT * FROM posts WHERE user_id=$id";
    if ($tag) {
        $sql .= " AND tag='$tag'";
        // dd($t);
    }
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
    return $conn->insert_id;
}
 //----------------------------------  END of Fn to input dataa to database -----------------------
 //----------------------------------   Fn to Delete post dataa  -----------------------
 function deletePost($id) {
    $conn = dbconnect();
    $sql = "DELETE FROM posts WHERE id=$id";
    mysqli_query($conn,$sql);
}
 //----------------------------------   Fn to Delete post dataa  -----------------------
 
 //----------------------------------   Fn to Update post dataa  -----------------------
function updatePost($data,$id) {
    $conn = dbconnect();
    $cols = array();
    foreach($data as $key=>$val) {
        $cols[] = "$key = '$val'";
    }
    $sql = "UPDATE posts SET " . implode(', ', $cols) . " WHERE id='$id'";
    mysqli_query($conn,$sql);
    

}
 //----------------------------------  END OF  Fn to Update post dataa  -----------------------
 
//  --------------------- FN TO Upload images to post database ----------------------------
function updateImage($img_path,$id) {
    $conn = dbconnect();
    $sql = "UPDATE posts SET image='$img_path' WHERE id=$id";
    mysqli_query($conn,$sql);
}

//  --------------------- FN TO Up oad images to post database ----------------------------
 
//  --------------------- FN TO Upload PRofileimages to post database ----------------------------
function updateProfileImage($img_path,$id) {
    $conn = dbconnect();
    $sql = "UPDATE users SET profile_pic='$img_path' WHERE id=$id";
    mysqli_query($conn,$sql);
}

//  --------------------- FN TO Up oad PRofile images to post database ----------------------------


//  --------------------- FN TO form image proccessing ----------------------------
//  --------------------- FN TO form image proccessing ----------------------------
function formImageProccess($image,$id) {

    $img_name = $image['name'];
    $img_size = $image['size'];
    $tmp_name = $image['tmp_name'];
    $error = $image['error'];

    if($error === 0) {
        if ($img_size > 1250000) {
            $em = "Sorry Your image is too large";
            dd($em);
            // header("Location: index.php?error=$em")
            header("Location: /profile");
        }
        else {
            $img_ex = pathinfo($img_name,PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);
            $allowed_exs = array("jpg","jpeg","png");

            if(in_array($img_ex_lc,$allowed_exs)) {
                $new_img_name  = uniqid("IMG-",true) . '.' . $img_ex_lc;
                $img_upload_path = "uploads/".$new_img_name;
                
                move_uploaded_file($tmp_name,$img_upload_path);
                // INSERT INTO DATABASE

                updateImage($new_img_name,$id);
                header("Location: /profile");


            }
            else {
                $em="You Cant upload files of this type";
                dd($em);
                header("Location: index.php?error=$em");

            }
        }

    }
    else {
        $em = "Some unknown error occurred";
        header("Location: /profile");
    }
    
}
//  --------------------- FN TO form image proccessing ----------------------------
function profileImageProccess($image,$id) {

    $img_name = $image['name'];
    $img_size = $image['size'];
    $tmp_name = $image['tmp_name'];
    $error = $image['error'];

    if($error === 0) {
        if ($img_size > 1250000) {
            $em = "Sorry Your image is too large";
            dd($em);
            // header("Location: index.php?error=$em")
            header("Location: /profile");
        }
        else {
            $img_ex = pathinfo($img_name,PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);
            $allowed_exs = array("jpg","jpeg","png");

            if(in_array($img_ex_lc,$allowed_exs)) {
                $new_img_name  = uniqid("IMG-",true) . '.' . $img_ex_lc;
                $img_upload_path = "uploads/".$new_img_name;
                
                move_uploaded_file($tmp_name,$img_upload_path);
                // INSERT INTO DATABASE

                updateProfileImage($new_img_name,$id);
                // header("Location: /profile");


            }
            else {
                $em="You Cant upload files of this type";
                dd($em);
                header("Location: index.php?error=$em");

            }
        }

    }
    else {
        $em = "Some unknown error occurred";
        header("Location: /profile");
    }
    
}
 
 
 
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

 

function listTags($tag_id=NULL) {
    $conn = dbconnect();
    $sql = "SELECT * FROM tags";
    if($tag_id) {
        $sql .= " WHERE id='$tag_id'";
    }
    $tags = mysqli_query($conn,$sql);
    return $tags;
}


