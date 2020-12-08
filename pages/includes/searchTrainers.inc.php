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
  $admin_id = $_SESSION['admin_userid'];
  $sql = "Select * from trainer WHERE Admin_id = $admin_id"; 
  $result = mysqli_query($conn,$sql);
  $resultCheck = mysqli_num_rows($result);
  if ($resultCheck > 0) {
    $i = 0;
    while($row = mysqli_fetch_array($result)) {
      echo '
      <div class="singleTrainer">
          <img src="../../img/img_avatar.png" alt="Avatar">
          <div class="detailContent">
              <p>' . $row['Trainer_Name'] . '</p> 
              <p> '. $row['Trainer_Email'] . '</p>
              <p>'. $row['Phone_Number'] .'</p>
          </div>
          <div class="singleTrainerButton">
              <button onClick="location.href=\'./editTrainer.php?Trainer_id='.$row["Trainer_id"].'\'">Edit</button>
              <button >Delete</button>
          </div>
          
      </div>
      ';
      $i = $i + 1;
    }
  }
}
else{

   $Name =  $_POST['search'];
   $admin_id = $_SESSION['admin_userid'];
   $sql = "Select * from trainer WHERE Admin_id = $admin_id AND Trainer_Name like '%$Name%'"; 
   $result = mysqli_query($conn,$sql);
   $resultCheck = mysqli_num_rows($result);
   if ($resultCheck > 0) {
     $i = 0;
     while($row = mysqli_fetch_array($result)) {
       echo '
       <div class="singleTrainer">
           <img src="../../img/img_avatar.png" alt="Avatar">
           <div class="detailContent">
               <p>' . $row['Trainer_Name'] . '</p> 
               <p> '. $row['Trainer_Email'] . '</p>
               <p>'. $row['Phone_Number'] .'</p>
           </div>
           <div class="singleTrainerButton">
               <button onClick="location.href=\'./editTrainer.php?Trainer_id='.$row["Trainer_id"].'\'">Edit</button>
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
            <h5 style="font-family:system-ui;">No Matching Labels</h5>
        </div>
        ';
      } 
}
}

 ?>