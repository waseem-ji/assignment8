<?php

$heading = "DashBoard";


if (isset($_GET['tag'])) {
    $tag_id = getTagId($_GET['tag']);
    $posts = collectAllPosts($tag_id);
} else {
    $posts = collectAllPosts();
}
$users = getUserData();
foreach ($users as $user) {
    $user_name = $user['firstname'] . " " . $user['lastname'];
    $user_profile_pic = $user['profile_pic'];
}

view("dashboard.view.php", [
    'heading' => $heading,
    'posts' => $posts,
    'username' => $user_name,
    'user_profile_pic' => $user_profile_pic
]);
