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
        'phone'=>$_POST['phone'],
        'dob'=>$_POST['dob'],
        'gender'=>$_POST['gender']
    );
    if ( isset($_FILES['image']))  {

        profileImageProccess($_FILES['image'],$user_id);
        updateUsers('users',$input_array,"id='$user_id'");
    }
    else {

        updateUsers('users',$input_array,"id='$user_id'");
    }
}



header("location: /settings");
die();
