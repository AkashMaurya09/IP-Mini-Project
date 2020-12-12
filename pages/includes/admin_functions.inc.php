<?php

function emptyInputLogin($email, $password) {

    if (empty($email) || empty($password)) {
        //if true then redirect the user to signup page
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function emailExists($conn, $email) {
    //This statement is used to prevent SQL Injection
    $sql = "SELECT * from gymadmin WHERE Admin_Email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location:../admin/admin_login.php?error=stmtFailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function admin_loginUser($conn, $email, $password) {
    $emailExists = emailExists($conn, $email);
    
    if($emailExists === false) {
        header("location:../admin/admin_login.php?error=wronglogin");
    }

    $passwordHashed = $emailExists["Admin_Password"];
    $checkPwd = password_verify($password, $passwordHashed);

    if($checkPwd === false) {
        header("location:../admin/admin_login.php?error=wrongpassword");
    }
    elseif ($checkPwd === true) {
        session_start();
        $_SESSION["admin_userid"] = $emailExists["Admin_id"];
        $_SESSION["admin_userName"] = $emailExists["Admin_Name"];
        header("location:../member/home.php");
        exit(); 
    }
}