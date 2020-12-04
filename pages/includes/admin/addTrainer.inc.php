<?php

if (isset($_POST["submit"])) {
    
    $email = $_POST["email"];
    $name = $_POST["uname"];
    $number = $_POST["number"];
    $password = $_POST["pwd"];
    $confirm_password = $_POST["confirm-pwd"];
    $admin_id = $_POST["admin_id"];
    $check = getimagesize($_FILES["image"]["tmp_name"]);

    require_once '../dbh.inc.php';
    require_once 'addTrainerfunctions.inc.php';

    if($check !== false){
        $image = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
    }

    if (emptyInputAddTrainer($email,$name,$number,$password,$confirm_password) != false) {
        header("location:../../admin/addTrainer.php?error=emptyinput");
        exit();
    }
    if (invalidUsername($name) != false) {
        header("location:../../admin/addTrainer.php?error=invalidusername");
        exit();
    }
    if (invalidEmail($email) != false) {
        header("location:../../admin/addTrainer.php?error=invalidemail");
        exit();
    }
    if (pwdMatch($password,$confirm_password) != false) {
        header("location:../../admin/addTrainer.php?error=passworddontmatch");
        exit();
    }
    if (emailExists($conn, $email) != false) {
        header("location:../../admin/addTrainer.php?error=emailExists");
        exit();
    }

    createUser($conn, $name, $number, $admin_id, $email, $password,$imgContent);

}
else {
    header("location:../admin/trainerList.php");
    exit();
}