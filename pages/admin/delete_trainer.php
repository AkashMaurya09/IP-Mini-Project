<?php
    include_once '../includes/dbh.inc.php'; 
    session_start();
    include_once '../includes/admin_session.php'; 
    if(isset($_POST["delete_Trainer_id"])) {
        $delete_id = $_POST["delete_Trainer_id"];
        $query = "DELETE FROM trainer where Trainer_id='$delete_id';";

        mysqli_query($conn, $query);
        echo ("TEST");
    }
?>