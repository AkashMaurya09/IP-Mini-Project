<?php 
  include_once '../includes/dbh.inc.php';  
?>
<?php 
  session_start();
?>
<?php 

                  ?>
<?php
if (isset($_POST['search'])) {
if($_POST['search'] == "Everything"){
    $trainer_id = $_SESSION["trainer_userid"];
    $sql = "SELECT * FROM Workout WHERE Trainer_id='$trainer_id'";
    $result = mysqli_query($conn,$sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0) {
      $i = 0;
      while($row = mysqli_fetch_assoc($result)) {
        echo '
        <div class="singleTrainer">
            <video class="disabled" src="'. $row['location'] .'" controls width="320px" height="200px">
            </video>
            <div class="detailContent">
                <p>' . $row['Video_Name'] . '</p> 
                <p class="tag">#Weights #5minutes</p> 
                <p class="description">'. $row['Description'] . '</p>
            </div>
            <div class="singleTrainerButton">
                <button onClick="location.href=\'./editVideo.php?Video_id='.$row["Video_id"].'\'">Edit</button>
                <button >Delete</button>
            </div>
        </div>
        ';
        $i = $i + 1;
      }
    }
}
else{
  $trainer_id = $_SESSION["trainer_userid"];
   $Name =  $_POST['search'];
    $sql = "SELECT * FROM Workout WHERE Trainer_id='$trainer_id' AND Video_Name like '%$Name%'";
    $result = mysqli_query($conn,$sql);
    $resultCheck = mysqli_num_rows($result); 
    if ($resultCheck > 0) {
        $i = 0;
        while($row = mysqli_fetch_assoc($result)) {
          echo '
          <div class="singleTrainer">
            <video class="disabled" src="'. $row['location'] .'" controls width="320px" height="200px">
            </video>
            <div class="detailContent">
                <p>' . $row['Video_Name'] . '</p> 
                <p class="tag">#Weights #5minutes</p> 
                <p class="description">'. $row['Description'] . '</p>
            </div>
            <div class="singleTrainerButton">
                <button onClick="location.href=\'./editVideo.php?Video_id='.$row["Video_id"].'\'">Edit</button>
                <button >Delete</button>
            </div>
        </div>

          ';
          $i = $i + 1;
        }
      }
      else{
        echo '
        <div class="singleTrainer">
            <h5>No Matching Labels</h5>
        </div>
        ';
      } 
}
}

 ?>