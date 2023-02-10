<?php
$heading = "Update Info";


$userData = getUserData();
$users = getUserData();
foreach ($users as $user) {
    $user_name = $user['firstname'] . " " . $user['lastname']; 
    $user_profile_pic = $user['profile_pic'];
}

$user_detail = array (
    'user_name' => $user_name,
    'user_profile_pic' => $user_profile_pic
);

// User form handling

view("user-registration.view.php",[
    'heading' => $heading,
    'username' => $user_name,
    'userData' => $userData,
    'user_profile_pic' => $user_profile_pic
    
]);