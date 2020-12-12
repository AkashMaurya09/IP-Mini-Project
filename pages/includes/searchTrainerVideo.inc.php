<?php
include_once '../includes/dbh.inc.php';
?>
<?php
session_start();
?>

<?php
if (isset($_POST['search'])) {
  if ($_POST['search'] == "Everything") {
    $trainer_id = $_SESSION["trainer_userid"];
    $sql = "SELECT * FROM Workout WHERE Trainer_id='$trainer_id'";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);


    if ($resultCheck > 0) {
      $i = 0;
      while ($row = mysqli_fetch_assoc($result)) {
        echo '
        <div class="singleTrainer" id="delete_id' . $row["Video_id"] . '">
            <video class="disabled" src="' . $row['location'] . '" controls width="320px" height="200px">
            </video>
            <div class="detailContent">
                <p>' . $row['Video_Name'] . '</p> ';
            $vid_id = $row["Video_id"];
            $tag = "SELECT * FROM Workout_tags WHERE Video_id='$vid_id'";
            $resulttag = mysqli_query($conn, $tag);
            $resultChecktag = mysqli_num_rows($resulttag);
            if ($resultChecktag > 0) {
              $i = 0;
              while ($rowtag = mysqli_fetch_assoc($resulttag)) {
                echo '<p class="tag">#' . $rowtag["Tags"] . '</p>';
                $i = $i + 1;
              }
            }


        echo '<p class="description">' . $row['Description'] . '</p>
            </div>
            <div class="singleTrainerButton">
                <button onClick="location.href=\'./editVideo.php?Video_id=' . $row["Video_id"] . '\'">Edit</button>
                <button id="delete_button' . $row["Video_id"] . '">Delete</button>
            </div>
            <input type="hidden" value=' . $row["Video_id"] . ' id="delete' . $row["Video_id"] . '"/>
        </div>
        <script>
        $("#delete_button' . $row["Video_id"] . '").click(function () {
          console.log("hello");
          var delete_id = $("#delete' . $row["Video_id"] . '").val();
          $.ajax({
            type: "POST",
            url: "../trainer/deleteTrainerVideo.php",
            data: {
              delete_video_id : delete_id,
            },
            success: function () {
              console.log("delete_id' . $row["Video_id"] . '");
              $("#delete_id' . $row["Video_id"] . '").remove();
            },
          });
        });
        </script>
        ';
        $i = $i + 1;
      }
    }
  } else {
    $trainer_id = $_SESSION["trainer_userid"];
    $Name =  $_POST['search'];
    $sql = "SELECT * FROM Workout WHERE Trainer_id='$trainer_id' AND Video_Name like '%$Name%'";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0) {
      $i = 0;
      while ($row = mysqli_fetch_assoc($result)) {
        echo '
        <div class="singleTrainer" id="delete_id' . $row["Video_id"] . '">
            <video class="disabled" src="' . $row['location'] . '" controls width="320px" height="200px">
            </video>
            <div class="detailContent">
                <p>' . $row['Video_Name'] . '</p> ';
        $vid_id = $row["Video_id"];
        $tag = "SELECT * FROM Workout_tags WHERE Video_id='$vid_id'";
        $resulttag = mysqli_query($conn, $tag);
        $resultChecktag = mysqli_num_rows($resulttag);
        if ($resultChecktag > 0) {
          $i = 0;
          while ($rowtag = mysqli_fetch_assoc($resulttag)) {
            echo '<p class="tag">#' . $rowtag["Tags"] . '</p>';
            $i = $i + 1;
          }
        }


        echo '<p class="description">' . $row['Description'] . '</p>
            </div>
            <div class="singleTrainerButton">
                <button onClick="location.href=\'./editVideo.php?Video_id=' . $row["Video_id"] . '\'">Edit</button>
                <button id="delete_button' . $row["Video_id"] . '">Delete</button>
            </div>
            <input type="hidden" value=' . $row["Video_id"] . ' id="delete' . $row["Video_id"] . '"/>
        </div>
        <script>
        $("#delete_button' . $row["Video_id"] . '").click(function () {
          console.log("hello");
          var delete_id = $("#delete' . $row["Video_id"] . '").val();
          $.ajax({
            type: "POST",
            url: "../trainer/deleteTrainerVideo.php",
            data: {
              delete_video_id : delete_id,
            },
            success: function () {
              console.log("delete_id' . $row["Video_id"] . '");
              $("#delete_id' . $row["Video_id"] . '").remove();
            },
          });
        });
        </script>
        ';
        $i = $i + 1;
      }
    } else {
      echo '
        <div class="singleTrainer">
            <h5>No Matching Labels</h5>
        </div>
        ';
    }
  }
}

?>