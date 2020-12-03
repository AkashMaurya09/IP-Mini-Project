<?php

if(isset($_POST["submit"])) {
    $email = $_POST["email"];
    $password = $_POST["pwd"];

    require_once 'dbh.inc.php';
    require_once 'trainer_functions.inc.php';

    if (emptyInputLogin($email,$password) != false) {
        header("location:../trainer/trainer_login.php?error=emptyinput");
        exit();
    }

    admin_loginUser($conn, $email, $password);
}

else {
    header("location:../trainer/trainer_login.php");
}