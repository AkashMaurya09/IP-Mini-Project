<?php

if(isset($_POST["submit"])) {
    $email = $_POST["email"];
    $password = $_POST["pwd"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputLogin($email,$password) != false) {
        header("location:../member/signIn.php?error=emptyinput");
        exit();
    }

    loginUser($conn, $email, $password);
}

else {
    header("location:../member/signIn.php");
}