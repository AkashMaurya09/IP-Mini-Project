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
      <div class="singleTrainer" id="delete_id'.$row["Trainer_id"].'">
          <img src="' . $row['location'] . '" alt="Image not available">
          <div class="detailContent">
              <p>' . $row['Trainer_Name'] . '</p> 
              <p> '. $row['Trainer_Email'] . '</p>
              <p>'. $row['Phone_Number'] .'</p>
          </div>
          <div class="singleTrainerButton">
          <input type="hidden" />
              <button id="delete_button'.$row["Trainer_id"].'" >Delete</button>
          </div>   
          <input type="hidden" value='.$row["Trainer_id"].' id="delete'.$row["Trainer_id"].'"/> 
          
      </div>
      <script>
      $("#delete_button'.$row["Trainer_id"].'").click(function () {
        console.log("hello");
        var delete_id = $("#delete'.$row["Trainer_id"].'").val();
        $.ajax({
          type: "POST",
          url: "../admin/delete_trainer.php",
          data: {
            delete_Trainer_id : delete_id,
          },
          success: function () {
            console.log("delete_id'.$row["Trainer_id"].'");
            $("#delete_id'.$row["Trainer_id"].'").remove();
          },
        });
      });
      </script>

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
       <div class="singleTrainer" id="delete_id'.$row["Trainer_id"].'">
           <img src="' . $row['location'] . '" alt="Image not available">
           <div class="detailContent">
               <p>' . $row['Trainer_Name'] . '</p> 
               <p> '. $row['Trainer_Email'] . '</p>
               <p>'. $row['Phone_Number'] .'</p>
           </div>
           <div class="singleTrainerButton">
              <input type="hidden" />
               <button id="delete_button'.$row["Trainer_id"].'">Delete</button>
           </div>
           <input type="hidden" value='.$row["Trainer_id"].' id="delete'.$row["Trainer_id"].'"/> 
           
       </div>
       <script>
       $("#delete_button'.$row["Trainer_id"].'").click(function () {
         console.log("hello");
         var delete_id = $("#delete'.$row["Trainer_id"].'").val();
         $.ajax({
           type: "POST",
           url: "../admin/delete_trainer.php",
           data: {
             delete_Trainer_id : delete_id,
           },
           success: function () {
             console.log("delete_id'.$row["Trainer_id"].'");
             $("#delete_id'.$row["Trainer_id"].'").remove();
           },
         });
       });
       </script>
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