<?php
// use Core\Database;
$heading = "Your Profile";

$user_id = getUserId();

$user_posts = collectUserPost($user_id);
// dd($user_id);

// $config = require base_path('config.php');
// $db = new Core\Database($config,'root','root');
// $posts = $db->query_entered("select * from posts where user_id ='$user_id'")->fetchAll();
view("profile.view.php",[
    'heading' => $heading,
    'posts' => $user_posts
]);