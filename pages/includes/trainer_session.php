<?php
function User_Login(){
    if(isset($_SESSION["trainer_userid"])){
        return true;
    }
}

function Confirm_User_Login(){
    if(!User_Login()){
        $_SESSION["trainer_userid"] = null;
        header("location:../trainer/trainer_login.php");
        }
}


Confirm_User_Login();