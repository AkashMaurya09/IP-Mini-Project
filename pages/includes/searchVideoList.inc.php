<?php 
  include_once '../includes/dbh.inc.php';  
?>
<?php 
  session_start();
?>
<?php
if (isset($_POST['search'])) {
if($_POST['search'] == "Everything"){
    $memberid = $_SESSION['memberid'];
    $sql = "SELECT * FROM Workout WHERE Video_id NOT IN (SELECT Video_id From purchases Where Member_id='$memberid')";
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
              <div class="buyVideoButton">
                  <button>&#8377;'. $row['Price'] . '</button>
                  <button onClick="location.href=\'./payment.php?Video_id='.$row["Video_id"].'\'">Buy Now</button>
              </div>
          </div>
          ';
          $i = $i + 1;
        }
      }
}
else{
    $memberid = $_SESSION['memberid'];
   $Name =  $_POST['search'];
    $sql = "SELECT * FROM Workout WHERE Video_id NOT IN (SELECT  Video_id From purchases Where Member_id='$memberid') AND Video_Name like '%$Name%'";
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
              <div class="buyVideoButton">
                  <button>&#8377;'. $row['Price'] . '</button>
                  <button onClick="location.href=\'./payment.php?Video_id='.$row["Video_id"].'\'">Buy Now</button>
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