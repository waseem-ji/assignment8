<?php
// use Core\Database;
$heading = "Your Profile";

$user_id = getUserId();

    if(isset($_POST) && isset($_POST['update'])) {
        dd($_POST);
    }
    if(isset($_POST) && isset($_POST['delete'])) {
        // dd($_POST);
        deletePost($_POST['post_id']);
        
    }


if(isset($_GET['tag'])) {
    // dd($_GET);
    $tag_id = getTagId($_GET['tag']);
    $user_posts = collectUserPost($user_id,$tag_id);
    // dd($_GET);
}
else {
    $user_posts = collectUserPost($user_id);
    // dd($posts);
}


// $user_posts = collectUserPost($user_id);

$user_details = getUserData();

$users = getUserData();
foreach ($users as $user) {
    $user_name = $user['firstname'] . " " . $user['lastname']; 
    $user_profile_pic = $user['profile_pic'];
}

view("profile.view.php",[
    'heading' => $heading,
    'posts' => $user_posts,
    'users' => $user_details,
    'username' => $user_name,
    'user_profile_pic' => $user_profile_pic
]);