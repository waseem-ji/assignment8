<?php

$heading = "tag";



view("tag-page.view.php",[
    'heading' => $heading,
    'posts' => $user_posts
]);