<?php

function emptyInputSignup($email,$username,$number,$dob,$password,$confirm_password) {
    if (empty($email) || empty($username) || empty($number) || empty($dob) || empty($password) || empty($confirm_password)) {
        //if true then redirect the user to signup page
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function invalidUsername($name) {
    if ( !preg_match("/^[a-zA-Z]*$/", $name) ) {
        //if true then redirect the user to signup page
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email) {

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        //if true then redirect the user to signup page
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function pwdMatch($password,$confirm_password) {

    if ($password !== $confirm_password) {
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
    $sql = "SELECT * from member WHERE Member_Email = ?;";
    $stmt = mysqli_stmt_init($conn);    
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location:../member/signup.php?error=stmtFailed");
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

function createUser($conn, $name, $number, $admin_id, $email, $password) {
    //This statement is used to prevent SQL Injection
    $sql = "INSERT INTO member (Member_Name, Phone_Number, Admin_id, Member_Email, Member_Password) VALUES (?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location:../member/signup.php?error=insertFailed");
        exit();
    }

    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "siiss", $name, $number, $admin_id, $email, $hashedPwd);
    mysqli_stmt_execute($stmt);
    // console_log($name);

    mysqli_stmt_close($stmt);

    header("location:../member/signIn.php?error=none");
    exit();
}

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

function loginUser($conn, $email, $password) {
    $emailExists = emailExists($conn, $email);
    
    if($emailExists === false) {
        header("location:../member/signIn.php?error=wronglogin");
    }

    $passwordHashed = $emailExists["Member_Password"];
    $checkPwd = password_verify($password, $passwordHashed);

    if($checkPwd === false) {
        header("location:../member/signIn.php?error=wrongpassword");
    }
    elseif ($checkPwd === true) {
        session_start();
        $_SESSION["memberid"] = $emailExists["Member_id"];
        $_SESSION["userName"] = $emailExists["Member_Name"];
        header("location:../member/home.php");
        exit(); 
    }
}


