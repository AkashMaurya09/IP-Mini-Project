<?php

if(isset($_POST["submit"])) {
    $email = $_POST["email"];
    $password = $_POST["pwd"];

    require_once 'dbh.inc.php';
    require_once 'admin_functions.inc.php';

    if (emptyInputLogin($email,$password) != false) {
        header("location:../admin/admin_login.php?error=emptyinput");
        exit();
    }

    admin_loginUser($conn, $email, $password);
}

else {
    header("location:../admin/admin_login.php");
}