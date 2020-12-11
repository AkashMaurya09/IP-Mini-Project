<?php

if (isset($_POST["submit"])) {
    
    $email = $_POST["email"];
    $name = $_POST["uname"];
    $number = $_POST["number"];
    $password = $_POST["pwd"];
    $confirm_password = $_POST["confirm-pwd"];
    $admin_id = "1";

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputSignup($email,$name,$number,$password,$confirm_password) != false) {
        header("location:../member/signup.php?error=emptyinput");
        exit();
    }
    if (invalidUsername($name) != false) {
        header("location:../member/signup.php?error=invalidusername");
        exit();
    }
    if (invalidEmail($email) != false) {
        header("location:../member/signup.php?error=invalidemail");
        exit();
    }
    if (pwdMatch($password,$confirm_password) != false) {
        header("location:../member/signup.php?error=passworddontmatch");
        exit();
    }
    if (emailExists($conn, $email) != false) {
        header("location:../member/signup.php?error=emailExists");
        exit();
    }

    createUser($conn, $name, $number, $admin_id, $email, $password);

}
else {
    header("location:../member/signup.php");
    exit();
}
