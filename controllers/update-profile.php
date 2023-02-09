<?php


$user_id = getUserId();
// dd($_POST);

if (isset($_POST["update"])){
    $email = $_POST["email"];
    $password = md5($_POST["password"]);
    updateEmailAndPassword($email,$password,$user_id);
}
else {
    $input_array = array(
        'firstname'=>$_POST['firstname'],
        'lastname'=>$_POST['lastname'],
        // 'email'=>$_POST['email'],
        // 'password'=>md5($_POST['password']),
        'phone'=>$_POST['phone'],
        'dob'=>$_POST['dob'],
        'gender'=>$_POST['gender']
    );
    // dd($input_array);
    updateUsers('users',$input_array,"id='$user_id'");
}



header("location: /settings");
die();
