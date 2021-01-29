<?php

include "./includes/autoload.php";

$users = new Users();

if (isset($_POST["register"])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $role = $_POST["role"];
    

    $users->registerUser($username, $email, $password, $cpassword, $role);
    
    
}

else if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $role = $_POST["role"];

    $users->loginUser($email, $password, $role);

    
    
}

?>