<?php
    include_once '../includes/dbh.inc.php'; 
    include_once '../includes/trainer_session.php';
    session_start();
    if(isset($_POST["delete_video_id"])) {
        $delete_id = $_POST["delete_video_id"];
        $query = "DELETE FROM workout where Video_id='$delete_id';";

        mysqli_query($conn, $query);
        echo ("TEST");
    }
?>