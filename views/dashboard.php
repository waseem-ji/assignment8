<?php

$posts = collectAllPosts();
// dd($posts);
// $posts = $posts[0];
// echo $posts[''];
if(mysqli_num_rows($posts)>0) {
    foreach($posts as $post) {
        // dd($post);
        echo $post['title'];
        echo $post['description'];
        echo $post['date'];
        echo $post['tag'];
        // echo $post['image'];
    }
}