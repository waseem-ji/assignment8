<?php
$heading = "Update Info";


$userData = getUserData();

// User form handling

view("user-registration.view.php",[
    'heading' => $heading,
    'userData' => $userData
]);