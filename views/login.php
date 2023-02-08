<?php
include "../auth.php";
// session_start();
$conn = dbconnect();
if (isset($_POST["submit"])){
    $email = mysqli_real_escape_string($conn,$_POST["email"]);
    $password = mysqli_real_escape_string($conn,md5($_POST["password"]));

    if (isValidEmail($email)){
        if (checkLoginCred($email,$password)) {
            $_SESSION["email"] = $email;
            header("Location: /dashboard");
            die();
        }
        else {
            echo "<script>alert('Login Credentials invalid'); window.location.replace('/');</script>";

        }
    }
    else {
        $user_registration = createUser($email,$password);
        if($user_registration) {
            $_SESSION['email'] = $email;
            header("Location: /dashboard");
        }
        else {
            echo "User Registration failed.Please try again later.";
            die();
        }


    }
}
else {
    header("Location: /");
    die();
}
    

?>