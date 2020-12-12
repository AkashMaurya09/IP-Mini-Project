<?php
function User_Login(){
    if(isset($_SESSION["memberid"])){
        return true;
    }
}

function Confirm_User_Login(){
    if(!User_Login()){
        $_SESSION["memberid"] = null;
        header("location:../member/signIn.php");
        }
}


Confirm_User_Login();

?>