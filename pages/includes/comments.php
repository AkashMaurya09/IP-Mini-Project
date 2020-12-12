<?php
include_once '../includes/dbh.inc.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $video_id = $_GET['Video_id'];
    $comment_query = mysqli_query($conn, "SELECT * FROM comment where Video_id='$video_id' ORDER BY timestamp DESC;");
    echo "<div class='trainerList'>";
    while ($comment = mysqli_fetch_assoc($comment_query)) {
        $id = $comment['Member_id'];
        $sql = "Select * from Member WHERE Member_id = $id";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck > 0) {
            $memberId = mysqli_fetch_assoc($result);
        }

        echo '
          <div class="singleTrainer">
              <img src="' . $memberId['location'] . '" />
              <div class="detailContent">
                  <p>' . $memberId['Member_Name'] . '</p> 
                  <p class="tag"></p> 
                  <p class="description">'. $comment['userComment'] . '</p>
              </div>
          </div>
          ';

        // echo "<div class='comment-card'>";
        // echo "<img src='" . $memberId['location'] . "' />";
        // echo "<p id='username'> " . $memberId['Member_Name'] . "</p>";
        // echo "<div class='comment'>";
        // echo "<p>" . $comment['userComment'] . "</p>";
        // echo "</div>";
        // echo "<p class='time'>" . $comment['timestamp'] . "</p>";
        // echo "</div>";
    }
    echo "</div>";
}

if (isset($_POST["comment"])) {
    $name = $_POST["comment"];
    $video_id = $_POST['video_id'];
    $date = $_POST['timestamp'];
    $memberid = $_SESSION['memberid'];
    // $date = date("Y-m-d H:i:s");
    $query = "INSERT INTO comment(userComment,timestamp,Member_id,Video_id) VALUES('" . $name . "','" . $date . "','" . $memberid . "','" . $video_id . "')";

    mysqli_query($conn, $query);
}
