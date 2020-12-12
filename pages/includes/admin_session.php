<?php
function User_Login(){
    if(isset($_SESSION["admin_userid"])){
        return true;
    }
}

function Confirm_User_Login(){
    if(!User_Login()){
        $_SESSION["admin_userid"] = null;
        header("location:../admin/admin_login.php");
        }
}


Confirm_User_Login();